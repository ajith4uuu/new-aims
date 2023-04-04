<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

// Set up the Guzzle client
$client = new Client([
    'base_uri' => 'https://your.grafana.url/api/',
    'headers' => [
        'Authorization' => 'Bearer your-grafana-api-token',
        'Accept' => 'application/json',
    ],
]);

// Send a request to the Grafana API to get the list of dashboards
$response = $client->get('search', [
    'query' => [
        'type' => 'dash-db',
    ],
]);

// Check for errors
if ($response->getStatusCode() !== 200) {
    die('Error retrieving dashboards from Grafana: ' . $response->getReasonPhrase());
}

// Parse the response body as JSON
$data = json_decode($response->getBody(), true);

// Extract the list of dashboards from the response
$dashboards = array_map(function ($dashboard) {
    return [
        'title' => $dashboard['title'],
        'url' => 'https://your.grafana.url/d/' . $dashboard['uri'],
    ];
}, $data);

// Send the list of dashboards back as JSON
header('Content-Type: application/json');
echo json_encode($dashboards);
