<?php 
// Include the Facebook PHP SDK
require_once('facebook-php-sdk/src/facebook.php');

// Create a new Facebook object
$facebook = new Facebook(array(
  'appId'  => 'YOUR_APP_ID',
  'secret' => 'YOUR_APP_SECRET',
));

// Get the current user
$user = $facebook->getUser();

// If the user is not logged in, redirect to the login page
if (!$user) {
  $loginUrl = $facebook->getLoginUrl();
  header('Location: ' . $loginUrl);
  exit();
}

// Get the user's profile information
$userProfile = $facebook->api('/me');

// Do something with the user's profile information
// ... 
?>