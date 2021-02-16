<?php

require "./vendor/autoload.php";


$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    // 'clientId'                => '---------------- JE CLIENTID DAT JE KAN VINDEN VIA JE DISCORD APP ----------------',
    // 'clientSecret'            => '---------------- JE CLIENTSECRED DAT JE KAN VINDEN VIA JE DISCORD APP ----------------',
    // 'redirectUri'             => '---------------- DE URL DAT JE OOK IN DISCORD HEBT INGEHEVEN ----------------',
    'urlAuthorize'            => 'https://discord.com/api/oauth2/authorize',
    'urlAccessToken'          => 'https://discord.com/api/oauth2/token',
    'urlResourceOwnerDetails' => 'http://brentertainment.com/oauth2/lockdin/resource'
]);

$authorizationUrl = $provider->getAuthorizationUrl() . "&scope=identify%20email";

header("Location: " . $authorizationUrl);
