<?php

session_start();

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');


$userid=$_POST['userid'];
$password=$_POST['password'];

$s=" select * from userinfo where userid='$userid' && password = '$password' && status='Active'";
$s2=" select role from userinfo where userid='$userid' && password = '$password' && role = 'Admin' && status='Active'";

$result = mysqli_query($con,$s);
$result2 = mysqli_query($con,$s2);

$num = mysqli_num_rows($result);
$num2 = mysqli_num_rows($result2);

if ($num ==1){

	$_SESSION["userid"]=$userid;
	$_SESSION["password"]=$password;

	if ($num2== 1) {
	header('location:homepage.php');
	}else {
	header('location:studenthome.php');
	}
}else{
	header('location:index.php?error=Incorrect login details. Please try again.');
}

?>
