<?php

session_start();
if(!isset($_SESSION['username'])){
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
    <link href="css/homepage.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>

       <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="logo.png" alt="logo"></div>
        
        <div class="navigation">
            <ul>
                <li><a href="homepage.php">Home Page</a></li>
                <li><a href="createuser.php">Registration</a></li>
                <li><a href="profile.php">Student Profile</a></li>
                <li><a href="#">Course Details</a></li>
                <li><a href="studentpaymentpage.php">Enrollment</a></li>
                <li><a href="#">Student Progress</a></li>
                <li><a href="report.php">Report</a></li>

            </ul>
        </div>
    

       <h1>Hi, <?php echo $_SESSION['username']; ?> !</h1>
        
              
    </body>

    </html>
