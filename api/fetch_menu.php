<?php
include 'dbconn.php';

$msqlquery =  "SELECT item_name, description, price
        FROM breakfast_menu 
        ORDER BY item_id ASC";

    $result = $dbconn->query($msqlquery);
