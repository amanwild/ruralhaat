<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('58460991907-afq9uqmn299d8ivspkkglvip02jueh5t.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://ruralhaat.org.in/login/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>