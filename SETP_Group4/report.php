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

// rows for Q1 Enquiry - Completed
$q1_result = "SELECT * FROM `enquiry` where status = 'Completed' and YEAR(date) = YEAR(CURDATE()) and MONTH(date) between '1' and '3' "; 
if ($q1_result=mysqli_query($con,$q1_result)) {
    $q1_rowcount=mysqli_num_rows($q1_result);
}
// rows for Q2 Enquiry - Completed
$q2_result = "SELECT * FROM `enquiry` where status = 'Completed' and YEAR(date) = YEAR(CURDATE()) and MONTH(date) between '4' and '6' "; 
if ($q2_result=mysqli_query($con,$q2_result)) {
    $q2_rowcount=mysqli_num_rows($q2_result);
}

// rows for Q3 Enquiry - Completed
$q3_result = "SELECT * FROM `enquiry` where status = 'Completed' and YEAR(date) = YEAR(CURDATE()) and MONTH(date) between '7' and '9' "; 
if ($q3_result=mysqli_query($con,$q3_result)) {
    $q3_rowcount=mysqli_num_rows($q3_result);
}

// rows for Q4 Enquiry - Completed
$q4_result = "SELECT * FROM `enquiry` where status = 'Completed' and YEAR(date) = YEAR(CURDATE()) and MONTH(date) between '10' and '12' "; 
if ($q4_result=mysqli_query($con,$q4_result)) {
    $q4_rowcount=mysqli_num_rows($q4_result);
}


// rows for Q1 Enquiry - Pending
$q1p_result = "SELECT * FROM `enquiry` where status = 'Pending' and YEAR(date) = YEAR(CURDATE()) and MONTH(date) between '1' and '3' "; 
if ($q1p_result=mysqli_query($con,$q1p_result)) {
    $q1p_rowcount=mysqli_num_rows($q1p_result);
}
// rows for Q2 Enquiry - Pending
$q2p_result = "SELECT * FROM `enquiry` where status = 'Pending' and YEAR(date) = YEAR(CURDATE()) and MONTH(date) between '4' and '6' "; 
if ($q2p_result=mysqli_query($con,$q2p_result)) {
    $q2p_rowcount=mysqli_num_rows($q2p_result);
}

// rows for Q3 Enquiry - Pending
$q3p_result = "SELECT * FROM `enquiry` where status = 'Pending' and YEAR(date) = YEAR(CURDATE()) and MONTH(date) between '7' and '9' "; 
if ($q3p_result=mysqli_query($con,$q3p_result)) {
    $q3p_rowcount=mysqli_num_rows($q3p_result);
}

// rows for Q4 Enquiry - Pending
$q4p_result = "SELECT * FROM `enquiry` where status = 'Pending' and YEAR(date) = YEAR(CURDATE()) and MONTH(date) between '10' and '12' "; 
if ($q4p_result=mysqli_query($con,$q4p_result)) {
    $q4p_rowcount=mysqli_num_rows($q4p_result);
}


// rows for Number of N5 Students
$n5_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where c.status = '1' and c.courselevel = 'N5' "; 
if ($n5_result=mysqli_query($con,$n5_result)) {
    $n5_rowcount=mysqli_num_rows($n5_result);
}

// rows for Number of N4 Students
$n4_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where c.status = '1' and c.courselevel = 'N4' "; 
if ($n4_result=mysqli_query($con,$n4_result)) {
    $n4_rowcount=mysqli_num_rows($n4_result);
}

// rows for Number of N3 Students
$n3_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where c.status = '1' and c.courselevel = 'N3' "; 
if ($n3_result=mysqli_query($con,$n3_result)) {
    $n3_rowcount=mysqli_num_rows($n3_result);
}

// rows for Number of N2 Students
$n2_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where c.status = '1' and c.courselevel = 'N2' "; 
if ($n2_result=mysqli_query($con,$n2_result)) {
    $n2_rowcount=mysqli_num_rows($n2_result);
}

// rows for Number of N1 Students
$n1_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where c.status = '1' and c.courselevel = 'N1' "; 
if ($n1_result=mysqli_query($con,$n1_result)) {
    $n1_rowcount=mysqli_num_rows($n1_result);
}


// rows for N5 Students - Paid Payment
$n5p_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '1' and c.courselevel = 'N5' "; 
if ($n5p_result=mysqli_query($con,$n5p_result)) {
    $n5p_rowcount=mysqli_num_rows($n5p_result);
}

// rows for N4 Students - Paid Payment
$n4p_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '1' and c.courselevel = 'N4' "; 
if ($n4p_result=mysqli_query($con,$n4p_result)) {
    $n4p_rowcount=mysqli_num_rows($n4p_result);
}

// rows for N3 Students - Paid Payment
$n3p_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '1' and c.courselevel = 'N3' "; 
if ($n3p_result=mysqli_query($con,$n3p_result)) {
    $n3p_rowcount=mysqli_num_rows($n3p_result);
}

