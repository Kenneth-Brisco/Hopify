<?php
  ob_start();
  session_start();
  
  $timezone = date_default_timezone_set("America/Denver");

  $con = mysqli_connect("localhost", "root", "", "hopify");

  if(mysqli_connect_errno()) {
      echo "Failed to connect: " . mysqli_connect_errno();
  }
?>