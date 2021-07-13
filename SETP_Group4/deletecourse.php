

<?php

    try{
        $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
    }catch(mysqli_Sql_Exception $ex)
    {
        echo("error in connecting");
    }

    mysqli_select_db($con,'sql6423581');


    if(isset($_GET['Del']))
    {
        $CourseID = $_GET['Del'];
        echo($CourseID[2]);
        $query = "DELETE FROM courseinfo WHERE courseid = '".$CourseID."'";
        try{
            $result= mysqli_query($con,$query);
            if($result)
            {
                if(mysqli_affected_rows($con)>0)
                {
                    echo("Student Deleted !");
                    header("location:coursedetails.php");
                }else{
                    echo("Data Not Deleted");
                    header("location:coursedetails.php ");
                }
            }
        }catch(Exception $ex){
            echo ("Error in Delete".$ex ->getMessage());
        }
    }
?>