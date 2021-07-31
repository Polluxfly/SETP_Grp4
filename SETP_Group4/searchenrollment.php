<?php
                $isValidValue = true; 
                if(isset($_GET['para']))
                    $parameters = explode(",",  $_GET['para']);
       
                if($parameters[0]!='' && $parameters[1]!='')
                {
                    $wheresql = "e.userid = '$parameters[0]' AND e.courseid = '$parameters[1]'";
                    $titleinfo = "for Student ID: $parameters[0], Course ID: $parameters[1]";
                }
                else if($parameters[0]!='' && $parameters[1]=='')
                {
                    $wheresql = "e.userid = '$parameters[0]'";
                    $titleinfo = "for Student ID: $parameters[0]";
                }
                else if($parameters[0]=='' && $parameters[1]!='')
                {
                    $wheresql = "e.courseid = '$parameters[1]'";
                    $titleinfo = "for Course ID: $parameters[1]";
                }
                else
                {
                    $isValidValue = false;
                    $titleinfo = "Not Found!";
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
    <link href="css/enquiry.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>

<body>
    <a class="logout" href="logout.php"> LOGOUT </a>
    <div class="companylogo"><img src="logo.png" alt="logo"></div>
        
    <div class="container">
    <section class="section2">
        <h4> Searched Result <?php echo $titleinfo ?></h4>
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

                if($isValidValue)
                {
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
                        WHERE c.status = '1' AND u.role = 'Student' 
                        AND u.status = 'Active' AND $wheresql";
        
                    $result = $con-> query($sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $StudentID = $row['userid'];
                        $EnrollmentID = $row["enrollmentid"];
                        $CourseID = $row["courseid"];
                        $CourseLevel = $row['courselevel'];
    
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
                    <a href="updateenrollment.php?edit=<?php echo $EnrollmentID ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="deleteenrollment.php?Del=<?php echo $EnrollmentID ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php 
                    }
                }                          
            ?> 
            </table>
        </div><br><br>

        <a href="adminenrollment.php" class="btn btn-danger">Return to Enrollment page</a>

    </section>
</body>   
       
</html>