<?php

$_servername = "localhost";
$_username = "u817157843_hangover";
$_password = "Hangoverqwer1";
$dbname = 'u817157843_hangover_db';
$conn->query("SET time_zone = '+08:00'");

try{
    $conn = mysqli_connect($_servername, $_username, $_password, $dbname);
    // echo "Connected successfully";
}
catch(mysqli_sql_exception $e){
    echo "Connection failed: " . $e->getMessage();
}   