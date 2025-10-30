<?php
include 'dbconn.php';

// Default to breakfast if nothing selected
$category = $_GET['category'] ?? 'breakfast';

switch ($category) {
    case 'breakfast':
        include 'fetch_breakfast.php';
        break;
    case 'lunch':
        include 'fetch_lunch.php';
        break;
    case 'dinner':
        include 'fetch_dinner.php';
        break;
    default:
        include 'fetch_breakfast.php';
        break;
}
?>
