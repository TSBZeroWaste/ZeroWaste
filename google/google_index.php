<?php
$CONSUMER_KEY = '708889713182-4i01h4lvp0g0mfa586ngu9b02u15b9kl.apps.googleusercontent.com';
$AUTH_URL = 'https://accounts.google.com/o/oauth2/auth';
$params = array(
  'client_id' => $CONSUMER_KEY,
  'redirect_uri' => 'http://localhost/zero_waste/google_callback.php',
  'scope' => 'profile email',
  'response_type' => 'code',
  'access_type' => 'offline'
);
header("Location: " . $AUTH_URL. '?' . http_build_query($params));