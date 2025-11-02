<?php
include 'dbconn.php';


$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
$order_user  = $_POST['username'];
$order_item = isset($_POST['item_name']) ? $_POST['item_name'] : '';
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;

if ($quantity <= 0 || empty($order_item) || $price <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input data']);
    exit();
}

// --- Find user ID (using prepared statement) ---
$find_user = $conn->prepare("SELECT userid AS id FROM buyeruser WHERE username = ?");



$find_user->bind_param('s', $order_user);
$find_user->execute();

// Use bind_result/fetch to avoid requiring mysqlnd get_result()
$find_user->bind_result($user_id);
if (!$find_user->fetch()) {
    http_response_code(400);
    echo json_encode(['error' => 'User not found']);
    $find_user->close();
    exit();
}
$find_user->close();

// --- Prepare insert query ---
$insert_order = $conn->prepare("
    INSERT INTO orders (userid, item_name, item_price, order_date)
    VALUES (?, ?, ?, NOW())
");
$insert_order->bind_param("isd", $user_id, $order_item, $price);

// --- Loop for quantity ---
$success = true;
$errors = [];

for ($i = 0; $i < $quantity; $i++) {
    if (!$insert_order->execute()) {
        $success = false;
        $errors[] = "Failed to insert order #" . ($i + 1) . ": " . $insert_order->error;
    }
}

$insert_order->close();

if ($success) {
    echo json_encode(['message' => 'Orders inserted successfully']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Some orders failed to insert', 'details' => $errors]);
}
?>
