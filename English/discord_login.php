<?php

require "./vendor/autoload.php";


$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => '---------------- YOUR CLIENTID THAT YOU CAN FIND THROUGH YOUR DISCORD APP ----------------',
    'clientSecret'            => '---------------- YOUR CLIENTSECRED THAT YOU CAN FIND THROUGH YOUR DISCORD APP ----------------',
    'redirectUri'             => '---------------- THE SAME REDIRECT URL YOU"VE INSERTED ON THE DISCORD PORTAL ----------------',
    'urlAuthorize'            => 'https://discord.com/api/oauth2/authorize',
    'urlAccessToken'          => 'https://discord.com/api/oauth2/token',
    'urlResourceOwnerDetails' => 'http://brentertainment.com/oauth2/lockdin/resource'
]);

$authorizationUrl = $provider->getAuthorizationUrl() . "&scope=identify%20email";

header("Location: " . $authorizationUrl);
