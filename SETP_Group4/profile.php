<?php

session_start();

?>


<html>
<head>

    <title>Milo Bing</title>
    <link href="css/profile.css" rel="stylesheet" type="text/css" />
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
         
        <?php

        $con = mysqli_connect('localhost','root','','lms');
        if($con->connect_error){
        die("Connection failed". $con->connect_error);  
		}

        $result = mysqli_query($con,"SELECT * FROM userinfo");
        ?>

        <?php

        if(mysqli_num_rows($result)>0){

        ?>
        <div class="wrap">
        <table>
        <tr>
        <th>Student ID</th>
        <th>Student Status</th>
        <th>Student Name</th>
        <th>Gender</th>
        <th>Nationality</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Date of Birth</th>
        <th>Action</th>
        </tr>

        <?php
        $i=0;
          while ($row = mysqli_fetch_array($result)){

          ?>
          <tr>
          <td><?php echo $row["userid"];?></td>
          <td><?php echo $row["status"];?></td>
          <td><?php echo $row["username"];?></td>
          <td><?php echo $row["gender"];?></td>
          <td><?php echo $row["nationality"];?></td>
          <td><?php echo $row["email"];?></td>
          <td><?php echo $row["mobile"];?></td>
          <td><?php echo $row["dob"];?></td>
          <td><a href="updateprofile.php?userid=<?php echo $row["userid"];?>">Update</a></td>
          </tr>
          <?php
          $i++;
          }
          ?>


        </table></div>
        <?php

        }
        else {
        echo "No result found";
        }
        ?>
        

    </body>

    </html>
