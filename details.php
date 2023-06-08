<?php
include('sql_query\config.php');
$username = $_SESSION["username"];
$result = mysqli_query($conn,"SELECT * FROM `student_details` WHERE `Pin_no` = '$username'");
$row = mysqli_fetch_assoc($result);
echo $row['Pin_no']."<br>";
echo $row['Name']."<br>";
echo $row['Gender']."<br>";
echo $row['College']."<br>";
echo $row['Branch']."<br>";
echo $row['JoinYear']."<br>";
echo $row['LeftYear']."<br>";
echo $row['Scheme']."<br>";
echo $row['Address']."<br>";
?>