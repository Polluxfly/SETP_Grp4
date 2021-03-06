<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
    }
	
$enrolledid = $_GET['id'];
$loginuser = $_SESSION['userid'];
$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
mysqli_select_db($con,'sql6423581');

$query = " SELECT *
              FROM enrollmentinfo AS e
              INNER JOIN courseinfo AS c 
              ON e.courseid = c.courseid
              INNER JOIN userinfo AS u
              ON e.userid = u.userid
              WHERE c.courseid = e.courseid AND e.enrollmentid = $enrolledid";
   
$result = mysqli_query($con, $query);

	if($result->num_rows>0) {
		while($row=$result->fetch_assoc()){
			$course_level = $row['courselevel'];
            $course_fee = $row['coursefee'];
		}
	}
?>
<html>
<style>
body {
  background-image: url("studenthomepage_back.jpg");
}

</style>
<head>

    <title>Make Payment</title>
    <link href="css/paypage.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">

  
</head>


<body>
        <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="logo.png" alt="logo"></div>
        <div class="navigation">
            <ul>
                <li><a href="enrollment.php">Back to confirmation</a></li>
                

            </ul>
        </div>
       

       <div class="container">
            <div class="payment-box">
            <div class="row">
                <div class="col-md-6 payment-left">

        <h4>Confirm Payment for - <b>Course <?php echo $course_level?> </b></h4>
        <h5>Total : $ <?php echo $course_fee?> </h5>
        <form action="paypage.php?id=<?php echo $enrolledid ?>" method="POST">

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email-Address</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="tel" class="form-control" name="cvv" maxlength="4" required>
                    </div>

                    <div class="form-group" name="card-number-field">
                        <label for="cardnumber">Card Number</label>
                        <input type="tel" class="form-control" name="cardnumber" maxlength="16" required>
                    </div>

                    <div class="form-group" name="expiration">
                        <label>Expiration Date</label>
                        <select>
                            <option value="01">Jan</option>
                            <option value="02">Feb </option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sept</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                        <select>
                            <option value="22"> 2022</option>
                            <option value="23"> 2023</option>
                            <option value="24"> 2024</option>
                            <option value="25"> 2025</option>
                            <option value="26"> 2026</option>
                            <option value="27"> 2027</option>
                        </select>
                    </div>
                    <div class="form-group" name="credit_cards">
                        <img src="visa.jpg" name="visa">
                        <img src="mastercard.jpg" name="mastercard">
                        <img src="amex.jpg" name="amex">
                    </div>
                    <div class="form-group" name="pay-now">
                        <button type="submit" class="btn2" name="Confirm">Confirm</button>
						
						<?php 
							$FullName = (isset($_POST['name']) ? $_POST['name'] : '');
							$Email = (isset($_POST['email']) ? $_POST['email'] : '');
							$CVV = (isset($_POST['cvv']) ? $_POST['cvv'] : '');
							$CardNumber = (isset($_POST['cardnumber']) ? $_POST['cardnumber'] : '');
							$isValueValid = '';
							
							$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
							mysqli_select_db($con,'sql6423581');
							
							if($con->connect_error){
							die("Connection failed". $con->connect_error);  
							}
							
							if(isset($_POST['Confirm'])){
								if(strlen($FullName) <= 5)
								{
									echo "<div>Please enter full name</div>";
									$isValueValid = false;
								}
								if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
								{
									echo "<div>Email is invalid!</div>";
									$isValueValid = false;
								}
								if(strlen($CVV) <= 2)
								{
									echo "<div>CVV is invalid!</div>";
									$isValueValid = false;
								}
								if(strlen($CardNumber) <= 15)
								{
									echo "<div>CardNumber is invalid!</div>";
									$isValueValid = false;
								}

								else
								{	
									//echo $enrolledid;
									$updatequery = " UPDATE `enrollmentinfo` SET `paystatus`=1 WHERE enrollmentid = $enrolledid; ";
									try{
										$updateresult= mysqli_query($con, $updatequery);
										if($updateresult){
											if(mysqli_affected_rows($con)>0)
											{
											header("Location: success.php");
											}else{
											echo("Failed to pay Course!");
											}
										}
									}catch(Exception $ex){
										echo("Error In Update".$ex->getMessage());
									}
								}
							}
						?>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>