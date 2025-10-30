<?php
include 'dbconn.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = trim($_POST['registerusername']);
        $passwords = trim($_POST['registerpassword']);

        // check if username already exists
        $check = $conn->prepare("SELECT id FROM buyeruser WHERE username = ?");
        $check->bind_param("s", $user);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('User already exists'); window.history.back();</script>";
            exit;
        }

        // insert new account
        $query = "INSERT INTO buyeruser (username, userpassword) VALUES (?, ?)";
        $smt = $conn->prepare($query);
        $smt->bind_param("ss", $user, $passwords);
        $smt->execute();

    }
} catch (mysqli_sql_exception $e) {
    echo "<script>alert('Error: " . addslashes( $e->getMessage()) . "'); window.history.back();</script>";
}
?>
