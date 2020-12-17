<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "dbBiel";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
if (!$conn){
  die("ERROR: ".mysqli_connect_error());
}