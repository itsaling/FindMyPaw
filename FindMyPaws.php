<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
hello i have been modify
-->

<!-- Opening connection for database -->
<!-- <?php

//$user = 'root';
//$password = '';
// $database = 'findmypaws';

// $dbc = new mysqli('localhost', $user, $password, $database) or die("Unable to connect");

?> -->
<!DOCTYPE html>
<html>
    <head>
    <style>
  		ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: transparent;
  }

  li {
      float: left;
  }

  li a, .dropbtn {
      display: block;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
  }

  li a:hover, .dropdown:hover .dropbtn {
      background-color: #93d6ae;
  }
  li .dropdown{
  	display: inline-block;
  }
  .dropdown-content{
  	display: none;
  	position: absolute;
  	background-color: #93d6ae;
  	min-width: 160px;
  	z-index: 1;
  }
  .dropdown-content a{
  	color: white;
  	padding: 12px 16px;
  	text-decoration: none;
  	display: block;
  	text-align: left;
  }
  .dropdown-content a:hover {
  	background-color: #f1f1f1
  }
  .dropdown:hover .dropdown-content{
  	display: block;
  }
  .picture {
      margin: 10px 0 20px 360px;
  }
  </style>
      <link rel="stylesheet" type="text/css" href="design.css">
        <title> Find My Paws</title>
    </head>
    <body style="background: linear-gradient(#D4EFDF, white)">
      <!-- Script for the login and sign up to close anywhere when clicks in gray area -->

      <!-- Link to Implementing the font from google website -->
      <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

      <!-- NAVIGATION BAR  -->
      <ul>
    		<li><a class ="active" href="FindMyPaws.php" style="font-family: 'Poiret One', cursive;"> Home </a></li>
    		<li> <a href="#contact" style="font-family: 'Poiret One', cursive;">Contact Us </a> </li>
    		<li class="dropdown">
    			<a href="javascript:void(0)" class="dropbtn" style="font-family: 'Poiret One', cursive;">Browse </a>
    			<div class="dropdown-content">
    				<a href="lost.php" style="font-family: 'Poiret One', cursive;"> Lost pet </a>
    				<a href="found.php" style="font-family: 'Poiret One', cursive;"> Found pet</a>
    			</div>
    		 </li>
    		<li> <a href="#shelter" style="font-family: 'Poiret One', cursive;">Shelter near me </a> </li>

    	</ul>
        <!-- Title page message-->
        <div id="searchBar">
                  <!--general search box-->
          <input type="text" style="width:40%; font-family: 'Poiret One', cursive; " placeholder="Looking for?">
          <input type="button" value="Search" style="font-family: 'Poiret One', cursive;">
        </div>


            <!--picture of the location tag-->
      <img src="locationClipArt.png" style="width:15%; padding: 0px 0px 0px 550px;position:relative; top:-75px;">
      <h1 id="greeting"> Find My P<img src="whitepaw.png" style="width:2%;">ws</h1>

        <!--button to open login form -->
      <button onclick="location = 'login.php';" style="position: relative; top:-100px;background-color:#A9DFBF;" name="loginbtn">Login</button>
      <?php
      if(isset($_POST['loginbtn'])){
        header("Location: login.php");
        exit;
      }?>

        <!--The modal for login -->
      <!-- <div id="id01" class="modal">
          <span onclick="document.getElementById('id01').style.display ='none'" class="close" title="Close Modal"></span>
          <!--Modal content -->
          <!-- <form method="post" class="modal-content animate" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="imgcontainer">
              <img src="dogloginAvatar.png" alt="Avatar" class="avatar">
            </div>

            <div class="container"> -->
              <!-- username fill in  -->
              <!-- <div class="form-group <?php //echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              <label><b>Username</b></label>
              <input type="text" style="font-family:'Poiret One', cursive; font-size:20px;" placeholder="Username" name="username" required value="<?php echo $username; ?>">
              <span class="help-block"><?php //echo $username_err; ?></span>
              </div> -->

              <!-- password fill in  -->
              <!-- <div class="form-group <?php //echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label><b>Password</b></label>
              <input type="password" style="font-family:'Poiret One', cursive; font-size:20px;" placeholder="Password" name="password" required >
              </div>

              <input type="checkbox" checked="checked"> Remember me </input>

              <button type="submit">Login</button>
              <div style="background-color: #f1f1f1">
                <button style="background-color:#C8C9C8;"type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              </div>

            </div>
          </form>
      </div> -->

        <!--signup button-->
      <button onclick="location = 'singup.php';"style="position: relative; top:-100px; background-color:#A9DFBF;" name="reg_button">Sign Up</button>
      <?php
      if(isset($_POST['reg_button'])){
        header("Location: singup.php");
        exit;
      }?>

        <!-- the modal for sign up -->
      <!-- <div id="id02" class="modal">
          <span onclick="document.getElementById('id02').style.display ='none'" class="close" title="Close Modal"></span>

          <form method="post" class="modal-content animate" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="container">
              <!-- First name  -->
              <!-- <input type="text2" style="font-family:'Poiret One', cursive; font-size: 20px;" placeholder="First name" name="Fname" required> -->
              <!-- Last name  -->
              <!-- <input type="text2" style="font-family:'Poiret One', cursive; font-size:20px;" placeholder="Last name" name="Lname" required> -->
              <!-- email -->

              <!-- <input type="text" style="font-family:'Poiret One', cursive; font-size:20px; width:90%" placeholder="Email..." name="email" required> -->
              <!-- phone number -->
              <!-- <input type="text2" style="font-family:'Poiret One', cursive;font-size:20px;width:30%;" placeholder="Phone" name="phone" > -->
              <!-- username -->
              <!-- <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              <input type="text" style="font-size:20px; font-family:'Poiret One', cursive;width:90%" placeholder="Username..." name="username" required value="<?php echo $username; ?>" >
              <span class="help-block"><?php echo $username_err; ?></span>
              </div> -->
              <!-- password -->
              <!-- <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <input type="password" style="font-size:20px; font-family:'Poiret One', cursive;width:90%" placeholder="Password..." name="password" required value="<?php echo $password; ?>">
              <span class="help-block"><?php echo $password_err; ?></span>
              </div> -->
              <!-- re-enter password -->
              <!-- <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
              <input type="password" style="font-size: 20px; font-family:'Poiret One', cursive;" placeholder="Re-enter Password" name="confirm_password" required value="<?php echo $confirm_password; ?>">
              <span class="help-block"><?php echo $confirm_password_err; ?></span>
              </div> -->
              <!-- sign up button -->
              <!-- <button type="signup" name="register" value="signup">Sign Up</button> -->
              <!-- cancel button  -->
              <!-- <div style="background-color: #f1f1f1">
                <button style="background-color:#C8C9C8;"type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
              </div> -->
              <!-- already a member  -->
              <!-- <p>Already have an account? <a href="login.php">Login here</a>.</p> -->

            <!-- </div> -->

          <!-- </form> -->

        <!-- </div> -->

        <script>
        // Get the modal
        var modal2 = document.getElementById('id02');
        var modal1 = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
            else if (event.target == modal2) {
              modal2.style.display = 'none';
            }
        }
        </script>

        <!--introduction to the website -->
      <div class="bg1">
        <div class="caption1">
          <span class="border1" > About Us</span>
        </div>
      </div>

        <!--introduction information-->
        <div style="font-family:'Poiret One', cursive; color: #F08080; background-color: white; text-align: center; padding: 5px 8px; text-align:justify;">
          <h3 style="text-align:center;"> First and formal most </h3>
          <p> Introducing find my paw, where you can post/search for your lost pet to help reunite pet and petowner</p>
        </div>

        <!--How does it work title-->
        <div class="bg2">
          <div class="caption1">
            <span class="border1" style="background-color:transparent; color: #D4EFDF;"><b>Browse through all post</b></span>
          </div>
        </div>

        <!--how does it work explain -->
        <!--browse through the already exist posts-->
        <div class="position">
          <div class="block1">
            <div class="inBlock1">
              <p><b>All Post</b></p>
              <?php
              require_once 'config.php';
              $sql = "SELECT * FROM POST";
              $post_count = $link->query("SELECT * FROM POST");
              $result = mysqli_query($link, $sql);

              while($row = mysqli_fetch_assoc($result)){

                echo "<img src='".$row['pic']."' height = '200px'; width = '200px'>"."  ";
                echo "<p style='color: red;'>"."<b>".$row['post_type']."</p>";
                echo "  <b>Petname:</b> " . $row['petname'];
                echo "  <b>Description:</b> " . " " . $row['description'] ;
                echo "  <b>DOP: </b>" . $row['date'] . "</br>";
                echo "<br>";
                //var_dump($row['pic']); die;
              }
               ?>
            </div>
            <div style="text-align:left; color: white;">
              <td>  <b>Total post:</b> </td>
              <td> <?php echo $post_count->num_rows; ?>
            </div>
            </div>
          </div>
        </div>
        <!--background3 -->
        <div class="bg3">
          <div class="caption1">
            <span class="border1" style="background-color:#F08080; color:white;">Contact Us </span>
          </div>
        </div>

        <!--Contact us information -->
        <div class="position">
          <div class="block1" style="color: white;">
            <p> Towson University</p>
            <p>7800 York Road, Towson, MD, 21213</p>
            <p>findmypawssupport@gmail.com</p>
        </div>

        </div>
    </body>
</html>
