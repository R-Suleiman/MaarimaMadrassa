<!DOCTYPE html>
<html>
<head>
<title>MWECAU UPDATES & INFORMATION</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font.css">
<link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

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

<div class="row">
      <div class="col-lg-12 col-md-12 col-sm-14" >
      <div class="header_bottom" style="display: flex; justify-content: space-between">
          
          <h1>THE REGISTERED <span style="color: green">MAARIMA</span> MADRASSA</h1>
          
          
          <div class="mainLogoBlock" style="width: 20%;">
          <img src="../images/Maarima_logo.jpg" alt="" class="main-logo">

          </div>
        </div>
      </div>
    </div>

    <?php
    include '../assets/includes/navbar.php'
    ?>

 
  <section id="contentSection" style="margin-top: 10px">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">

            <?php
            error_reporting(E_ALL);
             ini_set('display_errors', 1);
                      
            require_once '../assets/php/admin_add_news_code.php';
            $obj = new News();
            $id = $_GET['id'];
            $news = $obj->getRow($id);
            $category = $obj->getCategoryName($news['category_ID']);
            
            echo '
            
            <ol class="breadcrumb">
            <li><a href="category_news.php?id='.$news['category_ID'].'">'.$category.'</a></li>
            <li class="active">info</li>
            </ol>

            <h1>'.$news['news_title'].'</h1>
            <div class="post_commentbox"> <span><i class="fa fa-calendar"></i>'.$news['news_date'].'</span> <a href="#"><i class="fa fa-tags"></i>'.$category.'</a> </div>
            <div class="single_page_content"> <img class="img-center" src="../assets/images/news/'.$news['news_image1'].'" alt="">
              <p style="font-size: 16px">'.$news['news_description'].'</p>
            ';
            ?>
              <hr>              
            </div>
          </div>
        </div>
      </div>
    
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
          
          <?php
          include "../assets/includes/popular_posts.php";
          ?>

            </ul>
          </div>
          <!-- <div class="single_sidebar">
            <h2><span>VIDEOS</span></h2>
              
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              
          </div> -->
        </aside>
      </div>
    </div>
  </section>
 
  <?php
  include "../assets/includes/footer.php";
  ?>

</div>

<form method="post" action="gallery.php" id="myForm">
    <input action="getGallery" type="hidden" value="1", name="currentpage" id="currentpage">
    </form>

<script>
  document.querySelector('.getGallery').addEventListener('click', (event)=>{
  event.preventDefault();
        // Check if the form has already been submitted
        if (!localStorage.getItem('formSubmitted')) {

      document.getElementById('myForm').submit();

      } else{
      localStorage.removeItem('formSubmitted');
      }
})
</script>

<script src="../assets/js/jquery.min.js"></script> 
<script src="../assets/js/wow.min.js"></script> 
<script src="../assets/js/bootstrap.min.js"></script> 
<script src="../assets/js/slick.min.js"></script> 
<script src="../assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="../assets/js/jquery.newsTicker.min.js"></script> 
<script src="../assets/js/jquery.fancybox.pack.js"></script> 
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/script.js"></script>
</body>
</html>