<?php
$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
mysqli_select_db($con,'sql6423581');
$StudentID = "";
$EnrollmentID ="";
$CourseID="";
$Status="";

if(isset($_GET['edit']))
{
    $EnrollmentID = $_GET['edit'];
    $query = " SELECT * FROM enrollmentinfo WHERE enrollmentid='".$EnrollmentID."'";
    try{
        $result= mysqli_query($con,$query);
        if($result)
        {
            if(mysqli_num_rows($result))
            {
                while($row = mysqli_fetch_array($result))
                {
                    $StudentID = $row['userid'];
                    $EnrollmentID = $row["enrollmentid"];
                    $CourseID = $row["courseid"];
                    if($row['paystatus'] == 0)
                        $Status = "Not Yet";
                    else
                        $Status = "Paid";
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
    $data[1]=$_POST['courseid'];
    $data[2]=$_POST['userid'];
    $data[3]=$_POST['paystatus'];
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

    <title>Update Enrollment</title>
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
                    <form action="updateenrollment.php?edit=<?php echo $EnrollmentID ?>" method="post">

                    <p name="courseid">Enrollment ID : <?php echo ($EnrollmentID);?></p>

                    <div class="form-group">
                        <label>Pay Status: </label><br>
                        <select id="paystatus" name="paystatus" default="<?php echo ($Status);?>">
                        <option> <?php echo ($Status);?></option>
                            <option value='1'>Paid</option>
                            <option value='0'>Not Yet</option>
                        </select>
                    </div><br>


                    <div class="form-group">
                        <label>Course ID</label>
                        <input type="number" name="courseid" class="form-control" value="<?php echo ($CourseID);?>" required>
                    </div><br>
                    <div class="form-group">
                        <label>Student ID</label>
                        <input type="number" name="userid" class="form-control"  value="<?php echo ($StudentID);?>" required>
                    </div><br>

                    <button class="btn2" name="update">Update</button><br><br>
                    <a href="adminenrollment.php" class="btn btn-danger">Return to Enrollment page</a>

<?php
if(isset($_GET['edit']))
    $EnrollmentID = $_GET['edit'];

if(isset($_POST['update'])){
    $info = getData();   

    $studentIDValidationQuery="SELECT userid FROM userinfo WHERE userid = '$info[2]' ";
    $studentIDResult=mysqli_query($con,$studentIDValidationQuery);
    if(mysqli_num_rows($studentIDResult) > 0)
        $isValueValid = true;
    else
    {
        $isValueValid = false;
        echo("<br>Student ID is invalid!");
    }

    $courseIDValidationQuery="SELECT courseid FROM courseinfo WHERE courseid = '$info[1]' ";
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
        $query ="UPDATE `enrollmentinfo` SET courseid='$info[1]', userid='$info[2]',
        paystatus=$info[3], appealstatus=0 WHERE enrollmentid = '".$EnrollmentID."'";

        try{
            $result=mysqli_query($con,$query);
            if($result){
                if(mysqli_affected_rows($con)>0)
                {
                    echo("Enrollment Updated !");
                    header("location:adminenrollment.php");
                }else{
                    echo("Update Failed !");
                    header("location:adminenrollment.php");
                }
            }
        }catch(Exception $ex){
            echo("Error In Update".$ex->getMessage());
        }

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