<?php
  include("../../config.php");

  if(!isset($_POST['username'])) {
    echo "ERROR: Could not set username";
    exit();
  }
  
  if(!isset($_POST['oldPassword']) || !isset($_POST['oldPassword1']) || !isset($_POST['oldPassword2'])) {
    echo "Not all passwords have been set";
    exit();
  }

  if(($_POST['oldPassword'] == "") || ($_POST['oldPassword1'] == "") || ($_POST['oldPassword2'] == "")) {
    echo "Please fill in all fields";
    exit();
  }

  $username = $_POST['username'];
  $oldPassword = $_POST['oldPassword'];
  $oldPassword1 = $_POST['oldPassword1'];
  $oldPassword2 = $_POST['oldPassword2'];

  $oldMd5 = md5($oldPassword);

  $passwordCheck = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$oldMd5'");
  if(mysqli_num_rows($passordCheck) != 1) {
    echo "Password is incorrect";
    exit();
  }

  if($newPassword1 != $newPassword2) {
    echo "Your new passwords do not match";
    exit();
  }

  if(preg_match('/[^A-Za-z0-9]/', $newPassword1)) {
    echo "Your password must only contain letters and/or numbers";
    exit();
  }

  if(strlen($newPassword1) > 30 || strlen($newPassword1) < 5) {
    echo "Your username must be between 5 and 30 characters";
  }

  $newMd5 = md5($newPassword1);

  $query = mysqli_query($con, "UPDATE users SET password='$newMd5' WHERE username='$username'");
  echo "Update successful";
?>