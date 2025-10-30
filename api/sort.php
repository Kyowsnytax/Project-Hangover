<?php
include 'dbconn.php';

// Default to breakfast if nothing selected
$category = $_GET['category'] ?? 'breakfast';

switch ($category) {
    case 'burger':
        include 'fetch_burger.php';
        break;
    case 'shakes':
        include 'fetch_shakes.php';
        break;
    case 'coffee':
        include 'fetch_coffee.php';
        break;
    case 'chickenwings':
        include 'fetch_chickenwings.php';
        break;
    case 'sidedishes':
        include 'fetch_sidedishes.php';
        break;
    case 'kiddiemeals':
        include 'fetch_kiddiemeals.php';
        break;
    default:
        include 'fetch_burger.php';
        break;
}
?>
