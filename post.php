<?php session_start();
//var_dump($_SESSION['username']);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
 <title>Post Form</title>
 <link rel="stylesheet" type="text/css" href="design.css">
 </head>
 <body style="background: linear-gradient(#D4EFDF, white)">

 <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
 <!--Modal content -->
 <form method="post" class="modal-content animate" action="insert.php">
   <div class="imgcontainer">
     <img src="dogloginAvatar.png" alt="Avatar" class="avatar">
   </div>
  <!-- selecting from picture -->
   <div class="container">
     <div class="picture" style="left: 100px;"><label>Select from photo: </label>
      <input type="file" accept="image/*" required  name="picture">
     </div>
    <!-- SELECT WHAT TYPE OF POST IS IT GOING TO BE  -->
     <label><b>Please select type of post</b></label>
     <input type="radio"   name="post-type" value="LOST"> Lost pet
     <input type="radio"   name="post-type" value="FOUND"> Found pet
     <br>
     <br>

     <!-- USER INPUT THE REQUIRED INFORMATION  -->
     <label> <b> Name of pet </b> </label>
     <input type="text" style="font-family:'Poiret One', cursive; font-size:20px;" placeholder="Pet name..." name="petname" required >
     <label><b>Description</b></label>
     <input type="text" style="font-family:'Poiret One', cursive; font-size:20px;" placeholder="Decribe..." name="description" required >

      <!-- BUTTON TO POST  -->
     <button type="submit" style="background-color:#A9DFBF;" value="submit">Post</button>
     <div style="background-color: #f1f1f1">
       <!-- <button style="background-color:#C8C9C8;"type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> -->
       <button style="background-color:#C8C9C8;"type="button" onclick="location = 'FindMyPaws.php'" name="cancel">Cancel</button>
       <?php
       if(isset($_POST['cancel'])){
         header("Location: Browsing_page.php");
         exit;
       }
       ?>
     </div>

   </div>
 </form>
</body>
</html>
