<!--?php
    if(!empty($_GET['tid'] && !empty($_GET['product']))) {
        $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

        $tid = $GET['tid'];
        $product = $GET['product'];
    } 
    else {
        header('Location: homepage.php');
    }
?-->

<html>
<style>
body {
  background-image: url("homepage_back.jpg");
}
</style>
<head>

    <title>OH, Hi YO !</title>
    <link href="css/success.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>

       <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="logo.png" alt="logo"></div>

        <div class="container mt-4">
        <span>
	<h2> Thank you for purchasing</h2>
        <hr>
        <p>Your purchase is successful</p>
        <p>Check your email for the invoice</p>
	<p><a href="homepage.php" class="clickme">Back to homepage</p>
        </span>  
   	</div>
</body>
</html>
