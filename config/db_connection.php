<?php
$username = "root";
$password = "";
$servername = "localhost";
$db = "ops_db";

$con = mysqli_connect("$servername","$username","$password","$db");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//else { echo "connected"; }

?>