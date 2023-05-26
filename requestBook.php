<?php
include('sql_query\config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $BOOKID =  $_POST['Accessioninput'];
    $result = mysqli_query($conn,"SELECT * FROM `transactions` WHERE `Accession_no` = $BOOKID AND `Transaction_Position` = 'incomplete' ");
    $row = mysqli_fetch_assoc($result);
    echo !$row;
    if(!$row)
        header("Location: sflsdjf.php");
        
    if($row)
    header("Location: aaasflsdjf.php");
     $result = mysqli_query($conn,"SELECT * FROM `books` WHERE `Accession_no`=$BOOKID");
     $row = mysqli_fetch_assoc($result);
     $BookTitle = $row['Title'];
     $ReciverPin = $_SESSION['username'];
     $transactionsStatus = $row['Transaction_Position'];
     $transactionsID = 'testID001';
     $sql = "INSERT INTO `transactions` (
                    `Transaction_id`, 
                    `Accession_no`, 
                    `Title`, 
                    `Reciver_pin-no`, 
                    `issuance_date`, 
                    `Reurn_date`, 
                    `Status`,
                    `Transaction_Position`
                ) 
                VALUES (
                    '$transactionsID',
                    '$BOOKID','$BookTitle','$ReciverPin','not issued','not issued','waiting for admin to accept','incomplete')";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: /student.php");
    }
}
?>
