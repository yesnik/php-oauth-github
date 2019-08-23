<?php

require_once './config.php';

// Generate $state variable
$state = md5(date('H:i:s'));

// Save $state to file
$fp = fopen('./storage/state', 'w+');
fwrite($fp, $state);
fclose($fp);

?>

<h3>1. Ask user for permission to read his/her GitHub's profile</h3>

<p>We use this <a target="_blank" href="https://developer.github.com/apps/building-oauth-apps/authorizing-oauth-apps/">documentation</a> to authorize OAuth Apps via GitHub.</p>

<form action="https://github.com/login/oauth/authorize">
  <label>login</label>
  <input type="text" placeholder="Login" name="login">
  <br>

  <label>client_id</label>
  <input type="text" name="client_id" value="<?php echo $clientId; ?>">
  <br>

  <label>redirect_url</label>
  <input type="text" name="redirect_url" value="http://127.0.0.1:8000/user.php">
  <br>
  
  <label>scope</label>
  <input type="text" name="scope" value="user:email">
  <br>
  
  <label>state</label>
  <input type="text" name="state" value="<?php echo $state; ?>">
  <br>

  <input type="submit" value="Login using GitHub">
</form>
