
<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:index.php');
    }

$loginuser = $_SESSION['userid'];
$enrolledid = $_GET['id'];
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

if($result->num_rows>0)
   {
   while($row=$result->fetch_assoc())
   {
   $course_level = $row['courselevel'];
   }
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
    <link href="css/paypage.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
  
</head>


<body>
        <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="logo.png" alt="logo"></div>
        <div class="navigation">
            <ul>
                <li><a href="enrollment.php">Back to confirmation</a></li>
                

            </ul>
        </div>
        
       <div class="blink">
       <br>
       <span>
        <h2 style="text-align: center;">Check out</h2>
        <h3 style="text-align: center;">Choose a payment for <b>Course <?php echo $course_level?> </b></h3>
       </span>
       </div>
       <div class="" style="position: absolute; width: 500px; top: 35%; left: 40%">
       <h1>Confirm Purchase</h1>
            <div class="payment">
                <form>
                    <div class="form-group owner">
                        <label for="owner">Owner</label>
                        <input type="text" class="form-control" id="owner">
                    </div>
                    <div class="form-group owner">
                        <label for="email">Email-Address</label>
                        <input type="text" class="form-control" id="owner">
                    </div>
                    <div class="form-group CVV">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" id="cvv">
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber">
                    </div>
                    <div class="form-group" id="expiration-date">
                        <label>Expiration Date</label>
                        <select>
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
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
                    <div class="form-group" id="credit_cards">
                        <img src="visa.jpg" id="visa">
                        <img src="mastercard.jpg" id="mastercard">
                        <img src="amex.jpg" id="amex">
                    </div>
                    <div class="form-group" id="pay-now">
                        <button type="submit" class="btn btn-primary" id="confirm-purchase">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<script type="text/javascript">
		currentURL = window.location.href;
		var phpVars = currentURL.slice(44); //Change number according to currentURL, to check use alert currentURL.
	</script>
	<script type="text/javascript" src="scr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.payform.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>

