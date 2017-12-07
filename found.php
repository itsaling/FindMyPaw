<?php
// Initialize the session
require_once 'config.php';
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
$post_count = $link->query("SELECT * FROM POST WHERE post_type = 'FOUND'");
?>
<!DOCTYPE html>
<html lang="en">
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
<meta charset="UTF-8">
<title>Post Form</title>
<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body style="background: linear-gradient(#D4EFDF, white)">
<!-- USING FONT FROM GOOGLE  -->
<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<!-- NAVIGATION BAR UP TOP  -->
<ul>
  <li><a class ="active" href="FindMyPaws.php" style="font-family: 'Poiret One', cursive;"> Home </a></li>
  <li> <a href="#contact" style="font-family: 'Poiret One', cursive;">Contact Us </a> </li>
  <li class="dropdown">
    <a href="Browsing_page.php" class="dropbtn" style="font-family: 'Poiret One', cursive;">Browse </a>
    <div class="dropdown-content">
      <a href="lost.php" style="font-family: 'Poiret One', cursive;"> Lost pet </a>
      <a href="found.php" style="font-family: 'Poiret One', cursive;"> Found pet</a>
    </div>
   </li>
  <li> <a href="#shelter" style="font-family: 'Poiret One', cursive;">Shelter near me </a> </li>
</ul>

<!-- NAVIGATION BAR TO SEARCH FOR RANDOM STUFF -->
<div id="searchBar">
          <!--general search box-->
  <input type="text" style="width:40%; font-family: 'Poiret One', cursive; " placeholder="Looking for?">
  <input type="button" value="Search" style="font-family: 'Poiret One', cursive;">
  </div>
</div>


  <!-- welcome statement for the user -->
<h1 style="font-family: 'Poiret One', cursive; "><b><?php echo $_SESSION['username']; ?></b>, Looking for any of these pets?!</h1>

          <!--picture of the location tag-->
<img src="locationClipArt.png" style="width:15%; padding: 0px 0px 0px 550px;position:relative; top:-75px;">
<h1 id="greeting"> Find My P<img src="whitepaw.png" style="width:2%;">ws</h1>
<!-- <img src="paws.png" style="width:500px; padding: 0px 0px 0px 400px;position:relative; top:-200px;"> -->
<button onclick="location = 'post.php';" style="position: relative; top:-100px;background-color:#A9DFBF;" name="postbtn">Post</button>
<?php
if(isset($_POST['postbtn'])){
  header("Location: post.php");//WHEN BUTTON IS CLICK REDIRECT TO FindMyPaws.PHP
  exit;
}?>
  <!-- button to logout of the system -->
<button style="background-color:#C8C9C8; position: relative; top:-100px;" onclick="location = 'FindMyPaws.php'" name="logout">Sign Out</button>
<?php
if(isset($_POST['logout'])){
  header("Location: FindMyPaws.php"); //WHEN BUTTON IS CLICK REDIRECT TO FindMyPaws.PHP
  exit;
}?>
<div class="bg3" >
  <div class="caption1">
    <span class="border1" > Found Pet</span>
  </div>
</div>

<div style="font-family:'Poiret One', cursive; color: #F08080; background-color: white; text-align: center; padding: 5px 8px; text-align:justify;">
  <!-- <h3 style="text-align:center;"> First and formal most </h3> -->
  <!-- <p> Introducing find my paw, where you can post/search for your lost pet to help reunite pet and petowner</p> -->
  <div style="text-align:center;">
  <?php
  require_once 'config.php'; // OPEN A CONNECTION TO THE DATABASE
  $sql = "SELECT * FROM POST WHERE post_type = 'FOUND'"; //SELECT ALL THE FOUND POST
  $result = mysqli_query($link, $sql);// SELECT FROM THIS DATABASE

  // LOOP THROUGH THE ARRAY TO DISPLAY THE DATA
  while($row = mysqli_fetch_assoc($result)){
    $photo = $row['pic'];
    echo "<img src='".$photo."' height = '200px'; width = '200px'>"."  "; //DISPLAY PHOTO
    echo "<p style='color: red;'>"."<b>".$row['post_type']."</b>"."</p>"; //DISPLAY TYPE OF POST
    echo "  <b>Petname:</b> " . $row['petname']; //DISPLAY THE PETNAME
    echo "  <b>Description:</b> " . " " . $row['description'] ; //DISPLAY THE DESCRIPTION
    echo "  <b>DOP: </b>" . $row['date']; //DISPLAY THE DATE OF THE POST
    echo "<br>";
    echo "<br>";
  }
   ?>
 </div>
 <div>
   <td> <b>Total found pet post: </b></td>
   <td> <?php echo $post_count->num_rows; ?> //DISPLAY THE NUMBER OF ROW IN THE DATABASE, ESSENTIALLY DISPLAY THE NUMBER OF POSTS
 </div>
</div>


</body>
</html>
