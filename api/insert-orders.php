<?php

include 'dbconn.php';


$order_user = $_POST['user_id'];
$order_menu_type = $_POST['menu_type'];
$order_item = $_POST['item_id'];
$orderMenutype = $_POST['menu_type'];

$query_find_user_id = "SELECT id FROM buyeruser WHERE username = '$order_user'";
$result_find_user_id = $conn->query($query_find_user_id);




$_newinsertquery  = $conn->prepare("INSERT INTO TABLE orders (orders.user_id, orders.menut_type, orders.item_name, orders.menu_type) value(?,?,?,CURRENT_TIMESTAMP())");
$_newinsertquery->bind_param("isss", $order_user, $order_menu_type, $order_item, $orderMenutype);
$_newinsertquery->execute();