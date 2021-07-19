

<?php
   session_start();
   if(!isset($_SESSION['userid'])){
       header('location:index.php');
   	}
   
   $loginuser = $_SESSION['userid'];
   	
   $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
   $query = " SELECT * FROM `enrollmentinfo` WHERE userid='$loginuser'; ";
   mysqli_select_db($con,'sql6423581');
   $result = mysqli_query($con, $query);
   
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
                  <h1>Enroll in a course now ! <?php echo $_SESSION['username'] ?></h1>
               </span>
			   </div>
            </div>
            <div class="col-sm">
			  <div class="wrap">
               <table class="">
                  <tr class="">
                     <td> Enrollment ID </td>
                     <td> Course ID </td>
                     <td> Course Level </td>
                     <td colspan="7"> Status </td>
                  </tr>
                  <?php 
                     while($row=mysqli_fetch_assoc($result))
                     {
                         $EnrollmentID= $row['enrollmentid'];
                         /*$UserID= $row[$_SESSION['userid']];*/
                         $CourseID= $row['courseid'];
                         $CourseLevel = $row['courselevel'];
                         $PaymentStatus = $row['paystatus'];
                         
                         
                     ?>
                  <tr>
                     <td><?php echo $EnrollmentID ?></td>
                     <td><?php echo $CourseID ?></td>
                     <td><?php echo $CourseLevel ?></td>
                     <td><?php if ($PaymentStatus == 1) : ?>
                        <a href="studenthome.php"> Paid </a>
                        <?php else : ?>
                        <a href="paypage.php"> Not Yet </a> 
                        <?php endif; ?>
                     </td>
                     <!--td><a href="view.php?success=<?php echo $EnrollmentID ?>" class="btn btn-success btn-sm">View</a></td>
                        <td><a href="adminedit.php?edit=<?php echo $EnrollmentID ?>" class="btn btn-primary btn-sm">Edit</a></td>
                        <td><a href="delete.php?Del=<?php echo $EnrollmentID ?>" class="btn btn-danger btn-sm">Delete</a></td-->
                  </tr>
                  <?php 
                     }                          
                     ?> 
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

