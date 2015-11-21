<?php

require __DIR__ . '/../vendor/autoload.php';
$config = require 'config.php';

use JVDS\UnifiApiClient\Client;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

$apiClient = new Client(new HttpClient(['base_uri' => $config['base_uri']]));

try {

    // login to the unifi controller API
    $apiClient->login($config['username'], $config['password']);

    // Revoke authorization for guest with mac address 01:01:01:01:01:01
    // You need a user with full access to the unifi controller for this call!
    $response = $apiClient->unauthorizeGuest($config['site'], '01:01:01:01:01:01');

    print_r(json_decode($response->getBody(), true));

    $apiClient->logout();

} catch (RequestException $e) {
    echo $e->getMessage() . PHP_EOL;

    echo '----- Request ------' . PHP_EOL;

    echo (string) $e->getRequest()->getBody();
    echo PHP_EOL;

    echo '----- Response ------' . PHP_EOL;
    echo $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : '- no response -';
    echo PHP_EOL;
}