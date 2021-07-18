<?php

session_start();

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');
error_reporting(0);

$userid = "";
$role = "";
$status = "";
$username = "";
$email = "";
$password = "";
$gender = "";
$nationality = "";
$mobile = "";
$dob = "";
$email2 = "";

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
    $data[0]=$_POST['userid'];
    $data[1]=$_POST['role'];
    $data[2]=$_POST['status'];
    $data[3]=$_POST['username'];
    $data[4]=$_POST['email'];
    $data[5]=$_POST['password'];
    $data[6]=$_POST['gender'];
    $data[7]=$_POST['nationality'];
    $data[8]=$_POST['mobile'];
    $data[9]=$_POST['dob'];
    $data[10]=$_POST['email2'];
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
    <link href="css/profile.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="Bootstrap/bootstrap.css">
</head>


<body>
        <a class="logout" href="logout.php"> LOGOUT </a>
        <div class="companylogo"><img src="logo.png" alt="logo"></div>
        
        <div class="navigation">
            <ul>
                <li><a href="homepage.php">Home Page</a></li>
                <li><a href="createuser.php">Registration</a></li>
                <li><a href="profile.php">User Profile</a></li>
                <li><a href="#">Course Details</a></li>
                <li><a href="studentpaymentpage.php">Enrollment</a></li>
                <li><a href="#">Student Progress</a></li>
                <li><a href="enquiry.php">Enquiries</a></li>

            </ul>
        </div>
         <div class="messagebox"><h3>
        <?php

            //Update

if(isset($_POST['update'])){
$info = getData();
$update_query ="UPDATE `userinfo` SET role='$info[1]', status='$info[2]',username='$info[3]',email='$info[4]',password='$info[5]',gender='$info[6]',nationality='$info[7]',mobile='$info[8]',dob='$info[9]' WHERE userid = '$info[0]'";
try{
    $update_result=mysqli_query($con,$update_query);
    if($update_result){
     if(mysqli_affected_rows($con)>0)
     {
      echo("Details Updated !");
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
    $search_query = "SELECT * FROM `userinfo` WHERE (userid='$info[0]' or email='$info[10]') ";
    $search_result = mysqli_query($con,$search_query);
    
        if($search_result)
        {
            if(mysqli_num_rows($search_result))
            {
                while($rows = mysqli_fetch_array($search_result))
                {
                    $userid = $rows['userid'];
                    $role = $rows['role'];
                    $status = $rows['status'];
                    $username = $rows['username'];
                    $email = $rows['email'];
                    $password = $rows['password'];
                    $gender = $rows['gender'];
                    $nationality = $rows['nationality'];
                    $mobile = $rows['mobile'];
                    $dob = $rows['dob'];
                    $email2 = $rows['email'];
                    
                   

				}
			}else{
                    echo("Student Not Found !");     
			}
		} else {
                echo("Error");  
		}
}

//delete
if(isset($_POST['delete']))
{
    $info = getData();
    $delete_query = "DELETE FROM `userinfo` WHERE userid = '$info[0]' and role='Student'";
    try{
     $delete_result= mysqli_query($con,$delete_query);
     if($delete_result){
      if(mysqli_affected_rows($con)>0)
      {
       echo("Student Deleted !");
	  }else{
       echo("Data Not Deleted");
	  }
	 }
	}catch(Exception $ex){
     echo ("Error in Delete".$ex ->getMessage());
	}
}



            ?></h3></div>
       
       <div class="container">
       <div class="search-box">
       <div class="row">
       <div class="col-md-6 update-left">
       <form method="post" action="profile.php">
       <h1> Search </h1>
            <div class="form-group">
            <input type="number" name="userid" class="form-control" placeholder="Student ID" value="<?php echo ($userid);?>"><br>
            <input type="email" name="email2" class="form-control" placeholder="Student Email" value="<?php echo ($email2);?>"><br>
            </div>

            <button class="btn4" name="search">Search</button><br>

            </div>


            <div class="col-md-6 update-right">
            <h1> User Details </h1>
            <div class="form-group">
            <select id="role" name="role">
                            <option><?php echo ($role);?></option>
                            <option value="Admin">Admin</option>
                            <option value="Student">Student</option>
                            </select>
            </div><br>
            <div class="form-group">
            <select id="status" name="status">
                            <option><?php echo ($status);?></option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            </select>
            </div><br>

            <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="User Name" value="<?php echo ($username);?>"><br>
            </div>
            <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="User Email" value="<?php echo ($email);?>"><br>
            </div>
           <div class="form-group">
            <input type="text" name="password" class="form-control" placeholder="User Password" value="<?php echo ($password);?>"><br>
            </div>
            <div class="form-group">
            <input type="text" name="gender" class="form-control" placeholder="User Gender" value="<?php echo ($gender);?>"><br>
            </div>
            <div class="form-group">
            <input type="text" name="nationality" class="form-control" placeholder="User Nationality" value="<?php echo ($nationality);?>"><br>
            </div>
            <div class="form-group">
            <input type="text" name="mobile" class="form-control" placeholder="User Mobile Number" value="<?php echo ($mobile);?>"><br>
            </div>
            <div class="form-group">
            <input type="date" name="dob" class="form-control" placeholder="User Date of Birth" value="<?php echo ($dob);?>"><br>
            </div>

            <button class="btn2" name="update">Update</button><br><br>
            
            <button class="btn3" name="delete">Delete</button>
            
            
             
       </from>
       </div>
       </div>
       </div>
       </div>
       
</html>