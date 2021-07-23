<?php
//connect to mysql database
// try{
//     $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
// }catch(mysqli_Sql_Exception $ex)
// {
//     echo("error in connecting");
// }
?>

<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>
<head>

    <title>Enrollment</title>
    <link href="css/enquiry.css" rel="stylesheet" type="text/css" />
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
                <li><a href="adminenrollment.php">Enrollment</a></li>
                <li><a href="enquiry.php">Enquiries</a></li>
                <li><a href="report.php">Management Reports</a></li>
        </ul>
    </div>
        
    <div class="container">
    <section class="section1">
    <div class="messagebox"><h4> New Enrollment </h4></div>
    <form method="post" action="coursedetails.php">

        <div class="form-group">
            <label>Course ID</label>
            <input type="int" name="courseid" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label>Student ID</label>
            <input type="int" name="studentid" class="form-control" required>
        </div><br>

        <button type="submit" class="btn2" name="Add">Add</button>
 
<?php

$Status = (isset($_POST['status']) ? $_POST['status'] : '');
$CourseLevel = (isset($_POST['courselevel']) ? $_POST['courselevel'] : '');
$Batch = (isset($_POST['batch']) ? $_POST['batch'] : '');
$Duration = (isset($_POST['duration']) ? $_POST['duration'] : '');
$Teacher = (isset($_POST['teacher']) ? $_POST['teacher'] : '');
$CourseFee = (isset($_POST['coursefee']) ? $_POST['coursefee'] : '');

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');


if($con->connect_error){
die("Connection failed". $con->connect_error);  
}


if(isset($_POST['Add'])){
    $query ="INSERT INTO courseinfo (courselevel, batch, duration, teacher, status, coursefee)
        VALUES ('$CourseLevel', '$Batch', '$Duration', '$Teacher', $Status,  '$CourseFee')";
try{
    $result=$con -> query($query);
    if($result){
     if(mysqli_affected_rows($con)>0)
     {
      echo("New Course Added!");
	 }else{
      echo("Failed to add Course!");
     }
    }
}catch(Exception $ex){
    echo("Error In Update".$ex->getMessage());
}
}
?>
   </form>
    </section>
     
    <section class="section2">
        <h4> Course Enrolled</h4>
        <div class = "container2">
            <table class="table-scroll2 small-first-col">

            <tr>
                <th>ID</th>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Pay Status</th>
                <th>Action</th>
            </tr>
        
            <tbody class="body-half-screen">

            <?php
                $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
                mysqli_select_db($con,'sql6423581');
                if($con->connect_error){
                die("Connection failed". $con->connect_error);  
                }

                $sql = " SELECT *
                    FROM enrollmentinfo AS e
                    LEFT JOIN courseinfo AS c 
                    ON e.courseid = c.courseid
                    LEFT JOIN userinfo AS u
                    ON e.userid = u.userid
                    WHERE c.status = '1' AND u.role = 'Student' AND u.status = 'Active'";

                $result = $con-> query($sql);
                                             
                while($row=mysqli_fetch_assoc($result))
                {
                    $EnrollmentID = $row["enrollmentid"];
                    $CourseID = $row["courseid"];
                    $CourseLevel = $row['courselevel'];
                    $StudentID = $row['userid'];
                    $StudentName = $row['username'];
                    $Status = $row['paystatus']; 
                    if($row['status'] == 0)
                        $Status = "Not Yet";
                    else
                        $Status = "Paid";      
            ?>
            <tr>
                <td><?php echo $EnrollmentID ?></td>
                <td><?php echo $CourseID ?></td>
                <td><?php echo $CourseLevel ?></td>
                <td><?php echo $StudentID ?></td>
                <td><?php echo $StudentName ?></td>
                <td><?php echo $Status ?></td>
                <td>
                    <a href="updatecourse.php?edit=<?php echo $EnrollmentID ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deletecourse.php?Del=<?php echo $EnrollmentID ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php 
               }                          
            ?> 
            </table>
        </div><br>

        <h4> Student List</h4>
        <div class = "container2">
            <table class="table-scroll small-first-col">

            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
            </tr>
        
            <tbody class="body-half-screen">

            <?php
                $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
                mysqli_select_db($con,'sql6423581');
                if($con->connect_error){
                die("Connection failed". $con->connect_error);  
                }

                $sql = " SELECT * from userinfo WHERE status = 'Active' AND role = 'Student'";
                $result = $con-> query($sql);
                        
                while($row=mysqli_fetch_assoc($result))
                {
                    $StudentID = $row['userid'];
                    $StudentName = $row['username']; 
            ?>
            <tr>
                <td><?php echo $StudentID ?></td>
                <td><?php echo $StudentName ?></td>
            </tr>
            <?php 
               }                          
            ?> 
            </table>
        </div><br>

        <h4> Available Course List</h4>
        <div class = "container2">
            <table class="table-scroll small-first-col">

            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Batch</th>
            </tr>
        
            <tbody class="body-half-screen">

            <?php
                $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
                mysqli_select_db($con,'sql6423581');
                if($con->connect_error){
                die("Connection failed". $con->connect_error);  
                }

                $sql = " SELECT * from courseinfo WHERE status = '1'";
                $result = $con-> query($sql);
                        
                while($row=mysqli_fetch_assoc($result))
                {
                    $CourseID = $row["courseid"];
                    $CourseLevel = $row['courselevel'];
                    $Batch = $row['batch'];
            ?>
            <tr>
                <td><?php echo $CourseID ?></td>
                <td><?php echo $CourseLevel ?></td>
                <td><?php echo $Batch ?></td>
            </tr>
            <?php 
               }                          
            ?> 
            </table>
        </div>
    </section>
</body>   
       
</html>