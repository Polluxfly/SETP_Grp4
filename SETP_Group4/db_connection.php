<?php

function OpenCon(){
 $dbhost = "sql6.freesqldatabase.com:330";
 $dbuser = "sql6423581";
 $dbpass = "zjlFur9zEL";
 $db = "sql6423581";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>
