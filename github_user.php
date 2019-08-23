<?php

$accessToken = $_GET['access_token'];
$url = 'https://api.github.com/user';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: token ' . $accessToken,
    'User-Agent: yesnik.ru'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

$response = curl_exec($ch);
curl_close($ch);

$responseObject = json_decode($response);

?>

<h3>4. Display user info from GitHub</h3>

<p>We have made request to URL: <?php echo $url; ?></p>

<p>Result:</p>

<h4>User name: <?php echo $responseObject->name ?></h4>

<h5>Avatar image</h5>
<img width="100" src="<?php echo $responseObject->avatar_url; ?>">

<h5>Location: <?php echo $responseObject->location; ?></h5>

<h5>Account created at: <?php echo $responseObject->created_at; ?></h5>
