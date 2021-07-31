<?php
$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
mysqli_select_db($con,'sql6423581');
$CourseID = "";
$CourseFee ="";
$CourseLevel="";
$Batch="";
$Duration="";
$Teacher="";
$Status ="";

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
                while($row = mysqli_fetch_array($result))
                {
                    $CourseFee = $row['coursefee'];
                    $CourseLevel = $row['courselevel'];
                    $Batch = $row['batch'];
                    $Duration = $row['duration'];
                    $Teacher = $row['teacher']; 
                    
                    if($row['status'] == 0)
                        $Status = "Deactive";
                    else
                        $Status = "Active";
                }
            }else{
                echo("Course Not Found !");     
            }
        }
    }catch(Exception $ex){
        echo ("Error in Search Current Course ID".$ex ->getMessage());
    }
}

function getData()
{
    $data = array();
    $data[1]=$_POST['coursefee'];
    $data[2]=$_POST['courselevel'];
    $data[3]=$_POST['batch'];
    $data[4]=$_POST['duration'];
    $data[5]=$_POST['teacher'];
    $data[6]=$_POST['status'];
    return $data;
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
                    <h2>Edit Course Info</h2>
                    <form action="updatecourse.php?edit=<?php echo $CourseID ?>" method="post">

                    <p name="courseid">Course ID : <?php echo ($CourseID);?></p>

                    <div class="form-group">
                        <label>Course Level: </label><br>
                        <select id="courselevel" name="courselevel">
                            <option> <?php echo ($CourseLevel);?></option>
                            <option value="N1">N1</option>
                            <option value="N2">N2</option>
                            <option value="N3">N3</option>
                            <option value="N4">N4</option>
                            <option value="N5">N5</option>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label>Course Status: </label><br>
                        <select id="status" name="status" default="<?php echo ($Status);?>">
                        <option> <?php echo ($Status);?></option>
                            <option value='1'>Active</option>
                            <option value='0'>Deactive</option>
                        </select>
                    </div><br>


                    <div class="form-group">
                        <label>Course Fee</label>
                        <input type="number" name="coursefee" class="form-control" value="<?php echo ($CourseFee);?>" required>
                    </div><br>
                    <div class="form-group">
                        <label>Duration (Month)</label>
                        <input type="number" name="duration" class="form-control"  value="<?php echo ($Duration);?>" required>
                    </div><br>
                    <div class="form-group">
                        <label>Teacher</label>
                        <input type="text" name="teacher" class="form-control"  value="<?php echo ($Teacher);?>" required>
                    </div><br>
                    <div class="form-group">
                        <label>Batch</label>
                        <input type="number" name="batch" class="form-control"  value="<?php echo ($Batch);?>" required>
                    </div><br>

                    <button class="btn2" name="update">Update</button><br><br>
                    <a href="coursedetails.php" class="btn btn-danger">Return to last page</a>

<?php
$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');
if($con->connect_error){
    die("Connection failed". $con->connect_error);  
    }

if(isset($_GET['edit']))
    $CourseID = $_GET['edit'];

if(isset($_POST['update']))
{
    $info = getData();   

    $query ="UPDATE courseinfo SET coursefee='$info[1]', courselevel='$info[2]',
        batch='$info[3]', duration='$info[4]', teacher='$info[5]' 
        WHERE `courseinfo`.courseid = '".$CourseID."'";

    $statusquery = "UPDATE courseinfo SET courseinfo.status=$info[6] 
        WHERE `courseinfo`.courseid = '".$CourseID."'";
    try{
        $result=mysqli_query($con,$query);
        $statusresult=mysqli_query($con,$statusquery);
        if($result || $statusresult){
            if(mysqli_affected_rows($con)>0)
            {
                echo("Details Updated !");
                header("location:coursedetails.php");
            }else{
                echo("Update Failed !");
                header("location:coursedetails.php");
            }
        }
    }
    catch(Exception $ex){
        echo("Error In Update".$ex->getMessage());
    }

}


?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>