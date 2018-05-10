<?php

  include("includes/config.php");
  include('includes/classes/Account.php');
  include('includes/classes/Constants.php');

  $account = new Account($con);

  include('includes/handlers/register-handler.php');
  include('includes/handlers/login-handler.php');

  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];

    }
  }
?>


<html>
<head>
      <title>Welcome to Hopify</title>
      <link rel="stylesheet" href="assets/css/register.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <script src="assets/js/register.js"></script>
</head>
<body>
<?php
  if(isset($_POST['registerButton'])){
    echo '<script>
    $(document).ready(function() {
      $("#loginForm").hide();
      $("#registerForm").show();
    });
  </script>';
  } else {
    echo '<script>
    $(document).ready(function() {
      $("#loginForm").show();
      $("#registerForm").hide();
    });
  </script>';
  }
?>

  
<div id="background">

  <div id="loginContainer">
        <div id='inputContainer'>

        <!-- Login form -->
      
            <form action="register.php" id="loginForm" method="POST">
                <h2>Login to your account</h2>
                <p>
                <?php echo $account->getError(Constants::$loginFailed); ?>
                  <label for="loginUsername">Username</label>
                <input type="text" id='loginUsername' name="loginUsername" value="<?php getInputValue('loginUsername') ?>" placeholder="e.g. bartSimpson"  required></p>
                <p>
                <label for="loginPassword">Password</label>
                <input type="password" id='loginPassword' placeholder="Your Password" name="loginPassword" required></p>

                <button type="submit" name="loginButton">LOG IN</button>

                <div class="hasAccountText">
                   <span id="hideLogin">Don't have an account yet? Signup here.</span>
                </div>
                
            </form>



              <!-- Create account form -->


            <form action="register.php" id="registerForm" method="POST">
                <h2>Create your free account</h2>
                <p>
                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                  <label for="username">Username</label>
                <input type="text" id='username' name="username" value="<?php getInputValue('username') ?>" placeholder="e.g. bartSimpson" required></p>
                <p>
                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                  <label for="firstName">First Name</label>
                <input type="text" id='firstName' name="firstName" value="<?php getInputValue('firstName') ?>" placeholder="e.g. bartSimpson" required></p>
                <p>
                <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                  <label for="lastName">Last Name</label>
                <input type="text" id='lastName' name="lastName" value="<?php getInputValue('lastName') ?>" placeholder="e.g. bartSimpson" required></p>
                <p>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
                  <label for="email">Email</label>
                <input type="email" id='email' name="email" value="<?php getInputValue('email') ?>" placeholder="bartSimpson@gmail.com" required></p>
                <p>
                  <label for="email2">Confirm Email</label>
                <input type="text" id='email2' value="<?php getInputValue('email2') ?>" name="email2" placeholder="Confirm Email" required></p>




                <p>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                <?php echo $account->getError(Constants::$passwordCharacters); ?>
                <label for="password">Password</label>
                <input type="password" id='password' name="password" placeholder="Your Password" required></p>
                <p>
                <label for="password2">Confirm Password</label>
                <input type="password" id='password2' name="password2" placeholder="Confirm Your Password" required></p>

                <button type="submit" name="registerButton">Sign Up</button>
            
                <div class="hasAccountText">
                   <span id="hideRegister">Already have an account yet? Login here.</span>
                </div>
            </form>
        </div>
          <div id="loginText">
              <h1>Get great music, right now</h1>
              <h2>Listen to loads of songs for free</h2>
              <ul>
                  <li>Discover music you'll fall in love with</li>
                  <li>Create your own playlists</li>
                  <li>Follow artists to keep up to date</li>
              </ul>
          </div>

      </div>
  </div>
</body>
</html>