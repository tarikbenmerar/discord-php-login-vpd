<?php

require "./vendor/autoload.php";


$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => '---------------- DU KANNST DEINE CLIENT ID, ÜBER DIE DISCORD APP FINDEN. ----------------',
    'clientSecret'            => '---------------- DU KANNST DEINE CLIENT SECRET, ÜBER DIE DISCORD APP FINDEN.----------------',
    'redirectUri'             => '---------------- DIESELBE WEITERLEITENDE URL, DIE DU IM DISCORD PORTAL VERWENDET HAST. ----------------',
    'urlAuthorize'            => 'https://discord.com/api/oauth2/authorize',
    'urlAccessToken'          => 'https://discord.com/api/oauth2/token',
    'urlResourceOwnerDetails' => 'http://brentertainment.com/oauth2/lockdin/resource'
]);

$authorizationUrl = $provider->getAuthorizationUrl() . "&scope=identify%20email";

header("Location: " . $authorizationUrl);
