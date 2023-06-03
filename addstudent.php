<?php
    include('sql_query\config.php');
    if(!$_SESSION["is_LoggedIn"] || !$_SESSION['is_admin']){
            header("Location: index.php");
    }
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Username =   $_POST['pin'];
        $password   =   $_POST['password'];
        $confrimpass      =   $_POST['confrimpass'];
        
        $result = mysqli_query($conn,"UPDATE `login_details` SET `Username`='',`Password`='$password'");
        $row = mysqli_fetch_assoc($result);
        if($row){
            $_SESSION["BOOK_exist"] = true;
            header("Location: admin.php?tab=add_Book");
        }
        if(!$row){
            mysqli_query($conn,"INSERT INTO `books` (`Accession_no`,`Title`,`Branch`,`Author`,`is_available`) VALUES ('$AccessionNo','$BookTitle','$Branch','$Author','$is_available')");
            $_SESSION['AddBook_Sucess'] = true;
            header("Location: admin.php?tab=add_Book");
        }
    }
?>
