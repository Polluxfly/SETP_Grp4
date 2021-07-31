<?php
$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
mysqli_select_db($con,'sql6423581');

$CourseID="";
$CourseLevel="";
$Batch="";
$Duration="";
$Teacher="";

if(isset($_GET['edit']))
{
    $CourseID = $_GET['edit'];
    $query = "SELECT * FROM courseinfo WHERE courseid = '".$CourseID."'";
    try{
        $result= mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result))
            {
                while($rows = mysqli_fetch_array($result))
                {
                    $CourseLevel = $rows['courselevel'];
                    $Batch = $rows['batch'];
                    $Duration = $rows['duration'];
                    $Teacher = $rows['teacher'];
				}
			}else{
                    echo("Course Not Found !");     
			}
        }
    }catch(Exception $ex){
        echo ("Error in Search Current Course ID".$ex ->getMessage());
    }
}
?>


<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>

<head>

    <title>OH, Hi YO !</title>
    <link href="css/createuser.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>

<body>
    <a class="logout" href="logout.php"> LOGOUT </a>
    <div class="companylogo"><img src="logo.png" alt="logo"></div>

    <div class="container">
        <div class="register-box">
            <div class="row">
                <div class="col-md-6 register-left">
                    <h2>User Registration</h2>
                    <form action="createuser.php" method="post">
                    
                    <p class="row">Course ID : <?php echo ($CourseID);?></p>

                    <div class="form-group">
                        <label>Course Level: </label><br>
                        <select id="courselevel" name="courselevel" value="<?php echo ($CourseLevel);?>">
                            <option value="N1">N1</option>
                            <option value="N2">N2</option>
                            <option value="N3">N3</option>
                            <option value="N4">N4</option>
                            <option value="N5">N5</option>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label>Duration (Month)</label>
                        <input type="text" name="duration" class="form-control"  value="<?php echo ($Duration);?>" required>
                    </div><br>
                    <div class="form-group">
                        <label>Teacher</label>
                        <input type="text" name="teacher" class="form-control"  value="<?php echo ($Teacher);?>" required>
                    </div><br>
                    <div class="form-group">
                        <label>Batch</label>
                        <input type="text" name="batch" class="form-control"  value="<?php echo ($Batch);?>" required>
                    </div><br>

                    <button class="btn2" name="update">Update</button><br><br>
                    <a href="coursedetails.php" class="btn btn-danger">Return to last page</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>