<?php

session_start();

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
        
        <div class="navigation">
            <ul>
                <li><a href="homepage.php">Home Page</a></li>
                <li><a href="createuser.php">Registration</a></li>
                <li><a href="profile.php">Student Profile</a></li>
                <li><a href="#">Course Details</a></li>
                <li><a href="studentpaymentpage.php">Enrollment</a></li>
                <li><a href="#">Student Progress</a></li>
                <li><a href="enquiry.php">Enquiries</a></li>

            </ul>
        </div>
    
        <div class="container">
            <div class="register-box">
            <div class="row">
                <div class="col-md-6 register-left">
                    <h2>User Registration</h2>
                    <form action="createuser.php" method="post">
                     

                    <div class="form-group">
                            <label>Role</label><br>
                            <select id="role" name="role">
                            <option value="Admin">Admin</option>
                            <option value="Student">Student</option>
                            </select>
                    </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" name="gender" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nationality</label>
                            <input type="text" name="nationality" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" required><br>
                        </div>
                        <button class="btn2" name="insert">Register</button>
                        
                        <p class="msg">
                        <?php


$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');

 $role = (isset($_POST['role']) ? $_POST['role'] : '');
 $status = (isset($_POST['status']) ? $_POST['status'] : '');
 $username = (isset($_POST['username']) ? $_POST['username'] : '');
 $email = (isset($_POST['email']) ? $_POST['email'] : '');
 $password = (isset($_POST['password']) ? $_POST['password'] : '');
 $gender = (isset($_POST['gender']) ? $_POST['gender'] : '');
 $nationality = (isset($_POST['nationality']) ? $_POST['nationality'] : '');
 $mobile = (isset($_POST['mobile']) ? $_POST['mobile'] : '');
 $dob = (isset($_POST['dob']) ? $_POST['dob'] : '');

$s=" select * from userinfo where email='$email'";

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);


if(isset($_POST['insert'])){
if ($num == 1){
	echo" The Email is taken. Try another.";
}else{
	$reg=" INSERT INTO userinfo (role, status, username, email, password, gender, nationality, mobile, dob) 
        VALUES ('$role','Active','$username','$email', '$password','$gender','$nationality','$mobile','$dob')";

	mysqli_query ($con, $reg);
	echo "Registration Successfully !";
}
}
?></p>
          

                    </form>
                </div>
                </div>
            </div>
        </div>
              

    </body>

    </html>
