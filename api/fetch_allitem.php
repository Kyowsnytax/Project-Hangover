<?php
include 'dbconn.php';

// Combine all menu categories into one result
$query = "
  SELECT item_name, description, price, 'burger' AS category FROM burger
  UNION ALL
  SELECT item_name, description, price, 'sidedish' AS category FROM sidedish
  UNION ALL
  SELECT item_name, description, price, 'kiddiemeal' AS category FROM kiddiemeal
  UNION ALL
  SELECT item_name, description, price, 'coffee' AS category FROM coffee
  UNION ALL
  SELECT item_name, description, price, 'chickenwings' AS category FROM chickenwings
  UNION ALL
  SELECT item_name, description, price, 'shakes' AS category FROM shakes
";

$result = $conn->query($query);

if (!$result) {
  die("Query failed: " . $conn->error);
}
?>
