<?php
include("includes/includedFiles.php");
?>

<div class="userDetails">
  <div class="container borderBottom">
    <h2>EMAIL</h2>
    <input type="text" name="email" placeholder='Email adress...' class="email" value='<?php echo $userLoggedIn->getEmail(); ?>'>
    <span class="message"></span>
    <button class="button" onclick="updateEmail('email')">SAVE</button>
  </div>

  <div class="container borderBottom">
    <h2>PASSWORD</h2>
    <input type="password" name="oldPassword" placeholder='Current Password' class="oldPassword">
    <input type="password" name="newPassword1" placeholder='New Password' class="newPassword1">
    <input type="password" name="newPassword2" placeholder='Confirm Password' class="newPassword2">
    <span class="message"></span>
    <button class="button" onclick="updatePassword('oldPassword', 'newPassword1', 'newPassword2')">SAVE</button>
  </div>
</div>