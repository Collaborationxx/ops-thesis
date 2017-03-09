<?php
$username = "root";//username ng phpMyAdmin
$password = "becca";//pw ng phpMyAdmin
$servername = "localhost";
$db = "ops_db";//name database sa xampp

$con = mysqli_connect("$servername","$username","$password","$db");

// Check connection
if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//else { echo "connected"; }

?>