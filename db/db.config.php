<?php
$server_Name ="localhost";
$dbUsername ="root";
$dbPass ="";
$dbName ="clothes_up";

$conn = mysqli_connect($server_Name, $dbUsername, $dbPass, $dbName);

if (!$conn){
	die("Connection Error" .mysqli_connect_error());
}