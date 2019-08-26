<?php

require_once './config.php';

if (empty($_GET['state'])) {
  echo 'Undefined GET param `state`';
  exit;
}

$state = $_GET['state'];

// Retriveve $state from file
$stateSaved = file_get_contents('./storage/state');

if ($stateSaved !== $state) {
  echo 'Invalid state';
  exit;
}

if (empty($_GET['code'])) {
  echo 'Undefined GET param `code`';
  exit;
}

// The temporary code issued by Github will expire after 10 minutes
$code = $_GET['code'];
?>

<h3>2. Get access_token from GitHub</h3>

<p>We have been redirected back to this site and got these params from GitHub:</p>

<ul>
  <li>code = <?php echo $code; ?></li>
  <li>state = <?php echo $state; ?></li>
</ul>

<h4>Let's exchange code for an access_token:</h4>

<p>Make POST request to URL: https://github.com/login/oauth/access_token</p>

<form action="/github_access_token.php" method="POST">
  <label>code</label>
  <input type="text" name="code" value="<?php echo $code; ?>">
  <br>

  <label>state</label>
  <input type="text" name="state" value="<?php echo $state; ?>">
  <br>

  <p>These params we got from our OAuth App Settings at Github:</p>

  <label>client_id</label>
  <input type="text" name="client_id" value="<?php echo $clientId; ?>">
  <br>

  <label>client_secret</label>
  <input type="text" name="client_secret" value="<?php echo $clientSecret; ?>">
  <br>

  <input type="submit" value="Get access token">
</form>
