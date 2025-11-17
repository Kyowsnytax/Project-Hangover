<?php

$_servername = "localhost";
$_username = "u817157843_hangover";
$_password = "hangoverqwer1";
$dbname = 'u817157843_hangover_db';

try{
    $conn = mysqli_connect($_servername, $_username, $_password, $dbname);
    // echo "Connected successfully";
}
catch(mysqli_sql_exception $e){
    echo "Connection failed: " . $e->getMessage();
}   
