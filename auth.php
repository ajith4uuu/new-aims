<?php

// Start session
session_start();

// Require database connection
require_once('db.php');

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Check if user's session has expired
$session_duration = 60 * 60; // 1 hour
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_duration)) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}

// Update user's last activity timestamp
$_SESSION['last_activity'] = time();

// Define user role constants
define('ROLE_USER', 'user');
define('ROLE_ADMIN', 'admin');

// Define functions for checking user roles
function is_user() {
    return $_SESSION['user']['role'] == ROLE_USER;
}

function is_admin() {
    return $_SESSION['user']['role'] == ROLE_ADMIN;
}
