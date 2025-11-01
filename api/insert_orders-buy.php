<?php

include 'dbconn.php';

session_start();

$quantity = $_GET['modalQuantity'];


$order_user = htmlspecialchars($_SESSION['username']);
$order_menu_type = $_GET['Category'];
$order_item = $_GET['modalItemName'];
$order_item_price = $_GET['item_price'];
$orderMenutype = $_GET['menu_type'];

$finditemprice = "
  SELECT item_price FROM burgers WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM shakes WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM chickenwings WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM coffee WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM kiddiemeal WHERE item_name = '$order_item'
  UNION ALL
  SELECT item_price FROM sidedish WHERE item_name = '$order_item'
";

$result_find_item_price = $conn->query($finditemprice);


$query_find_user_id = "SELECT id FROM buyeruser WHERE username = '$order_user'";
$result_find_user_id = $conn->query($query_find_user_id);




$_newinsertquery  = $conn->prepare("INSERT INTO orders (orders.user_id, orders.menut_type, orders.item_name, orders.menu_type, orders.item_price) value(?,?,?,?,CURRENT_TIMESTAMP())");

$_newinsertquery->bind_param("isssd", $result_find_user_id, $order_menu_type, $order_item, $orderMenutype, $result_find_item_price);

while ($i = 0; $i < $quantity; $i++) {
$_newinsertquery->execute();
}