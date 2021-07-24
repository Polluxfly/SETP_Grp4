<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
    }

$loginuser = $_SESSION['userid'];
$enrolledid = $_GET['id'];
$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
mysqli_select_db($con,'sql6423581');

$update_query = " UPDATE `enrollmentinfo` SET `paystatus`=1 WHERE enrollmentid = $enrolledid; ";
   
$result = mysqli_query($con, $update_query);

?>

<html>
<style>
body {
  background-image: url("homepage_back.jpg");
}
</style>
<head>

    <title>OH, Hi YO !</title>
    <link href="css/success.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>

       <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="logo.png" alt="logo"></div>

        <div class="container mt-4">
        <span>
	<h2> Thank you for purchasing</h2>
        <hr>
        <p>Your purchase is successful</p>
        <p>Check your email for the invoice</p>
	<p><a href="studenthome.php" class="clickme">Back to Home Page</p>
        </span>  
   	</div>
</body>
</html>
