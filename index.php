<?php

require_once './config.php';

// Generate $state variable
$state = md5(date('H:i:s'));

// Save $state to file
$fp = fopen('./storage/state', 'w+');
fwrite($fp, $state);
fclose($fp);
?>

<h2>Welcome to PHP OAuth App</h2>

<p>This app wants to get your public info from Github.</p>

<p>Do you want to enter your Github credentials on this site? 
We don't think so, because this site can steal your password.</p>

<p>That's why OAuth will help us. 
It allows us to receive permission for viewing account info via Github API.</p>

<p><a target="_blank" href="https://developer.github.com/apps/building-oauth-apps/authorizing-oauth-apps/">Github documentation</a> helped us to implement OAuth on this site.</p>

<h3>1. Ask permission to read user's GitHub profile</h3>

<p>Make GET request to URL: https://github.com/login/oauth/authorize</p>

<form action="https://github.com/login/oauth/authorize">
  <label>login</label>
  <input type="text" placeholder="Your Github Login" name="login">
  <br>

  <label>client_id</label>
  <input type="text" name="client_id" value="<?php echo $clientId; ?>">
  <br>

  <label>scope</label>
  <input type="text" name="scope" value="user:email">
  <br>
  
  <label>state</label>
  <input type="text" name="state" value="<?php echo $state; ?>">
  <br>

  <input type="submit" value="Login using GitHub">
</form>
