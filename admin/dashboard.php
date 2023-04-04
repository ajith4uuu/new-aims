<?php
// Require authentication
require_once('../auth.php');

// Require header and footer templates
require_once('../includes/header.php');
require_once('../includes/footer.php');

// Check if user is an admin
if ($_SESSION['user']['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}
?>

<div class="container">
    <h1>Dashboard Management</h1>

    <h2>JIRA Boards</h2>

    <p>Here you can manage the JIRA boards that are displayed on the user panel JIRA tab.</p>

    <!-- TODO: Add JIRA board management form -->

    <h2>Grafana Dashboards</h2>

    <p>Here you can manage the Grafana dashboards that are displayed on the user panel Grafana tab.</p>

    <!-- TODO: Add Grafana dashboard management form -->
</div>
