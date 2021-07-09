<?php

session_start();

?>


<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>
<head>

    <title>OH, Hi YO !</title>
    <link href="css/profile.css" rel="stylesheet" type="text/css" />
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
                <li><a href="#">Report</a></li>

            </ul>
        </div>
         

       <h1> Search and Update Student </h1>
        <div class="searchbox">
            <form action="" method="POST">
            <input type="text" name="userid" placeholder="Enter Student ID for search"/>
            <input type="submit" name="search" value="Search Data"/>

            </form>

            <?php

            $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
            mysqli_select_db($con,'sql6423581');

            if(isset($_POST['search']))
            {
             $userid = $_POST['userid'];
             $query = "SELCT * FROM userinfo WHERE userid='$userid'";
             $query_run = mysqli_query($con,$query);

                if($query_run)
                {
                    if(mysqli_num_rows($query_run))
                    {
                        while($rows = mysqli_fetch_array($query_run))
                        {
                            ?>
             <form action="" method="POST">
             <input type="hidden" name="userid" value="<?php echo $row['userid'] ?>"/><br>
             <input type="text" name="status" value="<?php echo $row['status'] ?>"/><br>
             <input type="text" name="username" value="<?php echo $row['username'] ?>"/><br>
             <input type="text" name="email" value="<?php echo $row['email'] ?>"/><br>
             <input type="text" name="gender" value="<?php echo $row['gender'] ?>"/><br>
             <input type="text" name="nationality" value="<?php echo $row['nationality'] ?>"/><br>
             <input type="text" name="mobile" value="<?php echo $row['mobile'] ?>"/><br>
             <input type="text" name="dob" value="<?php echo $row['dob'] ?>"/><br>

             <input type="submit" name="update" value="Update Data">

             </form>

             <?php
						}
					}else{
                            echo("No Data Are Available");           
					}
				} else{
                        echo("result error");      
				}
			}

            ?>


        </div>








        </body>
        </html>



