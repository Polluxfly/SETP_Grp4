<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>

<!-- 
1. Add Appeal button for the Student Enrollment page, click add to set status
Show edit when status == 1; 
2. Course ID for Search
-->

<head>

    <title>Admin Enrollment</title>
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
            <li><a href="profile.php">Student Profile</a></li>
            <li><a href="coursedetails.php">Course Details</a></li>
            <li><a href="adminenrollment.php">Enrollment</a></li>
            <li><a href="enquiry.php">Enquiries</a></li>
            <li><a href="report.php">Management Reports</a></li>
        </ul>
    </div>
        
    <div class="container">
    <section class="section1">
        <div class="messagebox"><h4> New Enrollment </h4></div>
        <form method="post" action="adminenrollment.php">

            <div class="form-group">
                <label>Course ID</label>
                <input type="number" name="courseid" class="form-control" required>
            </div><br>
            <div class="form-group">
                <label>Student ID</label>
                <input type="number" name="userid" class="form-control" required>
            </div><br>

            <button type="submit" class="btn2" name="Add">Add</button><br><br>

 <?php
$CourseID = (isset($_POST['courseid']) ? $_POST['courseid'] : '');
$UserID = (isset($_POST['userid']) ? $_POST['userid'] : '');

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');

if($con->connect_error){
    die("Connection failed". $con->connect_error);  
}

if(isset($_POST['Add'])){
    $isValueValid = true;

    $studentIDValidationQuery="SELECT userid FROM userinfo WHERE userid = $UserID ";
    $studentIDResult=mysqli_query($con,$studentIDValidationQuery);
    if(mysqli_num_rows($studentIDResult) > 0)
        $isValueValid = true;
    else
    {
        $isValueValid = false;
        echo("<br>Student ID is invalid!");
    }

    $courseIDValidationQuery="SELECT courseid FROM courseinfo WHERE courseid = $CourseID ";
    $courseIDResult=mysqli_query($con,$courseIDValidationQuery);
    if(mysqli_num_rows($courseIDResult) > 0)
        $isValueValid = true;
    else
    {
        $isValueValid = false;
        echo("<br>Course ID is invalid!");
    }
 
    if(!$isValueValid)
    {
        echo("<br>Failed to add Enrollment.");
    }

    if($isValueValid)
    {
        $query ="INSERT INTO `enrollmentinfo` (`courseid`, `userid`, `paystatus`)
        VALUES ('$CourseID', '$UserID', b'0')";
        try{
            $result=mysqli_query($con,$query);
            if($result){
                if(mysqli_affected_rows($con)>0)
                {
                    echo("New Enrollment Added!");
                }else{
                    echo("Failed to add Enrollment!");
                }
            }
        }catch(Exception $ex){
            echo("Error In Update".$ex->getMessage());
        }
    }

}
?>
        </form>
        <form method="post" action="adminenrollment.php">
            <div class="messagebox"><h4> Search Enrollment </h4></div>
            <div class="form-group">
                <label>Course ID</label>
                <input type="number" name="courseid" class="form-control">
            </div><br>
            <div class="form-group">
                <label>Student ID</label>
                <input type="number" name="studentid" class="form-control">
            </div><br>
            <button type="submit" class="btn2" name="Search">Search</button>
        </form>


<?php
$StudentID = (isset($_POST['studentid']) ? $_POST['studentid'] : '');
$CourseID = (isset($_POST['courseid']) ? $_POST['courseid'] : '');

if(isset($_POST['Search'])){
    header("location:searchenrollment.php?para=$StudentID,$CourseID");
}


?>
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
                    $StudentID = $row['userid'];
                    $EnrollmentID = $row["enrollmentid"];
                    $CourseID = $row["courseid"];
                    $CourseLevel = $row['courselevel'];
                    $AppealStatus = $row['appealstatus'];
                    $StudentName = $row['username'];
                    if($row['paystatus'] == 0)
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
                    <?php  
                        if($AppealStatus == 1) 
                        {
                            ?>
                            <a href="updateenrollment.php?edit=<?php echo $EnrollmentID ?>" class="btn btn-primary btn-sm">Edit</a>
                            <?php
                        }

                    ?>
                    <a href="deleteenrollment.php?Del=<?php echo $EnrollmentID ?>" class="btn btn-danger btn-sm">Delete</a>
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