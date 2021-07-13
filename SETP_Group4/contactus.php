<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<style>
body {
  background-image: url("contactus.jpg");
}
</style>
<head>

    <title>OH, Hi YO !</title>
    <link href="css/contactus.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>
        <div class="companylogo"><img src="logo.png" alt="logo"></div>
        
        <div class="navigation">
            <ul>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="index.php">Login</a></li>

            </ul>
        </div>
 
    <div class="container">
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            OH, Hi YO! Language Centre Pte Ltd.
          </p>

          <div class="info">
            <div class="information">
              <p>Address : #23-01 & #23-02, Tower 1, Robinson Road 123456 Singapore</p>
            </div>
            <div class="information">
              <p>Email : ohhiyo@ohy.edu.sg</p>
            </div>
            <div class="information">
              <p>Tel : +65 2335 6789</p>
            </div>
          </div>

          
        </div>

        <div class="contact-form">

          <form action="" method="post" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" placeholder="Name" required/>
              
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" placeholder="Email" required/>
              
            </div>
            <div class="input-container">
              <input type="tel" name="mobile" class="input" placeholder="Mobile" />
              
            </div>
            <div class="input-container textarea">
              <textarea name="enquiry" class="input" placeholder="Enquiry"></textarea>
            </div>
            <input type="submit" name="insert" value="Send" class="btn" />

            <p class="msg">
                        <?php


$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');

 $name = (isset($_POST['name']) ? $_POST['name'] : '');
 $email = (isset($_POST['email']) ? $_POST['email'] : '');
 $mobile = (isset($_POST['mobile']) ? $_POST['mobile'] : '');
 $enquiry = (isset($_POST['enquiry']) ? $_POST['enquiry'] : '');


if(isset($_POST['insert'])){

	$reg=" INSERT INTO enquiry (name, email, mobile, enquiry) 
        VALUES ('$name','$email', '$mobile','$enquiry')";

	mysqli_query ($con, $reg);
	echo "Enquiry Sent Successfully ! We will contact you soon !";
}
?></p>


          </form>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
