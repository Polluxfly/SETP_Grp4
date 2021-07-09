<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>



<html>
<style>
body {
  background-image: url("studenthomepage_back.jpg");
}
</style>
<head>

    <title>OH, Hi YO !</title>
    <link href="css/homepage.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>

       <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="logo.png" alt="logo"></div>
        
        <div class="navigation">
            <ul>
                <li><a href="studenthome.php">Home Page</a></li>
                <li><a href="studentprofile.php">Profile</a></li>
                <li><a href="#">Payment Status</a></li>
                <li><a href="#">Progress</a></li>
                

            </ul>
        </div>
    

       <h1>Hi, <?php echo $_SESSION['username']; ?> !</h1>
        
              
    </body>

    </html>
