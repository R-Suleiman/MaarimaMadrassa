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
  .more-info-btn {
    border: none;
    background-color: green;
    color: white;
    padding: 5px;
    border-radius: 10px;
    cursor: pointer;
  }

  .more-info-btn:hover {
    background-color: rgb(29, 92, 10);
  }
  #delete-business {
    font-size: 20px;
    margin: 0 10px;
    color: red;
  }
  .view-all {
    width:90px;
    position: relative;
    left: 40%;
    margin: 20px 0;
  }
  .category-lable{
    background-color: yellow;
    color: black;
    padding: 7px;
    margin: 10px 0;
    border-radius: 10px;
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
  <a href=""><li>Dashboard</li></a>
  </ul>
  <a href="admin_add_News.php"><button id="add-news">Add News</button></a>
</div>

<section class="container dashboard-content">

<?php
include 'includes/admin_navbar.php';
?>

  <div class="right-dashboard container" style="padding: 10px">
  <i class="fa fa-align-justify toggleDashboard" id="hideDash2"></i>
  <h3>Overview</h3>
  <div class="overview">

  <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
              
          require_once '../../assets/php/admin_add_news_code.php';
          $obj = new News();

          $newsCount = $obj->getCount(1);
          $projectsCount = $obj->getCount(2);
          $eventsCount = $obj->getCount(3);
          $contactsCount = $obj->getContactsCount();
          $galleryCount = $obj->getGalleryCount();

          echo '
          <div class="single-overview">
          <label>Academic</label> <br>
            <label class="count">'.$newsCount.'</label>
          </div>
          <div class="single-overview">
          <label>Projects</label> <br>
          <label class="count">'.$projectsCount.'</label>
        </div>
        <div class="single-overview">
        <label>Events</label> <br>
          <label class="count">'.$eventsCount.'</label>
        </div>
        <div class="single-overview">
        <label>Gallery</label> <br>
          <label class="count">'.$galleryCount.'</label>
        </div>
        <div class="single-overview">
        <label>Contacts</label> <br>
          <label class="count">'.$contactsCount.'</label>
        </div>
          ';
  ?>


  </div>


  <div class="single_post_content">
              <h2><span>Recent News Posts</span></h2>

              <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          
          require_once '../../assets/php/admin_add_news_code.php';
              $obj = new News();

              $start = 0;
              $limit = 3;
              $news = $obj->getRows($start, $limit);

              foreach($news as $new) {
                $category = $obj->getCategoryName($new['category_ID']);
                $desc = substr($new['news_description'], 0, 70). ' . . . ';
                $title = substr($new['news_title'], 0, 30). ' . . . ';
                echo '
                <div class="single_post_content_left left-22">
                <ul class="business_catgnav  wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig "> <a href="admin_single_news.php?id='.$new['news_ID'].'" class="featured_img "> <img alt="" src="../../assets/images/news/'.$new['news_image1'].'" id="recentImg">  </a>
                    <label class="category-lable">'.$category.'</label>
                      <h5 style="margin-top: 20px;">'.$title.'</h5>
                      <P>'.$desc.'</P>
                    </figure>
                  </li>
                </ul>
                <a href="admin_single_news.php?id='.$new['news_ID'].'"><button class="more-info-btn">Read More</button></a>
                <div style="float: right;">
                <a href="admin_update_News.php?id='.$new['news_ID'].'" data-id="'.$new['news_ID'].'"><button class="more-info-btn">Update</button></a>
                <a onclick="return confirm(\'Are you sure you want to delete news?\')" href="../../assets/php/admin_delete_News.php?id='.$new['news_ID'].'"><i class="fa fa-trash" id="delete-business"></i></a>
                </div>
              </div>
                ';
              }

        ?>
  </div>
  <!-- <a href="#"><button class="more-info-btn view-all all-news">View All</button></a> -->
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
    document.querySelectorAll('.getProjects').forEach(function(link) {
  link.addEventListener('click', function(event) {
    event.preventDefault();
        // Check if the form has already been submitted
        if (!localStorage.getItem('formSubmitted')) {

      document.getElementById('myForm2').submit();

      } else{
      localStorage.removeItem('formSubmitted');
      }
  });
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