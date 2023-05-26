<?php
    include('sql_query\config.php');
    if($_SESSION["is_LoggedIn"] || $_SESSION['is_admin']){
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
           $pin =  $_POST['confrimReciversPinno1'];
           $id = $_POST['confrimAccessioninput'];
           echo isset($_POST['confrimReciversPinno1']);
           $date = date("Y/m/d");
           echo $date;
           mysqli_query($conn,"UPDATE `transactions` SET `Status` = 'book was collected by student',`issuance_date` =  '$date' WHERE `Accession_no` = '$id' AND `Reciver_pin-no` = '$pin'");

        }

    }

    // header("Location: index.php");
    
?>