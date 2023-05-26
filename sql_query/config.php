<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "mbts";

$conn =     mysqli_connect($hostname,$username,$password,$database);
session_start();
?>