<?php
include 'dbconn.php';

// Get filters from AJAX
$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';

// Base query
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

// Apply filters dynamically
$conditions = [];
if (!empty($search)) {
  $search = $conn->real_escape_string($search);
  $conditions[] = "(item_name LIKE '%$search%' OR description LIKE '%$search%')";
}

if (!empty($category) && $category !== 'all') {
  $category = $conn->real_escape_string($category);
  $conditions[] = "category = '$category'";
}

// Append WHERE if filters exist
if (!empty($conditions)) {
  $query = "SELECT * FROM ($query) AS combined WHERE " . implode(" AND ", $conditions);
}

$result = $conn->query($query);

if (!$result) {
  die("Query failed: " . $conn->error);
}


$conn->close();
?>
