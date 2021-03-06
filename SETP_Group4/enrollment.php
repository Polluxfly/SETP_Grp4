

<?php
   session_start();
   if(!isset($_SESSION['userid'])){
       header('location:index.php');
   	}
   
   $loginuser = $_SESSION['userid'];
   $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
   mysqli_select_db($con,'sql6423581');
   
   $namequery = "select username from userinfo where userinfo.userid = '$loginuser'";   

   $nameresult = mysqli_query($con, $namequery);
      
	if($nameresult->num_rows>0)
	{
		while($row=$nameresult->fetch_assoc())
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
      <title>Enrollment Page</title>
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
            <li><a href="enrollment.php">Enrollment</a></li>
         </ul>
      </div>
      <div class="messagebox">
         <div class="row">
            <div class="col-sm-6">
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
                     		  WHERE c.status = '1' AND u.status = 'Active' AND u.userid = '$loginuser' ORDER BY paystatus";
                     $result = mysqli_query($con, $SQL) or die('A error occured: ');
                     $number_of_rows = mysqli_num_rows($result);
                     	echo '<table class="table-scroll small-first-col">';
                     echo '<thead>';
                     	echo '<tr>';
                     	echo '  <th>Enrollment ID </th>';
                     	echo '  <th>Course ID </th>';
                     	echo '  <th>Course Level </th>';
                     	echo '  <th>Course Fee </th>';
						echo '	<th>Payment Status</th>';
						echo '<th>Action</th>';
					    echo '  <th>Appeal </th>';
                     echo '</thead>';
                     	echo '</tr>';
                     
                     	while ($Row = mysqli_fetch_assoc($result)) {
                     			echo '<tr>';
                     			echo '<td>' . $Row['enrollmentid'] . '</td>';
                     			echo '<td>' . $Row['courseid'] . '</td>';
                     			echo '<td>' . $Row['courselevel'] . '</td>';
								echo '<td>' . '$' .$Row['coursefee'] . '</td>';
								// button for appeal.
								
								// condition to show paid or not paid
								if($Row['paystatus'] == 0)
									{
									echo "<td> Not Yet</td>";
									}
									else
									{
									echo "<td> Paid</td>";
									}
								// if paid show button else show an empty block.
								// button will redirect to the paypage with id based on enrollmentid
								if ($Row['paystatus'] == '0')
								    { 
								    $id = $Row['enrollmentid'];
								    echo "<td><a href=\"paypage.php?id=$id\"><button class=\"btn btn-primary btn-sm\" style=\"right: 50px\">Pay</button></a></td>";
								    } 
								    else
								    { 
								    echo"<td>  </td>";
								   }
							    if ($Row['appealstatus'] == 0)
								    {
									$id = $Row['enrollmentid'];
								    echo "<td><a href=\"appeal.php?id=$id\"><button class=\"btn btn-danger btn-sm\" style=\"right: 50px\">Appeal</button></a></td>";
								    } else {
								    echo "<td> Appealed </td>";	
								    }
                                echo '</tr>';
                           }
                        echo '</table>'
                     ?>
               </div>
            </div>
            
                                            
                 
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

