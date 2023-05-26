<?php
include('sql_query\config.php');
    if(isset($_SESSION["is_LoggedIn"])){
        if($_SESSION["is_LoggedIn"]){
            echo $_SESSION["is_admin"];
            ($_SESSION["is_admin"])?header("Location: admin.php"):header("Location: student.php");
        }
    }
    ?>
<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = "";
    $password = "";
    if($_POST["username"] != "" && $_POST['password'] != ""){
        $username = $_POST["username"];
        $password = $_POST['password'];
        $result =  mysqli_query($conn,"SELECT * FROM `login_details` WHERE Username = '$username' AND Password = '$password'"); 
        $rows = mysqli_fetch_assoc($result);
        //is valid user
        if($rows){    
            $_SESSION["is_LoggedIn"]  = true;
            //is admin
            if($rows['is_admin'] == 1){
                print("helsjflksdflksdjflsfls");
                header("Location: admin.php");
                $_SESSION["username"] = $username;
                $_SESSION["is_admin"] = true;
                // $columns = array_keys($row);
                // header("Location: admin.php");
            }
            else{
                print("helsjflksdflksdjflsfls");
                $_SESSION["username"] = $username;
                $_SESSION["is_admin"] = false;
                header("Location: student.php");
            }
        }


    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/static/bootstrap.min.css">
    <title>MBTS libary</title>
</head>
<body>

    <form  method="post">
        <label for="username">Pin no</label>
        <input type="text" name="username" placeholder="Enter pin number" id="username" ><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" >
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="/static/popper.min.js"></script>
    <script src="/static/bootstrap.min.js"></script>
</body>
</html>