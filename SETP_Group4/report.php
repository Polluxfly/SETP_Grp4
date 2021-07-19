<?php

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
mysqli_select_db($con,'sql6423581');

// rows for status active
$active_result = "SELECT * FROM userinfo WHERE status = 'Active'"; 
if ($a_result=mysqli_query($con,$active_result)) {
    $a_rowcount=mysqli_num_rows($a_result);
}

// rows for status withdrawn
$withdrawn_result = "SELECT * FROM `userinfo` where status = 'Withdrawn'"; 
if ($w_result=mysqli_query($con,$withdrawn_result)) {
    $w_rowcount=mysqli_num_rows($w_result);
}
// rows for status graduated
$graduated_result = "SELECT * FROM `userinfo` where status = 'Graduated'"; 
if ($g_result=mysqli_query($con,$graduated_result)) {
    $g_rowcount=mysqli_num_rows($g_result);
}
?>

<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>
<head>

    <title>Report</title>
    <link href="css/report.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
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
    

    <!--Widget-->
    <div class="card-body1">
      <div class="float-left">
        <h3>
          <span class="students">Active</span>
          <span class="count"><?php echo $a_rowcount?></span>
        </h3>
      </div>
      <div class="float-right">
        <i class="pe-7s-users"></i>
      </div>
    </div>
    <!--Widget-->
    
    <!--Widget-->
    <div class="card-body2">
      <div class="float-left">
        <h3>
          <span class="students">Graduated</span> 
          <span class="count"><?php echo $g_rowcount?></span>
        </h3>
      </div>
      <div class="float-right">
        <i class="pe-7s-piggy"></i>
      </div>
    </div>
    <!--Widget-->

    <!--Widget-->
    <div class="card-body3">
      <div class="float-left">
        <h3>
          <span class="students">Withdrawn</span>
          <span class="count"><?php echo $w_rowcount?></span>
        </h3>
      </div>
      <div class="float-right">
        <i class="pe-7s-less"></i>
      </div>
    </div>
    <!--Widget-->
	<!--remove bootstrap.css,min.css,.js bottom last line source map-->
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Student Head Count</th>
								<th class="column2">Total</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td class="column1">Number of N1 Students:</td>
									<td class="column2">200398</td>
								</tr>
								<tr>
									<td class="column1">Number of N2 Students:</td>
									<td class="column2">200397</td>
								</tr>
								<tr>
									<td class="column1">Number of N3 Students:</td>
									<td class="column2">200396</td>
								</tr>
								<tr>
									<td class="column1">Number of N4 Students:</td>
									<td class="column2">200392</td>
								</tr>
								<tr>
									<td class="column1">Number of N5 Students:</td>
									<td class="column2">200391</td>
								</tr>
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


    <script type="text/javascript">
    $('.count').each(function(){
      $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
      }, {
        duration:1000,
        easing: 'swing', 
        step: function(now){
          $(this).text(Math.ceil(now));
    }
  });
});
    </script>






</body>
</html>   