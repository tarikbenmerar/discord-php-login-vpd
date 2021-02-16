<?php

require "./vendor/autoload.php";

use GuzzleHttp\Client;

$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => '---------------- JE CLIENTID DAT JE KAN VINDEN VIA JE DISCORD APP ----------------',
    'clientSecret'            => '---------------- JE CLIENTSECRED DAT JE KAN VINDEN VIA JE DISCORD APP ----------------',
    'redirectUri'             => '---------------- DE URL DAT JE OOK IN DISCORD HEBT INGEHEVEN ----------------',
    'urlAuthorize'            => 'https://discord.com/api/oauth2/authorize',
    'urlAccessToken'          => 'https://discord.com/api/oauth2/token',
    'urlResourceOwnerDetails' => 'http://brentertainment.com/oauth2/lockdin/resource'
]);

$authorizationUrl = $provider->getAuthorizationUrl() . "&scope=identify%20email";

$accessToken = $provider->getAccessToken('authorization_code', [
    'code' => $_GET["code"]
]);

$request = $provider->getAuthenticatedRequest(
    'GET',
    'https://discord.com/api/users/@me',
    $accessToken
);

$client = new Client();

$response = $client->send($request, ['timeout' => 2]);

$bodyString = $response->getBody()->getContents();

$body = json_decode($bodyString);

$USERID = $body->id;
$USERNAME = mysqli_real_escape_string($mysqli, $body->username);
$EMAIL = $body->email;
$AVATARID = $body->avatar;

$FILETYPE = ".JPG"; // JE KAN OOK KIEZEN VOOR ---  .PNG  ---

if (!$body->avatar == null) {
    $AVATAR = GETAVATAR($AVATARID, $USERID, $FILETYPE);
} else {
    $AVATAR = $USERNAME . " has no profilepicture at the moment";
}

function GETAVATAR($USERID, $AVATARID, $FILETYPE){
    $Output = "https://cdn.discordapp.com/avatars/" . $USERID . "/" . $AVATARID . $FILETYPE;
}
