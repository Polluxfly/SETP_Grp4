

<?php
   session_start();
   if(!isset($_SESSION['userid'])){
       header('location:index.php');
   	}
   
   $loginuser = $_SESSION['userid'];
   $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
   mysqli_select_db($con,'sql6423581');
   
   $query = " SELECT *
              FROM enrollmentinfo AS e
              INNER JOIN courseinfo AS c 
              ON e.courseid = c.courseid
              INNER JOIN userinfo AS u
              ON e.userid = u.userid
              WHERE c.status = '1' AND u.status = 'Active' AND u.userid = '$loginuser'";

   $result = mysqli_query($con, $query);
   
   while($row=mysqli_fetch_assoc($result)) {
					  if($row['userid'] != $loginuser)
					  {
				      continue;
					  }
					  $user_name = $row['username'];
					  $EnrollmentID= $row['enrollmentid'];
                      $CourseID= $row['courseid'];
                      $CourseLevel = $row['courselevel'];
					  $CourseFee = $row['coursefee'];
					  $Status = $row['paystatus'];
                      if($row['paystatus'] == 0)
                        $Status = "Not Yet";
                      else
                        $Status = "Paid";     
					 }
	
   ?>
<html>
   <style>
      body {
      background-image: url("studenthomepage_back.jpg");
      }
   </style>
   <head>
      <title>enrollmentpage</title>
      <link href="css/enrollment.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="Bootstrap/bootstrap.css">
   </head>
   <body>
      <a class="logout" href="logout.php"> LOGOUT </a>
      <div class="companylogo"><img src="logo.png" alt="logo"></div>
      <div class="navigation">
         <ul>
            <li><a href="studenthome.php">Home Page</a></li>
            <li><a href="studentprofile.php">My Profile</a></li>
            <li><a href="coursedetails.php">Course Details</a></li>
            <li><a href="enrollment.php">Enrollment</a></li>
            <li><a href="#">My Progress</a></li>
         </ul>
      </div>
      <div class="container" style="position: absolute; top: 45%; left: 15%">
         <div class="row">
            <div class="col-sm">
               <div class="">
			   <span>
                  <h1>Enroll in a course now ! <?php echo $user_name; ?></h1>
               </span>
			   </div>
            </div>
            <div class="col-sm">
			  <div class="">
               <table class="">
                  <tr class="">
                     <td> Enrollment ID </td>
                     <td> Course ID </td>
                     <td> Course Level </td>
					 <td> Course Fee </td>
                     <td> Status </td>
					 <td> Pay </td>
                  </tr>
                  <tr>
                     <td><?php echo $EnrollmentID ?></td>
                     <td><?php echo $CourseID ?></td>
                     <td><?php echo $CourseLevel ?></td>
					 <td><?php echo $CourseFee ?></td>
                     <td><?php echo $Status ?></td>
					 <td><?php if($Status == 'Not Yet'){ echo "<a href=\"paypage.php\" class=\"btn btn-primary btn-sm\" style=\"right: 50px\" >Pay</a>"; }?></td>
                  </tr>
			   </table>
			   </div>
            </div>
         </div>
      </div>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/bs-init.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
   </body>
</html>
