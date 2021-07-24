

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
   
   if($result->num_rows>0)
   {
   while($row=$result->fetch_assoc())
   {
   $user_name = $row['username'];
   
   }
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
      <div class="container" style="position: absolute; top: 45%; left: 12%;">
         <div class="row">
            <div class="col-sm-4">
               <div class="">
                  <span>
                     <h1>Enroll in a course now ! <?php echo $user_name; ?></h1>
                  </span>
               </div>
            </div>
            <div class="col-sm-6" >
               <div class="">
                  <?php
                     $SQL = 	" SELECT *
                     		  FROM enrollmentinfo AS e
                     		  INNER JOIN courseinfo AS c 
                     		  ON e.courseid = c.courseid
                     		  INNER JOIN userinfo AS u
                     		  ON e.userid = u.userid
                     		  WHERE c.status = '1' AND u.status = 'Active' AND u.userid = '$loginuser'";
                     
                     $result = mysqli_query($con, $SQL) or die('A error occured: ');
                     $number_of_rows = mysqli_num_rows($result);
                     	echo '<table class="table-scroll small-first-col">';
                     echo '<thead>';
                     	echo '<tr>';
                     	echo '  <th>Enrollment ID </th>';
                     	echo '  <th>Course ID </th>';
                     	echo '  <th>Course Level </th>';
                     	echo '  <th>Course Fee </th>';
                     echo '</thead>';
                     	echo '</tr>';
                     
                     	while ($Row = mysqli_fetch_assoc($result)) {
                     			echo '<tr>';
                     			echo '<td>' . $Row['enrollmentid'] . '</td>';
                     			echo '<td>' . $Row['courseid'] . '</td>';
                     			echo '<td>' . $Row['courselevel'] . '</td>';
                     			echo '<td>' . '$' .$Row['coursefee'] . '</td>';
                              echo '</tr>';
                           }
                        echo '</table>'
                     ?>
               </div>
            </div>
            <div class="col-sm-2">
               <div class="">
                  <table class="table-scroll small-first-col">
                  <thead>
                     <tr>
                        <th>Payment Status</th>
                     </tr>
                  </thead>
                  <?php
                     $SQL = 	" SELECT *
                                    		  FROM enrollmentinfo AS e
                                    		  INNER JOIN courseinfo AS c 
                                    		  ON e.courseid = c.courseid
                                    		  INNER JOIN userinfo AS u
                                    		  ON e.userid = u.userid
                                    		  WHERE c.status = '1' AND u.status = 'Active' AND u.userid = '$loginuser'";
                                    
                                    $result = mysqli_query($con, $SQL) or die('A error occured: ');
                                    $number_of_rows = mysqli_num_rows($result);
                                             while ($Row = mysqli_fetch_assoc($result)) {
                                             if ($Row['paystatus'] == '0')
                                    	         { 
                                                $id = $Row['enrollmentid'];
                                                echo "<tr><td><button class=\"btn btn-primary btn-sm\" style=\"right: 50px\"  onclick=\"onclickRedirect()\">Pay</button></td></tr>";
                                    			   } 
                                    			   else
                                    			   { 
                                    		       echo"<tr><td><a href=\"#\" class=\"btn btn-success btn-sm\" style=\"right: 50px\" >Paid</a></td></tr>";
                                    			   }
                                          }
                                       echo '</table>'
                                    ?>                    
               </div>
            </div>
         </div>
      </div>
      <script>
         function onclickRedirect(){
         window.location.href = "paypage.php?id=<?php echo $id ?>";
          }
          
      </script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/bs-init.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
   </body>
</html>

