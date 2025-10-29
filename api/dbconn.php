<?php

$_servername = "localhost";
$_username = "root";
$_password = "";
$dbname = 'hangover_menulist';

try{
    $conn = mysqli_connect($_servername, $_username, $_password, $dbname);
    echo "Connected successfully";
}
catch(mysqli_sql_exception $e){
    echo "Connection failed: " . $e->getMessage();
}   
