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
<html style="font-size: 16px;" lang="en-IN"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="MBTS libary,Libary, MBTS Govt. Polytechnic">
    <meta name="description" content="welcome to MBTS libary.">
    <title>MBTS libary</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.10.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="MBTS libary">
    <meta property="og:description" content="welcome to MBTS libary.">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-overlap u-overlap-contrast u-overlap-transparent u-xl-mode" data-lang="en">
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" src="" data-image-width="256" data-image-height="256" id="sec-6ed7">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-default-lg u-text-default-md u-text-default-sm u-text-default-xl u-title u-text-1">MBTS Govt. Polytechnic</h1>
        <h2 class="u-text u-text-2">Libary&nbsp;</h2>
        <p class="u-text u-text-3">Login</p>
        <div class="u-border-1 u-border-grey-75 u-expanded-width-xs u-form u-login-control u-radius-19 u-white u-form-1">
          <form class="u-clearfix u-form-custom-backend u-form-spacing-8 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 31px;" method="post">
            <div class="u-form-group u-form-name u-label-top">
              <label for="username-a30d" class="u-label u-label-1">Username *</label>
              <input type="text" placeholder="Enter your Username" id="username-a30d" name="username" class="u-grey-5 u-input u-input-rectangle u-input-1" required="">
            </div>
            <div class="u-form-group u-form-password u-label-top">
              <label for="password-a30d" class="u-label u-label-2">Password *</label>
              <input type="text" placeholder="Enter your Password" id="password-a30d" name="password" class="u-grey-5 u-input u-input-rectangle u-input-2" required="">
            </div>
            <div class="u-align-right u-form-group u-form-submit u-label-top">
              <a href="#" class="u-active-palette-2-base u-border-none u-btn u-btn-submit u-button-style u-palette-4-base u-btn-1">Login</a>
              <input type="submit" value="submit" class="u-form-control-hidden">
            </div>
            <input type="hidden" value="" name="recaptchaResponse">
          </form>
        </div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-667d"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Sample footer text</p>
      </div></footer>
    <script src="/static/popper.min.js"></script>
    <script src="/static/bootstrap.min.js"></script>
</body></html>