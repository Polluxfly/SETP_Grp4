<?php
  include_once 'db.php';
?>
<!doctype html>
<html>
<head>

    <title>Student Reports</title>
    <link href="css/report.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>

<body>

       <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="Images/logo.png" alt="logo"><h1>Milo Bing Language Centre</h1></div>

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
        <div class="data">
          <form action="report.php" method="POST">
            <select name="Courses" class="courses">
              <option>Courses</option>
              <?php
                $query1 = "SELECT * FROM courses";
                $result1 = mysql_query($query1);
                while($rows1 = mysql_fetch_array($result1)){
                  $courseID = $rows1['id'];
                  $rowsdata1 = $rows1['courseName'];
                ?>
                  <option value="<?php echo $courseID; ?>"<?php echo $rowsdata1; ?></option>
                <?php
                }
                ?>
            </select>

            <select name="Level" class="level">
              <option>Level</option>
              <?php
                $query2 = "SELECT * FROM level";
                $result2 = mysql_query($query2);
                while($rows2 = mysql_fetch_array($result2)){
                  $rowsdata2 = $rows2['levelname'];
                ?>
                  <option value="<?php echo $levelname; ?>"<?php echo $levelname; ?></option>
                <?php
              }
                ?>
            </select>

            <input type="submit" name="submit" class="submit"/>
            <table border = "1" class="table">
              <tr>
                <th>Transcript</th>
                <th>Score</th>
                <th>Pass or Fail</th> <!--Find another term for this-->
            </table>
          </form>
        </div>
        </body>

</html>
