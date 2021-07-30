<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
    }

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