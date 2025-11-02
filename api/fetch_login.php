<?php
include 'dbconn.php';
session_start();

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check if user exists
    $stmt = $conn->prepare("SELECT userid, username, userpassword FROM buyeruser WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
       
        if ($password === $row['userpassword']) {

            $_SESSION['user_id'] = $row['userid'];
            $_SESSION['username'] = $row['username'];

            // Redirect to home page
            header("Location: ../account.php");
            
            exit();
        } else {
            echo "<script>alert('Incorrect password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Username not found.'); window.history.back();</script>";
    }

    $stmt->close();

?>
