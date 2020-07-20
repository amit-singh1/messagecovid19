<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

 $conn = mysqli_connect($servername,$username,$password,$dbname);
 
 if($conn)
 {
 }

  else
  {
      die("connection failed".mqsqli_connect_error());
  }
  ?>