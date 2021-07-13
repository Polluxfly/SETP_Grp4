<?php
//connect to mysql database
try{
    $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
}catch(mysqli_Sql_Exception $ex)
{
    echo("error in connecting");
}

mysqli_select_db($con,'sql6423581');
?>

<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>
<head>

    <title>OH, Hi YO !</title>
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
            <li><a href="enrollment.php">Enrollment</a></li>
            <li><a href="#">Student Progress</a></li>
            <li><a href="enquiry.php">Enquiries</a></li>
        </ul>
    </div>
        
    <div class="container">
    <div class="search-box">
    <div class="row">
    <div class="col-md-6 enquiry-left">
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
            <label>Duration (Month)</label>
            <input type="text" name="duration" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label>Teacher</label>
            <input type="text" name="teacher" class="form-control" required>
        </div><br>
        <div class="form-group">
            <label>Batch</label>
            <input type="text" name="batch" class="form-control" required>
        </div><br>

        <button type="submit" class="btn2" name="Add">Add</button>

<?php

 $CourseLevel = (isset($_POST['courselevel']) ? $_POST['courselevel'] : '');
 $Batch = (isset($_POST['batch']) ? $_POST['batch'] : '');
 $Duration = (isset($_POST['duration']) ? $_POST['duration'] : '');
 $Teacher = (isset($_POST['teacher']) ? $_POST['teacher'] : '');

if(isset($_POST['Add'])){
    $query ="INSERT INTO courseinfo (courselevel, batch, duration, teacher)
        VALUES ('$CourseLevel', '$Batch', '$Duration', '$Teacher')";
try{
	mysqli_query ($con, $query);
	echo "Added Course Successfully!";
    $query = "";
}catch(Exception $ex){
    echo("Error In Update".$ex->getMessage());
}
}

?>
    </form>
      
    <div class="wrap">
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Level</th>
                <th>Batch</th>
                <th>Duration</th>
                <th>Teacher</th>
                <th>Actions</th>
            </tr>

            <?php
                $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
                mysqli_select_db($con,'sql6423581');
                if($con->connect_error){
                die("Connection failed". $con->connect_error);  
                }

                $sql = " SELECT * from courseinfo";
                $result = $con-> query($sql);

                                             
                while($row=mysqli_fetch_assoc($result))
                {
                    $CourseID= $row['courseid'];
                    $CourseLevel = $row['courselevel'];
                    $Batch = $row['batch'];
                    $Duration = $row['duration'];
                    $Teacher = $row['teacher'];
                    
            ?>
            <tr>
                <td><?php echo $CourseID ?></td>
                <td><?php echo $CourseLevel ?></td>
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
</body>   
       
</html>