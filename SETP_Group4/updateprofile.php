<?php

session_start();

?>

<html>
<head>

    <title>Milo Bing</title>
    <link href="css/createuser.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>
        <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="img/logo.png" alt="logo"><h1>Milo Bing Language Centre</h1></div>
        
        <div class="navigation">
            <ul>
                <li><a href="homepage.php">Home Page</a></li>
                <li><a href="createuser.php">Registration</a></li>
                <li><a href="profile.php">Student Profile</a></li>
                <li><a href="#">Course Details</a></li>
                <li><a href="#">Enrollment</a></li>
                <li><a href="#">Student Progress</a></li>
                <li><a href="#">Report</a></li>

            </ul>
        </div>
        <div class="container">
            <div class="register-box">
            <div class="row">
                <div class="col-md-6 register-left">
                    <h2>Student Update</h2>
                    <form action="update.php" method="post">
                    
                    <div class="form-group">
                            <label>Status</label>
                            <select id="status" name="status">
                            <option value="Active">Active</option>
                            <option value="Graduated">Graduated</option>
                            <option value="Withdrawn">Withdrawn</option>
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
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
              
        </body>
        </html>

