<?php

session_start();

?>



<html>
<style>
body {
  background-image: url("background.jpg");
}
</style>
<head>

    <title>OH, Hi YO !</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>

     <div class="navigation">
            <ul>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="index.php">Login</a></li>

            </ul>
        </div>
    
    <div class="companylogo"><img src="logo.png" alt="logo"></div>

    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-center">
                    <h2>Login</h2>
                    <form action="validation.php" method="post">
                    <?php if (isset($_GET['error'])){?><p class="error"><?php echo $_GET['error']; ?></p><?php } ?>
                    
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" name="userid" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                       

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="contactbox"><img src="contactbox.png" alt="contactbox"></div>


</body>

</html>