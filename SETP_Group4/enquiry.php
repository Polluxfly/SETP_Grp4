<?php

session_start();

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');
error_reporting(0);

$enquiryid = "";
$name = "";
$email = "";
$mobile = "";
$enquiry = "";
$date = "";
$status = "";
$action = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//connect to mysql database
try{
    $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
}catch(mysqli_Sql_Exception $ex)
{
    echo("error in connecting");
}
//get data from the form
function getData()
{
    $data = array();
    $data[0]=$_POST['enquiryid'];
    $data[1]=$_POST['name'];
    $data[2]=$_POST['email'];
    $data[3]=$_POST['mobile'];
    $data[4]=$_POST['enquiry'];
    $data[5]=$_POST['date'];
    $data[6]=$_POST['status'];
    $data[7]=$_POST['action'];
    return $data;
}

mysqli_select_db($con,'sql6423581');






?>

<html>
<style>
body {
  background-image: url("normalpage_back.jpg");
}
</style>
<head>

    <title>OH, Hi YO !</title>
    <link href="css/enquiry.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>
        <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="logo.png" alt="logo"></div>
        
        <div class="navigation">
            <ul>
                <li><a href="homepage.php">Home Page</a></li>
                <li><a href="createuser.php">Registration</a></li>
                <li><a href="profile.php">Student Profile</a></li>
                <li><a href="#">Course Details</a></li>
                <li><a href="studentpaymentpage.php">Enrollment</a></li>
                <li><a href="#">Student Progress</a></li>
                <li><a href="enquiry.php">Enquiries</a></li>

            </ul>
        </div>
         
       
       <div class="container">
       <div class="search-box">
       <div class="row">
       


            <div class="col-md-6 enquiry-left">
            <div class="messagebox"><h5>
        <?php

            //Update

if(isset($_POST['update'])){
$info = getData();
$update_query ="UPDATE `enquiry` SET status='$info[6]',action='$info[7]' WHERE enquiryid = '$info[0]' ";
try{
    $update_result=mysqli_query($con,$update_query);
    if($update_result){
     if(mysqli_affected_rows($con)>0)
     {
      echo("Record Updated !");
	 }else{
      echo("Update Failed !");
	 }
	}
}catch(Exception $ex){
    echo("Error In Update".$ex->getMessage());
}
}

//search
if(isset($_POST['search']))
{   
    $info = getData();
    $search_query = "SELECT * FROM `enquiry` WHERE enquiryid='$info[0]' ";
    $search_result = mysqli_query($con,$search_query);
    
        if($search_result)
        {
            if(mysqli_num_rows($search_result))
            {
                while($rows = mysqli_fetch_array($search_result))
                {
                    $enquiryid = $rows['enquiryid'];
                    $name = $rows['name'];
                    $email = $rows['email'];
                    $mobile = $rows['mobile'];
                    $enquiry = $rows['enquiry'];
                    $date = $rows['date'];
                    $status = $rows['status'];
                    $action = $rows['action'];

                   

				}
			}else{
                    echo("Record Not Found !");     
			}
		} else {
                echo("Error");  
		}
}




            ?></h5></div>
            <form method="post" action="enquiry.php">
            <h4> Search </h4>
            <div class="form-group">
            <input type="number" name="enquiryid" class="form-control" placeholder="Enquiry ID" value="<?php echo ($enquiryid);?>"><br>
            </div>

            <button class="btn4" name="search">Search</button><br><br>
            <h4> Enquiry Details </h4>

            <p class="row">Name : <?php echo ($name);?></p>
            <p class="row">Email : <?php echo ($email);?></p>
            <p class="row">Mobile : <?php echo ($mobile);?></p>
            <p class="row">Enquiry Message : <?php echo ($enquiry);?></p>
            <p class="row">Enquiry Date : <?php echo ($date);?></p>
            
            <div class="form-group">

            <label>Status :</label><br>
                            <select class="selection" id="status" name="status">
                            <option value=""><?php echo ($status);?></option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            </select>

            </div><br>
            <div class="form-group">
            <input type="text" name="action" class="form-control" placeholder="Remarks" value="<?php echo ($action);?>"><br>
            </div>

            <button class="btn2" name="update">Update</button><br><br>
            
           </div>     
       </from>
       </div>
      
       <div class="wrap">
       <table>
        <tr>
        <th>Enquiry ID</th>
        <th>Enquiry date</th>
        <th>Name</th>
        <th>Enquiry Message</th>
        <th>Status</th>
        <th>Remarks</th>

        <?php
        $con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

        mysqli_select_db($con,'sql6423581');


        if($con->connect_error){
        die("Connection failed". $con->connect_error);  
		}

        $sql = " SELECT * from enquiry ORDER BY status desc, date desc";
        $result = $con-> query($sql);
        if($result-> num_rows > 0){
          while ($row = $result -> fetch_assoc()){
            echo "<tr>
            <td>".$row["enquiryid"] ."</td>
            <td>".$row["date"] ."</td>
            <td>". $row["name"]."</td>
            <td>". $row["enquiry"] ."</td>
            <td>". $row["status"]."</td>
            <td>". $row["action"]."</td>
            </tr>";  
		  }  

          echo "</table>";
		  }
          else{
          echo "0 result";
		}

        $con-> close();

        ?>

        </tr>
        </table>
        </div>
       </div>
       </div>
       </div>
       
</html>