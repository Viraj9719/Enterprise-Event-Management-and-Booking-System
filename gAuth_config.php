<?php
require_once 'vendor/autoload.php';

// Google Client Configuration
$client = new Google_Client();
$client->setClientId('');
$client->setClientSecret('');
$client->setRedirectUri('');
$client->addScope("email");
$client->addScope("profile");

?>