<!DOCTYPE html>
<html>
<head>
	<style>
		ul{
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
  <!-- LINKING TO A CSS PAGE FOR THE LAYOUT -->
	<link rel="stylesheet" type="text/css" href="design.css">
	<title>Browse!</title>
</head>
<body style="background: linear-gradient(#D4EFDF, white)">
  <!-- GETTING THE FONT FROM GOOGLE  -->
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

         <!-- NAGIVATION BAR  -->
    	<ul>
    		<li><a class ="active" href="Browsing_page.php" style="font-family: 'Poiret One', cursive;"> Home </a></li>
    		<li> <a href="contactus.php" style="font-family: 'Poiret One', cursive;">Contact Us </a> </li>
    		<li class="dropdown">
    			<a href="javascript:void(0)" class="dropbtn" style="font-family: 'Poiret One', cursive;">Browse </a>
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

            <!--picture of the location tag-->
      <img src="locationClipArt.png" style="width:15%; padding: 0px 0px 0px 670px;position:relative; top:-75px;">
      <h1 id="greeting"> Find My P<img src="whitepaw.png" style="width:2%;">ws</h1>

      <div class="position">
        <div class="block1" style="color: white; font-size: 30px;">
          <p> Towson University</p>
          <p>7800 York Road, Towson, MD, 21213</p>
          <p>findmypawssupport@gmail.com</p>
      </div>
</body>
</html>
