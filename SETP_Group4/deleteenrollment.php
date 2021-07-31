<?php

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');
if($con->connect_error){
    die("Connection failed". $con->connect_error);  
    }

    if(isset($_GET['Del']))
    {
        $EnrollmentID = $_GET['Del'];
        $query = "DELETE FROM `enrollmentinfo` WHERE `enrollmentinfo`.`enrollmentid` = '".$EnrollmentID."'";
        try{
            $result = mysqli_query($con, $query);
            if($result)
            {
                if(mysqli_affected_rows($con)>0)
                {
                    echo("Enrollment Deleted!");
                    header("location:adminenrollment.php");
                }else{
                    echo("Data Not Deleted");
                    header("location:adminenrollment.php ");
                }
            }
        }catch(Exception $ex){
            echo ("Error in Delete".$ex ->getMessage());
        }
    }
?>