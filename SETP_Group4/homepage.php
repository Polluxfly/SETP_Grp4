<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>



<html>
<head>

    <title>Milo Bing</title>
    <link href="css/homepage.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>

       <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="img/logo.png" alt="logo"><h1>Milo Bing Language Centre</h1></div>
        
        <div class="navigation">
            <ul>
                <li><a href="homepage.php">Home Page</a></li>
                <li><a href="createuser.php">Registration</a></li>
                <li><a href="profile.php">Student Profile</a></li>
                <li><a href="#">Course Details</a></li>
                <li><a href="#">Enrollment</a></li>
                <li><a href="#">Student Progress</a></li>
                <li><a href="#">Report</a></li>

            </ul>
        </div>
    

       <h1>Welcome <?php echo $_SESSION['username']; ?> !</h1>
        
              
    </body>

    </html>
