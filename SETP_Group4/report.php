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
          <span class="students">Active</span> <!--revenue-->
          <span class="count">10</span>
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
          <span class="students">Revenue $</span> <!--revenue-->
          <span class="count">900</span>
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
          <span class="students">Withdrawn</span> <!--revenue-->
          <span class="count">1</span>
        </h3>
      </div>
      <div class="float-right">
        <i class="pe-7s-less"></i>
      </div>
    </div>
    <!--Widget-->

    <script type="text/javascript">
    $('.count').each(function(){
      $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
      }, {
        duration:4000,
        easing: 'swing', 
        step: function(now){
          $(this).text(Math.ceil(now));
    }
  });
});
    </script>


</body>
</html>   