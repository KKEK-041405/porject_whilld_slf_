<?php
    include('sql_query\config.php');
    if(!$_SESSION["is_LoggedIn"]  || $_SESSION['is_admin']){
        header("Location: index.php");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/jquery.dataTables.css">
    <link rel="stylesheet" href="/static/bootstrap.min.css">
    <script src="/static/bootstrap.bundle.min.js"></script>
    <title>student</title>
    <script>
        Accession_no = "";

    </script>
</head>
<body>
    <input type="button" value="logout" id="logout" onclick="logout()">
    <br>
    <button id="BOOKS" onclick="window.location = '/student.php?tab=books'">All Books</button>
    <button id="DUE" onclick="window.location = '/student.php?tab=on_due'">On Due</button>
    <button id="Transactions" onclick="window.location = '/student.php?tab=Transactions'">Transactions</button>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['tab'])) {
                # code...
                echo "<h1>".$_GET['tab']."</h1>";
            }
            else
                header("Location: student.php?tab=books");
        }

    ?>
    <?php
    if($_GET['tab'] == "books"){
    $result = mysqli_query($conn,"SELECT DISTINCT  * FROM `books` WHERE 1");

    echo "<table id='mytable' class='display'><thead>
    <tr>
        <th scope='col' onclick=''>Accession_no</th>
        <th scope='col' onclick=''>Title</th>
        <th scope='col' onclick=''>Branch</th>
        <th scope='col' onclick=''>Author</th>
        <th>Status</th>
        <th scope='col' onclick=''>Actions</th>
    </tr></thead>";
    while($row = mysqli_fetch_assoc($result)){
        $Status = ($row['is_available'] == 1) ? "available" : "unavailable" ;
        $id = $row['Accession_no'];
        $PIN = $_SESSION["username"];
        $BTN  = "<button type='button'id='$id' class='request_book btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal' >Request</button>";                                                                                                                                                                                                                                                                                                                                                    
        $rer = mysqli_query($conn,"SELECT * FROM `transactions` WHERE `Accession_no` = '$id' AND `Reciver_pin-no` = '$PIN' AND `Status` = 'waiting for admin to accept' ");
        $A = mysqli_fetch_all($rer);
        $action = ($Status == "available" )?($A)?"Requested" :$BTN  :"-------------";
        echo "<tr><td>".$row['Accession_no']."</td>
                  <td>".$row['Title']."</td>
                  <td>".$row['Branch']."</td>
                  <td>".$row['Author']."</td>
                  <td>".$Status."</td>
                  <td>$action</td>
              </tr>";

    } 
    }
    elseif($_GET['tab'] == "on_due"){
        $result = mysqli_query($conn,"SELECT DISTINCT  * FROM `transactions` WHERE `Reciver_pin-no`='".$_SESSION["username"]."'");
        echo "<table class='table' id='mytable' class='display'>
        <thead><tr>
            <th scope='col' onclick=''>Transaction_id</th>
            <th scope='col' onclick=''>Accession_no</th>
            <th scope='col' onclick=''>Title</th>
            <th scope='col' onclick=''>Reciver_pin-no</th>
            <th scope='col' onclick=''>issuance_date</th>
            <th scope='col' onclick=''>Reurn_date</th>
        </tr></thead>";
        while($row = mysqli_fetch_assoc($result)){
            // $Status = ($row['is_available'] == 1) ? "available" : "unavailable" ;
            echo "<tr>
                        <td>".$row['Transaction_id']."</td>
                        <td>".$row['Accession_no']."</td>
                        <td>".$row['Title']."</td>
                        <td>".$row['Reciver_pin-no']."</td>
                        <td>".$row['issuance_date']."</td>
                        <td>".$row['Reurn_date']."</td
                    </tr>";
        }
    }
    elseif($_GET['tab'] == "Transactions"){
        $result = mysqli_query($conn,"SELECT DISTINCT  * FROM `transactions` WHERE `Reciver_pin-no`='".$_SESSION["username"]."'");
        echo "<table class='table' id='mytable' class='display'>
        <thead><tr>
            <th scope='col' onclick=''>Transaction_id</th>
            <th scope='col' onclick=''>Accession_no</th>
            <th scope='col' onclick=''>Title</th>
            <th scope='col' onclick=''>Reciver_pin-no</th>
            <th scope='col' onclick=''>issuance_date</th>
            <th scope='col' onclick=''>Reurn_date</th>
            <th scope='col' onclick=''>Status</th>
        </tr></thead>";
        while($row = mysqli_fetch_assoc($result)){
            // $Status = ($row['is_available'] == 1) ? "available" : "unavailable" ;
            echo "<tr>
                        <td>".$row['Transaction_id']."</td>
                        <td>".$row['Accession_no']."</td>
                        <td>".$row['Title']."</td>
                        <td>".$row['Reciver_pin-no']."</td>
                        <td>".$row['issuance_date']."</td>
                        <td>".$row['Reurn_date']."</td>
                        <td>".$row['Status']."</td>
                    </tr>";
        } 
    }
    ?>

    </table>
     <!-- RequestConfrimModal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confrim Your request</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="h6"><b>Your are requesting for</b></div>
            <div><b>Accession_no : </b><Accession_no id="RequestedBookID"></Accession_no></div>
            <div><b>Book Title : </b><BookTitle id="RequestedBookTitle"></BookTitle></div>
        </div>
        <div class="modal-footer">
            <form action="/requestBook.php" method="post">
                <input type="text" name="Accessioninput" id="Accessioninput" value='' hidden>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" ID='request_confrim'>Confrim</button>
            </form>
        </div>
        </div>
    </div>
    </div>

</body>
    <script src="/static/jquery-3.7.0.min.js"></script>
    <script src="/static/jquery.dataTables.js"></script>
    <script src="/static/bootstrap.min.js"></script>
    <script>
        function logout() {
            window.location = "logout.php";
        }

    </script>
      <script>
    $(document).ready(function () {
      $('#mytable').DataTable();

    });
  </script>
    <script>  
        requests =document.getElementsByClassName('request_book');
        Array.from(requests).forEach((element) => {
        element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        Accession_no = tr.getElementsByTagName("td")[0].innerText;
        BookTitle =tr.getElementsByTagName('td')[1].innerText;
        document.getElementById('RequestedBookID').innerHTML = Accession_no;
        document.getElementById('RequestedBookTitle').innerHTML = BookTitle;
        document.getElementById('Accessioninput').value = Accession_no;
      })
    })
    </script>
    
</html>