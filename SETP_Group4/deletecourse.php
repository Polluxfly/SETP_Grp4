<?php

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');
if($con->connect_error){
    die("Connection failed". $con->connect_error);  
    }

    if(isset($_GET['Del']))
    {
        $CourseID = $_GET['Del'];
        $query = "DELETE FROM `courseinfo` WHERE `courseinfo`.`courseid` = '".$CourseID."'";
        try{
            $result = mysqli_query($con, $query);
            if($result)
            {
                if(mysqli_affected_rows($con)>0)
                {
                    echo("Course Deleted!");
                }else{
                    echo("Data Not Deleted");
                }
            }
        }catch(Exception $ex){
            echo ("Error in Delete".$ex ->getMessage());
        }

        // Delete Enrollment Table as well
        $query = "DELETE FROM `enrollmentinfo` WHERE `enrollmentinfo`.`courseid` = '".$CourseID."'";
        try{
            $result = mysqli_query($con, $query);
        }catch(Exception $ex){
            echo ("Error in Delete".$ex ->getMessage());
        }

    }
?>