// rows for N2 Students - Paid Payment
$n2p_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '1' and c.courselevel = 'N2' "; 
if ($n2p_result=mysqli_query($con,$n2p_result)) {
    $n2p_rowcount=mysqli_num_rows($n2p_result);
}


// rows for N1 Students - Paid Payment
$n1p_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '1' and c.courselevel = 'N1' "; 
if ($n1p_result=mysqli_query($con,$n1p_result)) {
    $n1p_rowcount=mysqli_num_rows($n1p_result);
}



// rows for N5 Students - UnPaid Payment
$n5up_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '0' and c.courselevel = 'N5' "; 
if ($n5up_result=mysqli_query($con,$n5up_result)) {
    $n5up_rowcount=mysqli_num_rows($n5up_result);
}

// rows for N4 Students - UnPaid Payment
$n4up_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '0' and c.courselevel = 'N4' "; 
if ($n4up_result=mysqli_query($con,$n4up_result)) {
    $n4up_rowcount=mysqli_num_rows($n4up_result);
}

// rows for N3 Students - UnPaid Payment
$n3up_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '0' and c.courselevel = 'N3' "; 
if ($n3up_result=mysqli_query($con,$n3up_result)) {
    $n3up_rowcount=mysqli_num_rows($n3up_result);
}

// rows for N2 Students - UnPaid Payment
$n2up_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '0' and c.courselevel = 'N2' "; 
if ($n2up_result=mysqli_query($con,$n2up_result)) {
    $n2up_rowcount=mysqli_num_rows($n2up_result);
}


// rows for N1 Students - UnPaid Payment
$n1up_result = "SELECT * FROM `enrollmentinfo` e left join courseinfo c on e.courseid = c.courseid where e.paystatus = '0' and c.courselevel = 'N1' "; 
if ($n1up_result=mysqli_query($con,$n1up_result)) {
    $n1up_rowcount=mysqli_num_rows($n1up_result);
}



?>

<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>
<head>

    <title>Management Report</title>
    <link href="css/report.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Status', 'Number of students'],
          ['Active',     <?php echo $a_rowcount?>],
          ['Graduated',   <?php echo $g_rowcount?>],
          ['Withdrawn',  <?php echo $w_rowcount?>]
        ]);

        var options = {
          title: 'Number of Students'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Quater (Current Year)', 'Completed', 'Pending'],
          ['Q1',  <?php echo $q1_rowcount?>,      <?php echo $q1p_rowcount?>],
          ['Q2',  <?php echo $q2_rowcount?>,      <?php echo $q2p_rowcount?>],
          ['Q3',  <?php echo $q3_rowcount?>,      <?php echo $q3p_rowcount?>],
          ['Q4',  <?php echo $q4_rowcount?>,      <?php echo $q4p_rowcount?>]
        ]);

        var options = {
          title : 'Quaterly Enquiry Report',
          vAxis: {title: 'Number of Enquiries'},
          hAxis: {title: 'Quater (Current Year)'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Level', 'Number of student'],
          ['N5',  <?php echo $n5_rowcount?>],
          ['N4',  <?php echo $n4_rowcount?>],
          ['N3',  <?php echo $n3_rowcount?>],
          ['N2',  <?php echo $n2_rowcount?>],
          ['N1',  <?php echo $n1_rowcount?>],
        ]);

        var options = {
          title: 'Number of students in each level',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Level', 'Paid', 'Unpaid'],
          ['N5',  <?php echo $n5p_rowcount?>,      <?php echo $n5up_rowcount?>],
          ['N4',  <?php echo $n4p_rowcount?>,      <?php echo $n4up_rowcount?>],
          ['N3',  <?php echo $n3p_rowcount?>,      <?php echo $n3up_rowcount?>],
          ['N2',  <?php echo $n2p_rowcount?>,      <?php echo $n2up_rowcount?>],
          ['N1',  <?php echo $n1p_rowcount?>,      <?php echo $n1up_rowcount?>]
        ]);

        var options = {
          title: 'Student Payment Status',
          hAxis: {title: 'Level',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
</head>



<body>
    <a class="logout" href="logout.php"> LOGOUT </a>
    <div class="companylogo"><img src="logo.png" alt="logo"></div>
    
    <div class="navigation">
        <ul>
                <li><a href="homepage.php">Home Page</a></li>
                <li><a href="createuser.php">Registration</a></li>
                <li><a href="profile.php">User Profile</a></li>
                <li><a href="coursedetails.php">Course Details</a></li>
                <li><a href="adminenrollment.php">Enrollment</a></li>
                <li><a href="enquiry.php">Enquiries</a></li>
                <li><a href="report.php">Management Reports</a></li>

        </ul>
        </div>

    <div class = "container">
    
    <section class = "section1">
    <div id="piechart" class = "chart"></div>
    <div id="chart_div" class = "barchart"></div>
    </section>

    <section class = "section2">
    <div id="curve_chart" class="linechart"></div>
    <div id="chart_div2" class="divchart"></div>
    </section>
    </div>

</body>
</html>   