<?php

session_start();

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');

$role=$_POST['role'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

$s=" select * from userinfo where username = '$username' && email='$email' && password = '$password'";
$s2=" select role from userinfo where username = '$username' && email='$email' && password = '$password' && role = 'Admin'";

$result = mysqli_query($con,$s);
$result2 = mysqli_query($con,$s2);

$num = mysqli_num_rows($result);
$num2 = mysqli_num_rows($result2);

if ($num == 1){
    $_SESSION["username"]=$username;
	$_SESSION["role"]=$role;
	if ($num2== 1) {
	header('location:homepage.php');
	}else {
	header('location:studenthome.php');
	}
}else{
	header('location:index.php?error=1');
}

?>
