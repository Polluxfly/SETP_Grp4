<?php

session_start();
header('location:updateprofile.php');

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'lms');

$userid=$_POST['userid'];
$status=$_POST['status'];
$username=$_POST['username'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$nationality=$_POST['nationality'];
$mobile=$_POST['mobile'];
$dob=$_POST['dob'];

$s=" SELECT * FROM userinfo  where userid='$userid'";

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if ($num == 1){
	echo" Emaill Not Available";
}else{
	$reg=" UPDATE userinfo set status = '$status', username='$username', email='$email', gender='$gender', nationality='$nationality', mobile = '$mobile', dob = '$dob'  WHERE userid = '$userid' ";

	mysqli_query ($con, $reg);
	echo "Updated Successfully";
}

?>
