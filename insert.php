<?php
require_once 'config.php';
session_start();
//echo var_dump($_SESSION['username']); die;


if($_SERVER["REQUEST_METHOD"] == "POST"){
  $ids= $_SESSION['username'];
  $userid = "SELECT user_ID FROM USER WHERE username = '". $ids ."'";

  $id = mysqli_query($link, $userid);
  $id = mysqli_fetch_array($id);
  //var_dump($id);die();
	$posttype = mysqli_real_escape_string($link, $_REQUEST['post-type']);
	$petname = mysqli_real_escape_string($link, $_REQUEST['petname']);
	$description = mysqli_real_escape_string($link, $_REQUEST['description']);
	$pic = mysqli_real_escape_string($link, $_REQUEST['picture']);

	$sql = "INSERT INTO POST( user_ID, post_type, petname, description, pic) VALUES ('$id[0]','$posttype','$petname', '$description', '$pic')";


	if(mysqli_query($link, $sql)){
    header("location: Browsing_page.php");
	} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// close connection
mysqli_close($link);

 ?>
