<?php
//
// session_start();
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//   //$username= $_SESSION['username'];
//   $userid = "SELECT user_ID FROM USER WHERE username = '". $_SESSION['username'] ."'";
//   $id = mysqli_query($link, $userid);
//   $id = mysqli_fetch_array($id);
//
//   //$postid = "SELECT post_ID FROM POST WHERE pic =  '". $_SESSION['pic'] . "' ";
//
//   $postid = "SELECT post_ID FROM POST";
//
//   $result = mysqli_query($link, $postid);
//
//
//
//
//   $comment = mysqli_real_escape_string($link, $_REQUEST['comment']);
//   $sql = "INSERT INTO COMMENT (user_ID, comment) VALUES ('$id[0]','$comment')";
//   // var_dump($comment);die();
//   if( mysqli_query($link, $sql)){
//     header("location: Browsing_page.php");
//   }
//   else{
//     echo "ERROR: cannot execute $sql" . mysqli_error($link);
//   }
//
// }
// mysqli_close($link);
//   require_once 'config.php';
// $sql = "SELECT comment from COMMENT";
// $result = mysqli_query($link, $sql);
//
// while($row = mysqli_fetch_assoc($result)){
//   echo $row['comment']."<br>";
// }

// var_dump($result); die();
 ?>

 <?php
 // OPENING A SESSION TO IDENTIFY THE CURRENT USER
 session_start();
 // OPENING CONNECTION TO THE DATABASE
 require_once 'config.php';
 // IF USER CLICK POST COMMENT
 if($_SERVER["REQUEST_METHOD"] == "POST"){
   $ids= $_SESSION['username']; //GET THE SESSION NAME IE. USERNAME
   $userid = "SELECT user_ID FROM USER WHERE username = '". $ids ."'"; //SQL STATEMENT TO SELECT THE USERD FROM THE DATABSE
   $id = mysqli_query($link, $userid);//GET IT FROM THE DATABASE
   $id = mysqli_fetch_array($id);// FETCH THE DATA IN THE ARRAY
   $comment = mysqli_real_escape_string($link, $_REQUEST['comment']);//GET THE USER INPUT FOR COMMENT
   $post_id = mysqli_real_escape_string($link, $_REQUEST['postid']); //GET THE POST ID OF THE COMMENT 

  //  SQL STATMENT TO INSERT THE DATA INTO THE COMMENT TABLE
   $sql = "INSERT INTO COMMENT (user_ID,post_ID, comment) VALUES ('$id[0]','$post_id','$comment')";
  //  WHEN CLICKED ON COMMENT REDIRECT TO THE Browsing_page
   if( mysqli_query($link, $sql)){
     header("location: Browsing_page.php");
   }
   else{
     echo "ERROR: cannot execute $sql" . mysqli_error($link);
   }
 }
 mysqli_close($link);
  ?>
