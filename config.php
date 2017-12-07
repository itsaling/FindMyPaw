<!-- <?php
//THIS ALSO WORKS 
//$password = '';
//$database = 'findmypaws';

//$dbc = new mysqli('localhost', $user, $password, $database) or die("Unable to connect" . mysqli_connect_error());

?> -->
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'findmypaws');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
