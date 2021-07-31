<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>
<head>

    <title>Course Details</title>
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
    <div class="messagebox"><h4> Add New Course </h4></div>
    <form method="post" action="coursedetails.php">
        <div class="form-group">
            <label>Course Level: </label><br>
            <select id="courselevel" name="courselevel">
                <option value="N1">N1</option>
                <option value="N2">N2</option>
                <option value="N3">N3</option>
                <option value="N4">N4</option>
                <option value="N5">N5</option>
            </select>
        </div><br>

        <div class="form-group">
            <label>Course Status: </label><br>
            <select id="status" name="status">
                <option value='1'>Active</option>
                <option value='0'>Deactive</option>
            </select>
        </div><br>

        <div class="form-group">
            <label>Course Fee</label>
            <input type="number" name="coursefee" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label>Duration (Month)</label>
            <input type="number" name="duration" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label>Teacher</label>
            <input type="text" name="teacher" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label>Batch</label>
            <input type="number" name="batch" class="form-control" required>
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
    $isValueValid = true;
    if($Batch == 0)
    {
        echo("<br>Batch Value is invalid, failed to add Course!");
        $isValueValid = false;
    }
    if($CourseFee == 0)
    {
        echo("<br>CourseFee Value is invalid, failed to add Course!");
        $isValueValid = false;
    }
    if($Duration == 0)
    {
        echo("<br>Duration Value is invalid, failed to add Course!");
        $isValueValid = false;
    }

    if($isValueValid)
    {
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
}


?>
   </form>
    </section>
     
    <section class="section2">
        <h4> Course Ongoing </h4>
        <div class = "container2">
            <table class="table-scroll2 small-first-col">

            <tr>
                <th>ID</th>
                <th>Level</th>
                <th>Fee</th>
                <th>Status</th>
                <th>Batch</th>
                <th>Duration</th>
                <th>Teacher</th>
                <th>Actions</th>
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
                    $CourseFee = $row['coursefee'];
                    $CourseLevel = $row['courselevel'];
                    $Batch = $row['batch'];
                    $Duration = $row['duration'];
                    $Teacher = $row['teacher']; 
                    if($row['status'] == 0)
                        $Status = "Deactive";
                    else
                        $Status = "Active";      
            ?>
            <tr>
                <td><?php echo $CourseID ?></td>
                <td><?php echo $CourseLevel ?></td>
                <td><?php echo $CourseFee ?></td>
                <td><?php echo $Status ?></td>
                <td><?php echo $Batch ?></td>
                <td><?php echo $Duration ?></td>
                <td><?php echo $Teacher ?></td>
                <td>
                    <a href="updatecourse.php?edit=<?php echo $CourseID ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deletecourse.php?Del=<?php echo $CourseID ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php 
               }                          
            ?> 
            </table>
        </div><br><br>

        <h4> Course Finished</h4>
        <div class = "container2">
            <table class="table-scroll small-first-col">

            <tr>
                <th>ID</th>
                <th>Level</th>
                <th>Fee</th>
                <th>Status</th>
                <th>Batch</th>
                <th>Duration</th>
                <th>Teacher</th>
                <th>Actions</th>
            </tr>
        
            <tbody class="body-half-screen">

            <?php
                $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
                mysqli_select_db($con,'sql6423581');
                if($con->connect_error){
                die("Connection failed". $con->connect_error);  
                }

                $sql = " SELECT * from courseinfo WHERE status = '0'";
                $result = $con-> query($sql);

                                             
                while($row=mysqli_fetch_assoc($result))
                {
                    $CourseID = $row["courseid"];
                    $CourseFee = $row['coursefee'];
                    $CourseLevel = $row['courselevel'];
                    $Batch = $row['batch'];
                    $Duration = $row['duration'];
                    $Teacher = $row['teacher']; 
                    if($row['status'] == 0)
                        $Status = "Deactive";
                    else
                        $Status = "Active";      
            ?>
            <tr>
                <td><?php echo $CourseID ?></td>
                <td><?php echo $CourseLevel ?></td>
                <td><?php echo $CourseFee ?></td>
                <td><?php echo $Status ?></td>
                <td><?php echo $Batch ?></td>
                <td><?php echo $Duration ?></td>
                <td><?php echo $Teacher ?></td>
                <td>
                    <a href="updatecourse.php?edit=<?php echo $CourseID ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deletecourse.php?Del=<?php echo $CourseID ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php 
               }                          
            ?> 
            </table>
        </div>
    </section>
</body>   
       
</html>