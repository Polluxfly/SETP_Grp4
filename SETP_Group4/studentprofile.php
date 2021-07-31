<?php

session_start();

$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');

mysqli_select_db($con,'sql6423581');

error_reporting(0);

$userid = "";
$username = "";
$email = "";
$password = "";
$gender = "";
$nationality = "";
$mobile = "";
$dob = "";

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
    $data[0]=$_SESSION['userid'];
    $data[1]=$_POST['username'];
    $data[2]=$_POST['email'];
    $data[3]=$_POST['password'];
    $data[4]=$_POST['gender'];
    $data[5]=$_POST['nationality'];
    $data[6]=$_POST['mobile'];
    $data[7]=$_POST['dob'];
    return $data;
}

mysqli_select_db($con,'sql6423581');






?>

<html>
<style>
body {
  background-image: url("studenthomepage_back.jpg");
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
                <li><a href="studenthome.php">Home Page</a></li>
                <li><a href="studentprofile.php">My Profile</a></li>
                <li><a href="enrollment.php">Enrollment</a></li>

            </ul>
        </div>
         <div class="messagebox"><h3>
        <?php

            //Update

if(isset($_POST['update'])){
$info = getData();
$update_query ="UPDATE `userinfo` SET email='$info[2]',password='$info[3]',mobile='$info[6]' WHERE userid = '$info[0]' and role='Student'";
$check = "SELECT * from `userinfo` where userid <> '$info[0]' and email='$info[2]'";

$check_result= mysqli_query($con, $check);

$checknum = mysqli_num_rows($check_result);

if($checknum >0){
        echo("The Email is taken. Try another.");

}else {

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

}



//search
if(isset($_SESSION['userid']))
{   
    $info = getData();
    $search_query = "SELECT * FROM `userinfo` WHERE userid='$info[0]' and role='Student'";
    $search_result = mysqli_query($con,$search_query);
    
        if($search_result)
        {
            if(mysqli_num_rows($search_result))
            {
                while($rows = mysqli_fetch_array($search_result))
                {
                    $userid = $rows['userid'];
                    $username = $rows['username'];
                    $email = $rows['email'];
                    $password = $rows['password'];
                    $gender = $rows['gender'];
                    $nationality = $rows['nationality'];
                    $mobile = $rows['mobile'];
                    $dob = $rows['dob'];

                   

				}
			}else{
                    echo("Student Not Found !");     
			}
		} else {
                echo("Error");  
		}
}



            ?></h3></div>
       
       <div class="container">
       <div class="search-box">
       <div class="row">
       <div class="col-md-6 update-left">
       <form method="post" action="studentprofile.php">

        <div class="notification">
        <br><br>
        <p><b>Dear <?php echo ($username);?>,</b></p><br>
        <i>
        <p>In compliance with the recent Covid-19 directives from the government , please take note of the following updates.</p>
        <p>Our school is working towards resuming lessons back to physical classrooms. </p>
        <p>The government has highlighted that more people may be allowed to return to the workplace sometime around from the middle of August.</p> 
        <p>Our school aims to resume back physical classes which may occur from the middle of  August<p>  
        <p>Your teacher will keep you updated.</p>
        <br><br>
        <p><b>Stay safe!</b></p> 
        <p><b>OH, Hi YO! Management</b></p> </i>
       </div>

        

            </div>


            <div class="col-md-6 update-right">
            <h1> Student ID : <?php echo ($userid);?> </h1><br>
            <h5> My Profile</h5><br>

            <p class="row">Name : <?php echo ($username);?></p>
            <p class="row">Gender : <?php echo ($gender);?></p>
            <p class="row">Nationality : <?php echo ($nationality);?></p>
            <p class="row">Date of Birth : <?php echo ($dob);?></p>

            <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" class="form-control" placeholder="Student Email" value="<?php echo ($email);?>"><br>
            </div>
            <div class="form-group">
            <label>Mobile:</label>
            <input type="text" name="mobile" class="form-control" placeholder="Student Mobile Number" value="<?php echo ($mobile);?>"><br>
            </div>
            <div class="form-group">
            <label>Password:</label>
            <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo ($password);?>"><br>
            </div>
            

            <button class="btn2" name="update">Update</button><br><br>
            
            
            
             
       </from>
       </div>
       </div>
       </div>
       </div>
       
</html>