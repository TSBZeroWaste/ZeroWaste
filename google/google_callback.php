<?php
$CONSUMER_KEY = '708889713182-4i01h4lvp0g0mfa586ngu9b02u15b9kl.apps.googleusercontent.com';
$CONSUMER_SECRET = '';

$TOKEN_URL = 'https://accounts.google.com/o/oauth2/token';
$INFO_URL = 'https://www.googleapis.com/oauth2/v1/userinfo';
$APP_URL = $_GET["state"];
$params = array(
    'code' => $_GET['code'],
    'grant_type' => 'authorization_code',
    'redirect_uri' => 'http://localhost/zero_waste/google_callback.php',
    'client_id' => $CONSUMER_KEY,
    'client_secret' => $CONSUMER_SECRET,
);
$options = array('http' => array(
    'method' => 'POST',
    'content' => http_build_query($params)
));
$res = file_get_contents($TOKEN_URL, false, stream_context_create($options));
$token = json_decode($res, true);
if (isset($token['error'])) {
    echo 'エラー発生';
    exit;
}
$access_token = $token['access_token'];
$params = array('access_token' => $access_token);
$res = file_get_contents($INFO_URL . '?' . http_build_query($params));
$res = json_decode($res, true);
var_dump($res);
echo "<p>$res["email"]</p>";
echo "<p>$res["name"]</p>";
//    $res["email"] email
//    $res["name"] ユーザー名