<?php

$url = 'https://api.github.com/user';
$ch = curl_init($url);

$accessToken = $_GET['access_token'];
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

<p>We got from Github:</p>

<div>
<?php echo $response; ?>
</div>

<ul>
  <li>
    Avatar image: <br>
    <img width="100" src="<?php echo $responseObject->avatar_url; ?>">
  </li>
  <li>
    User name: <?php echo $responseObject->name ?>
  </li>
  <li>
    Location: <?php echo $responseObject->location; ?>
  </li>
  <li>
    Account created at: <?php echo $responseObject->created_at; ?>
  </li>
</ul>
