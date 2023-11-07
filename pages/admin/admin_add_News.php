<?php
// include '../assets/php/connect.php';
session_start();

if(!isset($_SESSION['admin'])) {
  header('location: login.php');
} 
  
?>

<!DOCTYPE html>
<html>
<head>
<title>MWECAU UPDATES & INFORMATION</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/font.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

<style>
  .mwecau {
    color: blue;
  }

  .main-logo {
    width: 100%;
    border-radius: 20%;
    float: right;
    margin-right: 10px;
    margin-left: 0px;
  }
  .toggleDashboard {
    font-size: 28px; 
    background-color: black; 
    color: white; 
    padding: 5px; 
    border-radius: 5px;
    float: right;
  }

</style>

<!--[if lt IE 9]>
<script src="../assets/js/html5shiv.min.js"></script>
<script src="../assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-14" >
        <div class="header_bottom" style="display: flex; justify-content: space-between">
          
          <h1>THE REGISTERED <span style="color: green">MAARIMA</span> MADRASSA</h1>
          <div class="mainLogoBlock" style="width: 20%;">
          <img src="../../images/Maarima_logo.jpg" alt="" class="main-logo">
        </div>
      </div>
    </div>
    </div>
  </header>
</div>
<div class="dashboard-route container">
  <ul>
  <a href="admin_dashboard.php"> <li>Dashboard</li></a>
    <li>News</li>
    <li>Add news</li>
  </ul>
</div>

<section class="container dashboard-content">

<?php
include 'includes/admin_navbar.php';
?>

  <div class="right-dashboard container">
  <i class="fa fa-align-justify toggleDashboard" id="hideDash2"></i>
    <h4>Add News</h4>
    <form action="../../assets/php/ajax.php" method="post" id="addForm" enctype="multipart/form-data">
      <label for="newsTitle" class="article-lables">News title</label> <br>
      <input type="text" id="newsTitle" name="newsTitle"> <br>
      <label for="newsCategory" class="article-lables">Category</label> <br>
      <select name="newsCategory" id="newsCategory">
        <option value="Academic">Academic</option>
        <option value="">Projects</option>
        <option value="">Events</option>
      </select> <br>
      <label for="newsDesc" class="article-lables">News Description</label> <br>
      <textarea name="newsDesc" id="newsDesc" cols="50" rows="10"></textarea> <br>
      <label for="picture1" class="article-lables">Picture</label> <br>
      <input type="file" name="picture1" id="picture1"> <br>
      <label for="trending" class="article-lables">mark as trending</label>
      <input type="checkbox" name="trending" id="trending"> <br>
      <button type="submit" id="newsPostBtn" name="submit">Post News</button>
      <!-- 2 input fields, one for adding, the other for updating, deleting or viewing data -->
      <input type="hidden" name="action" value="addnews">
      <input type="hidden" name="newsId" id="newsId" value="">
    </form>
  </div>
</section>

<form method="post" action="admin_all_news.php" id="myForm">
    <input action="getnews" type="hidden" value="1", name="currentpage" id="currentpage">
    </form>

    <form method="post" action="admin_all_projects.php" id="myForm2">
    <input action="getprojects" type="hidden" value="1", name="currentpage" id="currentpage">
    </form>

    <form method="post" action="admin_all_events.php" id="myForm3">
    <input action="getEvents" type="hidden" value="1", name="currentpage" id="currentpage">
    </form>

    <form method="post" action="admin_all_contacts.php" id="myForm4">
    <input action="getContacts" type="hidden" value="1", name="currentpage" id="currentpage">
    </form>

       <form method="post" action="admin_gallery.php" id="myForm5">
    <input action="getGallery" type="hidden" value="1", name="currentpage" id="currentpage">
    </form>

    <script>

    // Event listener for pagination links
    document.querySelectorAll('.all-news').forEach(function(link) {
  link.addEventListener('click', function(event) {
    event.preventDefault();
        // Check if the form has already been submitted
        if (!localStorage.getItem('formSubmitted')) {

      document.getElementById('myForm').submit();

      } else{
      localStorage.removeItem('formSubmitted');
      }
  });
});

    // Event listener for pagination links
    document.querySelector('.getProjects').addEventListener('click', function(event) {
    event.preventDefault();
        // Check if the form has already been submitted
        if (!localStorage.getItem('formSubmitted')) {

      document.getElementById('myForm2').submit();

      } else{
      localStorage.removeItem('formSubmitted');
      }
  });

document.getElementById('getEvents').addEventListener('click', (event)=>{
  event.preventDefault();
        // Check if the form has already been submitted
        if (!localStorage.getItem('formSubmitted')) {

      document.getElementById('myForm3').submit();

      } else{
      localStorage.removeItem('formSubmitted');
      }
})

document.querySelector('.getContacts').addEventListener('click', (event)=>{
  event.preventDefault();
        // Check if the form has already been submitted
        if (!localStorage.getItem('formSubmitted')) {

      document.getElementById('myForm4').submit();

      } else{
      localStorage.removeItem('formSubmitted');
      }
})

document.querySelector('.getGallery').addEventListener('click', (event)=>{
  event.preventDefault();
        // Check if the form has already been submitted
        if (!localStorage.getItem('formSubmitted')) {

      document.getElementById('myForm5').submit();

      } else{
      localStorage.removeItem('formSubmitted');
      }
})
</script>


<script src="../../assets/js/jquery.min.js"></script> 
<script src="../../assets/js/wow.min.js"></script> 
<script src="../../assets/js/bootstrap.min.js"></script> 
<script src="../../assets/js/slick.min.js"></script> 
<script src="../../assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="../../assets/js/jquery.newsTicker.min.js"></script> 
<script src="../../assets/js/jquery.fancybox.pack.js"></script> 
<script src="../../assets/js/custom.js"></script>
<script src="../../assets/js/script.js"></script>
</body>
</html>