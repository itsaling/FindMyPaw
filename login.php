
<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM USER WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location: Browsing_page.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
<title>Login</title>
<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body style="background: linear-gradient(#D4EFDF, white)">
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<!-- <div id="id01" class="modal"> -->
    <!-- <span onclick="document.getElementById('id01').style.display ='none'" class="close" title="Close Modal"></span> -->
    <!--Modal content -->
    <form method="post" class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="imgcontainer">
        <img src="dogloginAvatar.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <!-- username fill in  -->
        <label><b>Login </b></label>
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label><b>Username</b></label>
        <input type="text" style="font-family:'Poiret One', cursive; font-size:20px;" placeholder="Username" name="username" required value="<?php echo $username; ?>">
        <span class="help-block"><?php echo $username_err; ?></span>
        </div>

        <!-- password fill in  -->
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label><b>Password</b></label>
        <input type="password" style="font-family:'Poiret One', cursive; font-size:20px;" placeholder="Password" name="password" required >
        <span class="help-block"><?php echo $password_err; ?></span>
        </div>

        <input type="checkbox" checked="checked"> Remember me </input>

        <button type="submit" style="background-color:#A9DFBF;">Login</button>
        <div style="background-color: #f1f1f1">
          <button style="background-color:#C8C9C8;"type="button" onclick="location = 'FindMyPaws.php'" name="cancel">Cancel</button>
          <?php
          if(isset($_POST['cancel'])){
            header("Location: FindMyPaws.php");
            exit;
          }
          ?>
        </div>
        <p>Don't have an account? <a href="singup.php">Sign up now</a>.</p>

      </div>
    </form>
<!-- </div> -->
</body>
</html>
