<?php

session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
}


$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');

error_reporting(0);

$userid = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//get data from the form
function getData()
{

    $data = array();
    $data[0]=$_SESSION['userid'];
    $data[1]=$_POST['username'];
    return $data;
}

mysqli_select_db($con,'sql6423581');

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
                <li><a href="profile.php">User Profile</a></li>
                <li><a href="coursedetails.php">Course Details</a></li>
                <li><a href="enrollment.php">Enrollment</a></li>
                <li><a href="#">Student Progress</a></li>
                <li><a href="enquiry.php">Enquiries</a></li>

            </ul>
        </div>
     <div class="messagebox"><h3>
        <?php

//search
if(isset($_SESSION['userid']))
{   
    $info = getData();
    $search_query = "SELECT * FROM `userinfo` WHERE userid='$info[0]'";
    $search_result = mysqli_query($con,$search_query);
    
        if($search_result)
        {
            if(mysqli_num_rows($search_result))
            {
                while($rows = mysqli_fetch_array($search_result))
                {
                    $userid = $rows['userid'];
                    $username = $rows['username'];
				}
			}else{
                    echo("Student Not Found !");     
			}
		 }else {
                echo("Error");  
		}
        }

            ?></h3></div>

       <h1>Hello</h1><br><br>
       <div class="blink">
       <br><span><?php echo ($username);?></span>
       </div>
        
              
    </body>

    </html>
