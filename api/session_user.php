<?php
// Start session if not started yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize variables
$user_id = null;
$username = null;
$is_logged_in = false;

// Check if user session exists
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $is_logged_in = true;
}
?>
