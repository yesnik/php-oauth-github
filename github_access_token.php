<?php

$accessTokenUrl =  'https://github.com/login/oauth/access_token';
$ch = curl_init($accessTokenUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$post = [
    'client_id' => $_POST['client_id'],
    'client_secret' => $_POST['client_secret'],
    'code'   => $_POST['code'],
    'state' => $_POST['state'],
];
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json'
]);

$response = curl_exec($ch);
curl_close($ch);

$responseParams = json_decode($response);

if (empty($responseParams->access_token)) {
  echo 'Error: No access token received from GitHub';
  exit;
}

$accessToken = $responseParams->access_token;

?>

<h3>3. Get info about user</h3>

<p>We got from Github:</p>

<ul>
  <li>access_token = <?php echo $accessToken; ?></li>
</ul>

<h4>Use access_token to get info about user</h4>

<p>Make GET request to URL: https://api.github.com/user</p>

<form action="/github_user.php" method="GET">
  <label>access_token</label>
  <input type="text" name="access_token" value="<?php echo $accessToken; ?>">
  <br>

  <input type="submit" value="Get user's info">
</form>
