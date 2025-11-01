<?php
include 'dbconn.php';

try{
$msqlquery =  "SELECT item_name, description, price
        FROM burger
        ORDER BY item_id ASC";

    $result = $conn->query($msqlquery);


}catch(mysqli_sql_exception $e){
    echo " Failed fetching Menu";
}
$conn->close();