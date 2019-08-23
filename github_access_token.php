<?php

$accessTokenUrl =  'https://github.com/login/oauth/access_token';

$clientId = $_POST['client_id'];
$clientSecret = $_POST['client_secret'];
$code = $_POST['code'];
$redirectUri = $_POST['redirect_uri'];
$state = $_POST['state'];

// set post fields
$post = [
    'client_id' => $clientId,
    'client_secret' => $clientSecret,
    'code'   => $code,
    'redirect_uri' => $redirectUri,
    'state' => $state,
];

$ch = curl_init($accessTokenUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json'
]);

// execute!
$response = curl_exec($ch);
// Example or $response: '{"access_token":"dc81e45c07fa7bf6b6acae9396c0747e2b03e571",
// "token_type":"bearer","scope":"gist,user:email"}'

curl_close($ch);

$responseParams = json_decode($response);

if (empty($responseParams->access_token)) {
  echo 'Error: No access token received from GitHub';
  exit;
}

$accessToken = $responseParams->access_token;

?>

<h3>3. Get info about user using access_token</h3>

<p>We have made POST request to <?php echo $accessTokenUrl; ?></p>

<p>We got these params from GitHub:</p>

<?php var_dump($responseParams); ?>

<p>Make GET request to URL: https://api.github.com/user</p>

<form action="/github_user.php" method="GET">
  <label>access_token</label>
  <input type="text" name="access_token" value="<?php echo $accessToken; ?>">
  <br>

  <input type="submit" value="Get user's info">
</form>
