<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

 $conn = mysqli_connect($servername,$username,$password,$dbname);
 
 if($conn)
 {
 }

  else
  {
      die("connection failed".mqsqli_connect_error());
  }
  ?>