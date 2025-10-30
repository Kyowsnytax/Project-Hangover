<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['registerusername'] ?? '');
    $password = trim($_POST['registerpassword'] ?? '');

    if (empty($user) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields required']);
        exit;
    }

    // Check if username exists
    $check = $conn->prepare("SELECT id FROM buyeruser WHERE username = ?");
    $check->bind_param("s", $user);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'exists']);
        exit;
    }

    // Insert new account (hashed password)
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO buyeruser (username, userpassword) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $hashed);
    $stmt->execute();

    echo json_encode(['status' => 'success']);
}
?>
