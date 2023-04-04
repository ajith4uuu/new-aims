<?php
// Require authentication
require_once('auth.php');

// Require header and footer templates
require_once('includes/header.php');
require_once('includes/footer.php');

// Require Guzzle HTTP client library
require_once('vendor/autoload.php');

// Initialize Guzzle client
$client = new GuzzleHttp\Client([
    'base_uri' => 'http://localhost:8000/api/v1/', // API base URL
    'headers' => [
        'Authorization' => 'Bearer ' . $_SESSION['token'], // Set JWT token in Authorization header
        'Accept' => 'application/json' // Request JSON response
    ]
]);

// Get user's JIRA boards
$response = $client->request('GET', 'jira/boards');
$boards = json_decode($response->getBody());

// Get user's Grafana dashboards
$response = $client->request('GET', 'grafana/dashboards');
$dashboards = json_decode($response->getBody());

?>

<div class="container">
    <h1>User Panel</h1>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#grafana-tab" data-toggle="tab">Grafana Dashboards</a></li>
        <li><a href="#jira-tab" data-toggle="tab">JIRA Boards</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="grafana-tab">
            <?php foreach ($dashboards as $dashboard): ?>
                <iframe src="<?php echo $dashboard->url; ?>"></iframe>
            <?php endforeach; ?>
        </div>

        <div class="tab-pane" id="jira-tab">
            <?php foreach ($boards as $board): ?>
                <iframe src="<?php echo $board->url; ?>"></iframe>
            <?php endforeach; ?>
        </div>
    </div>
</div>
