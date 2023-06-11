<?php
    include('sql_query\config.php');
    if(!$_SESSION["is_LoggedIn"] || !$_SESSION['is_admin']){
            header("Location: index.php");
    }
    
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en-IN"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="MBTS">
    <meta name="description" content="">
    <title>Page 1</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Page-1.css" media="screen">
    <link rel="stylesheet" href="/static/jquery.dataTables.css">
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.11.4, nicepage.com">
        <link rel="stylesheet" href="/static/bootstrap.min.css">
    <script src="/static/bootstrap.bundle.min.js" class="u-script"></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Site1"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Page 1">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-overlap u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-palette-4-base u-sticky u-sticky-279e u-header" id="sec-ab67">
  <?php
    include ('alerts.php');
  ?>
  <div class="u-clearfix u-sheet u-sheet-1">
        <h5 class="u-text u-text-default u-text-1">$username</h5>
        <h5 class="u-text u-text-default u-text-2">Logout</h5>
      </div><style class="u-sticky-style" data-style-id="279e">.u-sticky-fixed.u-sticky-279e:before, .u-body.u-sticky-fixed .u-sticky-279e:before {borders: top right bottom left !important
}</style></header>
    <section class="u-clearfix u-section-1" id="sec-2675">
      <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-hidden-xs u-layout-cell u-palette-1-base u-size-11 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <a href="/admin.php?tab=books" class="u-btn text-center u-button-style u-hover-palette-1 u-palette-4-dark-1 u-btn-1 text-start" data-animation-name="flipIn" data-animation-duration="1000" data-animation-direction="X">All Books&nbsp;<span class="u-icon u-text-white"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-.006,0.011-.013,0.018-.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg></span>
                </a>
                <a href="/admin.php?tab=requests" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-2 u-palette-4-dark-1 u-radius-2 u-btn-2" data-animation-name="flipIn" data-animation-duration="1000" data-animation-direction="X">Requests&nbsp;<span class="u-icon u-text-white"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-.006,0.011-.013,0.018-.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg></span>
                </a>
                <a href="/admin.php?tab=Transactions" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-2 u-palette-4-dark-1 u-radius-2 u-btn-3" data-animation-name="flipIn" data-animation-duration="1000" data-animation-direction="X">Add Books&nbsp;<span class="u-icon u-text-white"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-.006,0.011-.013,0.018-.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg></span>
                </a>
                <a href="/admin.php?tab=add_Book" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-2 u-palette-4-dark-1 u-radius-2 u-btn-4" data-animation-name="flipIn" data-animation-duration="1000">Add Student&nbsp;<span class="u-icon u-text-white"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-.006,0.011-.013,0.018-.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg></span>
                </a>
                <a href="/admin.php?tab=ADD_students" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-2 u-palette-4-dark-1 u-radius-2 u-btn-5" data-animation-name="flipIn" data-animation-duration="1000" data-animation-direction="X">Next&nbsp;<span class="u-icon u-text-white"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-.006,0.011-.013,0.018-.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg></span>
                </a>
                <a href="https://nicepage.com/k/adult-html-templates" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-2 u-palette-4-dark-1 u-radius-2 u-btn-6" data-animation-name="flipIn" data-animation-duration="1000" data-animation-direction="X" data-animation-delay="0">Next&nbsp;<span class="u-icon u-text-white"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-.006,0.011-.013,0.018-.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg></span>
                </a>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-49 u-white u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
    
            </div>
          </div>
        </div>
      </div>
    </section>  
</body>
<script class="u-script" src="jquery-3.7.0.min.js"></script>
<script class="u-script" src="jquery.dataTables.js"></script>
<script class="u-script" src="bootstrap.min.js"></script>
    <script>
        function logout() {
            window.location = "logout.php";
        }

    </script>
      <script>
    $(document).ready(function () {
      $('#mytable').dataTable();

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
    </script></html>