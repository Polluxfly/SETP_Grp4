<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}

</style>
<head>

    <title>OH, Hi YO !</title>
    <link href="css/paypage.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
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
        <h3 style="text-align: center;">Choose a payment for your "Course"</h3>
       </span>
       </div>
	
	<div class="container" style="display: flex; position: absolute; top: 35%; left: 15%">
		<div class="row">
			<div class="col-sm">
				<div class="apple-payment-request-button" style="display: flex; width: 29px; padding: 30px; ">
				<img src="button-pay-with-apple.png" alt="button-pay-with-apple-logo">
			</div>
			<div class="col-sm">
				<div id="googlepay-button" class="googlepay-button" style="display: flex; width: 29px; height: 50px; padding: 30px"></div>
			</div>
			<div class="col-sm">
				<div class="PaymentContainer" style="width: 390px; padding: 10px; top: 10%">
					<img src="visa_master.png" alt="visa_master_logo" style="width: 130px;">
					<form action="charge.php" method="post" id="payment-form">
						<div class="form-row">
						<input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
						<input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
						<input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address">
						<div id="card-element" class="form-control">
						</div>
						<!-- Used to display form errors -->
						<div id="card-errors" role="alert"></div>
						</div>
						<button style="display: flex; btn btn-primary btn-sm">Submit Payment</button>
					</form>
				</div>
			</div>
			</div>
		</div> 
	</div> 
        <script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="./js/charge.js"></script>
        <script src="./js/googlepay.js"></script>
         
</body>
</html>

<!--vhja-kxyq-bxyn-snoj-cqof-->
