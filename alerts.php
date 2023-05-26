<?php
if(isset($_SESSION['AddBook_Sucess'])){
    if($_SESSION['AddBook_Sucess'] == true){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> The Book has been Added successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>";
      $_SESSION['AddBook_Sucess'] = false;
    }
}


?>