<?php
    include('sql_query\config.php');
    if(!$_SESSION["is_LoggedIn"] || !$_SESSION['is_admin']){
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
    <link rel="stylesheet" href="admin.css">
    <script src="/static/bootstrap.bundle.min.js"></script>
    <title>admin</title>
</head>
<body>
    <?php
    include ('alerts.php');
    ?>
    <div class="row align-items-end">
      <div class="col">      
    <input type="button" id="logout" style="align-left" value="logout" id="logout" onclick="logout()">
      </div>
      <div class="col">
        <?php echo $_SESSION["username"]; ?>
  </div>
  </div>
    <br>
    <button id="BOOKS" onclick="window.location = '/admin.php?tab=books'">All Books</button>
    <button id="DUE" onclick="window.location = '/admin.php?tab=requests'">Requests</button>
    <button id="Transactions" onclick="window.location = '/admin.php?tab=Transactions'">Transactions</button>
    <button id="Add_Books" onclick="window.location = '/admin.php?tab=add_Book'">Add_Book</button>
    <button id="Add_students" onclick="window.location = '/admin.php?tab=ADD_students'">Add_Student</button>
    <?php
      
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['tab'])) {
                # code...
                echo "<h1>".$_GET['tab']."</h1>";
            }
            else
                header("Location: admin.php?tab=books");
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
        <th scope='col'>Status</th>
    </tr></thead>";
    while($row = mysqli_fetch_assoc($result)){
        $Status = ($row['is_available'] == 1) ? "available" : "unavailable" ;
        $id = $row['Accession_no'];
        echo "<tr><td>".$row['Accession_no']."</td>
                  <td>".$row['Title']."</td>
                  <td>".$row['Branch']."</td>
                  <td>".$row['Author']."</td>
                  <td>".$Status."</td>
                </tr>";

    } 

    }
    elseif($_GET['tab'] == "requests"){
        $result = mysqli_query($conn,"SELECT DISTINCT  DISTINCT `Transaction_id`, `Accession_no`, `Title`, `Reciver_pin-no`, `Status`, `Transaction_Position` FROM `transactions` WHERE `Status` = 'waiting for admin to accept'");
        echo "<table class='table' id='mytable' class='display'>
        <thead><tr>
            <th scope='col' onclick=''>Transaction_id</th>
            <th scope='col' onclick=''>Accession_no</th>
            <th scope='col' onclick=''>Title</th>
            <th scope='col' onclick=''>Reciver_pin-no</th>
            <th scope='col' onclick=''>Actions</th>
        </tr></thead>";
        while($row = mysqli_fetch_assoc($result)){
            // $Status = ($row['is_available'] == 1) ? "available" : "unavailable" ;
            echo "<tr><td>".$row['Transaction_id']."</td>
                        <td>".$row['Accession_no']."</td>
                        <td>".$row['Title']."</td>
                        <td>".$row['Reciver_pin-no']."</td>
                        <td><button type='button'id=".$row['Accession_no']." class='Accept_request btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal' >Accept</button></td>
                    </tr>";
        }

    }
    elseif($_GET['tab'] == "Transactions"){
        $result = mysqli_query($conn,"SELECT DISTINCT  * FROM `transactions` ");
        echo "<table class='table' id='mytable' class='display'>
        <thead><tr>
            <th scope='col' onclick=''>Transaction_id</th>
            <th scope='col' onclick=''>Accession_no</th>
            <th scope='col' onclick=''>Title</th>
            <th scope='col' onclick=''>Reciver_pin-no</th>
            <th scope='col' onclick=''>issuance_date</th>
            <th scope='col' onclick=''>Reurn_date</th>
            <th scope='col' onclick=''>Status</th>
            <!-- <th>Actions</th> -->
        </tr></thead>";
        while($row = mysqli_fetch_assoc($result)){
            $Status = ($row['Status'] == 'Collect Book by this evening') ? "student will collect book by evening  <button type='button'id=".$row['Accession_no']." class='Book_collected btn btn-primary' data-bs-toggle='modal' data-bs-target='#Bookcollectedmodal ' >
            Collected
            </button>" : $row['Status'] ;
            echo "<tr><td>".$row['Transaction_id']."</td>
                        <td>".$row['Accession_no']."</td>
                        <td>".$row['Title']."</td>
                        <td>".$row['Reciver_pin-no']."</td>
                        <td>".$row['issuance_date']."</td>
                        <td>".$row['Reurn_date']."</td>
                        <td>".$Status."</td>
                    </tr>";

        } 

    }
    elseif($_GET['tab'] == "add_Book"){ 
        echo '<form method="POST" action="/Addbook.php" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Accession number</label>
            <input type="text" name="BookID" class="form-control" id="inputCity" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">BOOK Title</label>
            <input type="text" name="Title" class="form-control" id="inputCity" required>
          </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Branch</label>
            <select  name="Branch" class="form-control" required>

              <option value="" selected>choose...</option>
              <option value="DCME">DCME</option>
              <option value="DME">DME</option>
              <option value="DEEE">DEEE</option>
              <option value="DECE">DECE</option>
              <option value="DCE">DCE</option>
              <option value="Genaral">Genaral</option>
            </select>
          </div>
          </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Author</label>
            <input type="text" name="Author" class="form-control">
          </div>
          <div class="form-group col-md-6">
          </div>
        </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="id_no">is_available</label>
              <select name="is_available" class="form-control">
              <option value="1">Available</option>
              <option value="2">UnAvailable</option>
             </select>
            </div>
          </div>
          <div class="form-row">
          <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary" class="form-control"><i class="fa fa-plus"></i> Add Book</button>
          </div>
        </div>
        </form>';
    }
    elseif($_GET['tab'] == "ADD_students"){ 
        echo '<form method="POST" class="p-3" action="/addstudent.php" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Pin number</label>
            <input type="text" name="pin" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-6">
            <label for="inputCity">password</label>
            <input type="text" name="password" class="form-control" id="inputCity">
          </div>
          </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">confrim password</label>
            <input type="text" name="confrimpass" class="form-control">
          </div>
          <br>
          <div class="form-row">
          <div class="col-md-12 text-left">
        <button type="submit" class="btn btn-primary" class="form-control"><i class="fa fa-plus"></i> Add Student</button>
          </div>
        </div>
        </form>';
    }
    ?>
    </table>
     <!-- RequestConfrimModal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Accept request</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="h6"><b>Your are accepting requesting of</b></div>
            <div><b>Accession_no : </b><Accession_no id="RequestedBookID"></Accession_no></div>
            <div><b>Book Title : </b><BookTitle id="RequestedBookTitle"></BookTitle></div>
            <div><b>Reciver Pin_no : </b><BookTitle id="ReciversPinno"></BookTitle></div>
        </div>
        <div class="modal-footer">
            <form action="/AcceptBook.php" method="post">
                <input type="text" name="ReciversPinno1" id="ReciversPinno1" value=''hidden>
                <input type="text" name="Accessioninput" id="Accessioninput" value='' hidden>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" ID='request_confrim'>Confrim</button>
            </form>
        </div>
        </div>
    </div>
    </div>
 <!-- BookCollectedModal -->
 <div class="modal fade" id="Bookcollectedmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Collected</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="h6"><b>Your are Confrimming that this book is collected</b></div>
            <div><b>Accession_no : </b><Accession_no id="ConfrimBookID"></Accession_no></div>
            <div><b>Book Title : </b><BookTitle id="confrimBookTitle"></BookTitle></div>
            <div><b>Reciver Pin_no : </b><BookTitle id="confrimReciversPinno"></BookTitle></div>
        </div>
        <div class="modal-footer">
            <form action="/BookCollected.php" method="post">
                <input type="text" name="confrimReciversPinno1" id="confrimReciversPinno1" value='' hidden>
                <input type="text" name="confrimAccessioninput" id="confrimAccessioninput" value='' hidden>
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
        requests =document.getElementsByClassName('Accept_request');
        Array.from(requests).forEach((element) => {
        element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        Accession_no = tr.getElementsByTagName("td")[1].innerText;
        BookTitle =tr.getElementsByTagName('td')[2].innerText;
        Pinno =tr.getElementsByTagName('td')[3].innerText;
        document.getElementById('RequestedBookID').innerHTML = Accession_no;
        document.getElementById('RequestedBookTitle').innerHTML = BookTitle;
        document.getElementById('ReciversPinno').innerHTML = Pinno;
        document.getElementById('ReciversPinno1').value = Pinno;
        document.getElementById('Accessioninput').value = Accession_no;
      })
    })
    </script>
    <script>  
        requests =document.getElementsByClassName('Book_collected');
        Array.from(requests).forEach((element) => {
        element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;
        Accession_no = tr.getElementsByTagName("td")[1].innerText;
        BookTitle =tr.getElementsByTagName('td')[2].innerText;
        Pinno =tr.getElementsByTagName('td')[3].innerText;
        document.getElementById('ConfrimBookID').innerHTML = Accession_no;
        document.getElementById('confrimBookTitle').innerHTML = BookTitle;
        document.getElementById('confrimReciversPinno').innerHTML = Pinno;
        document.getElementById('confrimReciversPinno1').value = Pinno;
        document.getElementById('confrimAccessioninput').value = Accession_no;
      })
    })
    </script>
</html>