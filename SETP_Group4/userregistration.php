<?php

session_start();
header('location:createuser.php');

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'lms');

$role=$_POST['role'];
$status=$_POST['status'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$nationality=$_POST['nationality'];
$mobile=$_POST['mobile'];
$dob=$_POST['dob'];

$s=" select * from userinfo where email='$email'";

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if ($num == 1){
	echo" Emaill Not Available";
}else{
	$reg=" INSERT INTO userinfo (role, status, username, email, password, gender, nationality, mobile, dob) 
        VALUES ('$role','$status','$username','$email', '$password','$gender','$nationality','$mobile','$dob')";

	mysqli_query ($con, $reg);
	echo "Registration Successfully";
}

?>
