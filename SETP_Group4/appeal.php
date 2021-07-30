
<?php
$con = mysqli_connect('sql6.freesqldatabase.com:3306','sql6423581','zjlFur9zEL');
mysqli_select_db($con,'sql6423581');

$useruser = $_GET['id'];

$appeal_query = "UPDATE `enrollmentinfo` SET `appealstatus`=1 where enrollmentid=$useruser; ";

$appeal_result = mysqli_query($con, $appeal_query);

header("location:enrollment.php");
?>
