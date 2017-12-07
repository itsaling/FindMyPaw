<!--         <?php
        // include('FindMyPaws.php');
        //
        //   if($_SERVER["REQUEST_METHOD"] == "POST"){
        //     // username and password sent from Form
        //     $username= mysqli_real_escape_string($dbc,$_POST['Uname']);
        //     $password= mysqli_real_escape_string($dbc, $_POST['Psw']);
        //     $mail= mysqli_real_escape_string($dbc, $_POST['email']);
        //     //$password= md5($password); // Encrypted Password
        //     $sql= "INSERT INTO USER(uname,password, email) VALUES('$username','$password', '$mail')";
        //     $result=mysqli_query($dbc,$sql);
        //     echo "Registration Successfully";
        //   }
        //   ?> -->

          <?php
          // OPENING A CONNECTION TO THE DATABASE
          require_once 'config.php';

          // Define variables and initialize with empty values
          $username = $password = $confirm_password = "";
          $username_err = $password_err = $confirm_password_err = "";

          // Processing form data when form is submitted
          if($_SERVER["REQUEST_METHOD"] == "POST"){

              // Validate username
              if(empty(trim($_POST["username"]))){
                  $username_err = "Please enter a username.";
              } else{
                  // Prepare a select statement
                  $sql = "SELECT user_ID FROM user WHERE username = ?";

                  if($stmt = mysqli_prepare($link, $sql)){
                      // Bind variables to the prepared statement as parameters
                      mysqli_stmt_bind_param($stmt, "s", $param_username);

                      // Set parameters
                      $param_username = trim($_POST["username"]);

                      // Attempt to execute the prepared statement
                      if(mysqli_stmt_execute($stmt)){
                          /* store result */
                          mysqli_stmt_store_result($stmt);

                          if(mysqli_stmt_num_rows($stmt) == 1){
                              $username_err = "   This username is already taken.";
                          } else{
                              $username = trim($_POST["username"]);
                          }
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
                  }

                  // Close statement
                  mysqli_stmt_close($stmt);
              }

              // Validate password
              if(empty(trim($_POST['password']))){
                  $password_err = "Please enter a password.";
              } elseif(strlen(trim($_POST['password'])) < 6){
                  $password_err = "Password must have atleast 6 characters.";
              } else{
                  $password = trim($_POST['password']);
              }

              // Validate confirm password
              if(empty(trim($_POST["confirm_password"]))){
                  $confirm_password_err = 'Please confirm password.';
              } else{
                  $confirm_password = trim($_POST['confirm_password']);
                  if($password != $confirm_password){
                      $confirm_password_err = 'Password did not match.';
                  }
              }

              // Check input errors before inserting in database
              if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

                  // Prepare an insert statement
                  $sql = "INSERT INTO user (username, password) VALUES (?, ?)";

                  if($stmt = mysqli_prepare($link, $sql)){
                      // Bind variables to the prepared statement as parameters
                      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                      // Set parameters
                      $param_username = $username;
                      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                      // Attempt to execute the prepared statement
                      if(mysqli_stmt_execute($stmt)){
                          // Redirect to login page
                          header("location: login.php");
                      } else{
                          echo "Something went wrong. Please try again later.";
                      }
                  }

                  // Close statement
                  mysqli_stmt_close($stmt);
              }

              // Close connection
              mysqli_close($link);
          }
          ?>
          <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body style="background: linear-gradient(#D4EFDF, white)">
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

  <!-- the modal for sign up -->

    <form method="post" class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="imgcontainer">
        <img src="dogloginAvatar.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label><b>Sign Up </b></label>
        <!-- username -->
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <input type="text" style="font-size:20px; font-family:'Poiret One', cursive;width:90%" placeholder="Username..." name="username" required value="<?php echo $username; ?>" >
        <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <!-- password -->
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <input type="password" style="font-size:20px; font-family:'Poiret One', cursive;width:90%" placeholder="Password..." name="password" required value="<?php echo $password; ?>">
        <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <!-- re-enter password -->
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
        <input type="password" style="font-size: 20px; font-family:'Poiret One', cursive;" placeholder="Re-enter Password" name="confirm_password" required value="<?php echo $confirm_password; ?>">
        <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <!-- sign up button -->
        <button type="signup" style="background-color:#A9DFBF;" name="register" value="signup">Sign Up</button>
        <!-- cancel button  -->
        <div style="background-color: #f1f1f1">
          <button style="background-color:#C8C9C8;"type="button" onclick="location = 'FindMyPaws.php'" name="cancel">Cancel</button>
          <?php
          // IF BUTTON IS CLICK REDIRECT THE USER TO THE Browsing_page
          if(isset($_POST['cancel'])){
            header ("Location: FindMyPaws.php");
            exit;
          }
          ?>
        </div>
        <!-- already a member  -->
        <p>Already have an account? <a href="login.php">Login here</a>.</p>

      </div>

    </form>
</body>
</html>
