<?php
require_once('vendor/autoload.php'); // include Guzzle library

// Set up Guzzle client with Jira API credentials
$client = new \GuzzleHttp\Client([
    'base_uri' => 'https://your-jira-domain.com/rest/agile/1.0/board/',
    'auth' => ['your-jira-username', 'your-jira-api-key']
]);

// Retrieve the ID of the desired Jira board
$board_name = 'My Board'; // replace with your board's name
$response = $client->get('?name=' . $board_name);
$data = json_decode($response->getBody(), true);
$board_id = $data['values'][0]['id'];

// Retrieve the Jira board data
$response = $client->get($board_id . '/issue');
$data = json_decode($response->getBody(), true);

// Output the Jira board data
echo json_encode($data);
?>
