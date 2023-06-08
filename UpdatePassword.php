<?php
include('sql_query\config.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $password = $_POST['password'];
    $username = $_SESSION["username"];
    $sql =mysqli_query($conn,"SELECT * FROM `login_details` WHERE `username` = '$username'"); 
    $rows = mysqli_fetch_assoc($sql);
    $result = mysqli_query($conn,"UPDATE `login_details` SET `Password`='$password',`is_FirstLogin`='0' WHERE `username` = '$username'");
    header("Location: index.php");
}


?>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SetNewPassword</title>
</head>
<body>
    <form  method="post">
        <label for="password">password</label>
        <input type="password" name="password" placeholder="SetNewPassword" required>
        <label for="ConfrimPass">Confrim Password</label>
        <input type="password" name="ConfrimPass" placeholder="Confrim Password" required>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>