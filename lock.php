<?php
include('FindMyPaws.php');
session_start();

$user_check= $_SESSION['login_user'];
$ses_sql = mysqli_query($dbc, " select uname form user where uname = '$user_check");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['uname'];

if(!isset($login_session)){
	header("location: login.php");
}
?>