<?php
include 'dbconn.php'; // database connection

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$confirmPassword = trim($_POST['confirmpassword']);

try {
    // Basic validation
    if (empty($username) || empty($password) || empty($confirmPassword)) {
        throw new Exception("All fields are required.");
    }

    if ($password !== $confirmPassword) {
        throw new Exception("Passwords do not match.");
    }

    // Check for existing username
    $check = $conn->prepare("SELECT username FROM buyeruser WHERE username = ?");
    if (!$check) {
        throw new Exception("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        throw new Exception("Username already exists.");
    }

    $check->close();

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO buyeruser (username, userpassword) VALUES (?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ss", $username, $password);

    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . htmlspecialchars($stmt->error));
    }
    // ✅ Redirect to Login.php
    echo "<script>
        alert('Account created successfully! Please log in.');
        window.location.href = '../Login.php';
    </script>";
    exit;
} catch (Exception $e) {
     echo "
    <script>
        alert('$e');
        window.history.back(); 
    </script>
    ";
    exit    ; 
    // echo "Error: " . $e->getMessage();
    

} finally {
    if (isset($stmt) && $stmt) $stmt->close();
    if (isset($conn) && $conn) $conn->close();
}
