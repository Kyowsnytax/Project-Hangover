<?php
include 'dbconn.php';
session_start();

$quantity = $_GET['modalQuantity'];

$order_user = htmlspecialchars(string: $_SESSION['username']);
$order_menu_type = $_GET['Category'];
$order_item = $_GET['modalItemName'];


// --- Find item price ---
$finditemprice = "
  SELECT item_price FROM burgers WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM shakes WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM chickenwings WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM coffee WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM kiddiemeal WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM sidedish WHERE item_name = '$order_item'
  LIMIT 1
";
$result_find_item_price = $conn->query($finditemprice);
if ($row = $result_find_item_price->fetch_assoc()) {
    $item_price = $row['item_price'];
} 

// --- Find user ID ---
$query_find_user_id = "SELECT id FROM buyeruser WHERE username = '$order_user'";
$result_find_user_id = $conn->query($query_find_user_id);
if ($row = $result_find_user_id->fetch_assoc()) {
    $user_id = $row['id'];
} 

// --- Prepare insert query ---
$_newinsertquery = $conn->prepare("
    INSERT INTO orders (user_id, menut_type, item_name, menu_type, item_price, order_date)
    VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP())
");
$_newinsertquery->bind_param("isssd", $user_id, $order_menu_type, $order_item, $orderMenutype, $item_price);

// --- Loop for quantity ---
for ($i = 0; $i < $quantity; $i++) {
    $_newinsertquery->execute();
}

$_newinsertquery->close();


?>
