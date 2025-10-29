<?php
include 'dbconn.php';



$query = "Insert INTO users (username, password) VALUES (?, ?)";
try {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $smt = $conn->prepare($query);
        $smt->bind_param("ss", $user,$passwords);
        $user = $_POST['registerusername'];
        $passwords =$_POST['registerpassword'];
        $smt->execute();
    
    }
    
} catch (mysqli_sql_exception $e) {
    echo "Failed: " . $e->getMessage();
}