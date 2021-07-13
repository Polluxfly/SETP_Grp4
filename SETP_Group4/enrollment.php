<?php

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
$query = " select * from enrollmentinfo";
mysqli_select_db($con,'sql6423581');
$result = mysqli_query($con, $query);

?>

<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>
<head>

    <title>enrollmentpage</title>
    <link href="css/createuser.css" rel="stylesheet" type="text/css" />
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
            <li><a href="#">Report</a></li>

        </ul>
    </div>

    <div class="container">
        <div class="register-box">
            <div class="row">
                <div class="col-md-6 register-left">
                    <h2>Enrollment Details</h2>
                    <form action="update.php" method="post">

                        <div class="form-group">
                            <label>User ID</label>
                            <input type="int" name="userid" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Course ID</label>
                            <input type="int" name="courseid" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-22">
                <div class="card bg-dark text-white mt-5">
                    <h3 class="text-center py-3"> Enrollment List </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col"> 
            <div class="card">
                    <div class="card-title"></div>

                    <div class="card-body">
                        <table class="table table-striped">

                            <tr>
                                <a href="register.php" class="btn btn-primary mb-3">Add New Enrollment</a>
                            </tr>                            
                            
                            <tr class="bg-success text-white ">
                                <td> Enrollment ID </td>
                                <td> User ID </td>
                                <td> Course ID </td>
                                <td> Course Level </td>
                                <td colspan="7"> Status </td>
                            </tr>

                            <?php 
                                
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $EnrollmentID= $row['courseid'];
                                    $UserID= $row['userid'];
                                    $CourseID= $row['courseid'];
                                    $CourseLevel = $row['courselevel'];
                                    $PaymentStatus = $row['paymentstatus'];
                                    if ($PaymentStatus == 1)
                                    {
                                        $PaymentStatusStr = "Paid";
                                    }else{
                                        $PaymentStatusStr = "Not Yet";
                                    }
                                    
                            ?>
                                <tr>
                                    <td><?php echo $EnrollmentID ?></td>
                                    <td><?php echo $UserID ?></td>
                                    <td><?php echo $CourseID ?></td>
                                    <td><?php echo $CourseLevel ?></td>
                                    <td><?php echo $PaymentStatusStr ?></td>
                                    <td><a href="view.php?success=<?php echo $EnrollmentID ?>" class="btn btn-success btn-sm">View</a></td>
                                    <td><a href="adminedit.php?edit=<?php echo $EnrollmentID ?>" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="delete.php?Del=<?php echo $EnrollmentID ?>" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                            
                            <?php 
                                }                          
                            ?> 
                        </table>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</body>

</html>