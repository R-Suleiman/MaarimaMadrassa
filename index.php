<!DOCTYPE html>
<html>
<head>
<title>MWECAU UPDATES & INFORMATION</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->

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
          <img src="images/Maarima_logo.jpg" alt="" class="main-logo">

          </div>
        </div>
      </div>
    </div>
  <!-- <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="pages/about.php">About</a></li>
              <li><a href="pages/contact.php">Contact</a></li>
              <li><a href="pages/category_news.php?id=2">Projects</a></li>
              <li><a href="pages/category_news.php?id=3">Events</a></li>
              <li><a href="pages/gallery.php">Gallery</a></li>
            </ul>
          </div>
          <div class="header_top_right">
          <p><?php echo date('Y-m-d'); ?></p>
          </div>

        </div>
      </div>
    </div>
  </header> -->


     <section id="navArea">
     <nav class="navbar navbar-inverse" role="navigation">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
       </div>
       <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav main_nav">
           <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
           <li><a href="pages/category_news.php?id=1">Academic</a></li>
           <li><a href="pages/category_news.php?id=2">Projects</a></li>
           <li><a href="pages/category_news.php?id=3">Events</a></li>
           <li class="getGallery"><a href="pages/gallery.php">Gallery</a></li>
          <li><a href="pages/about.php">About</a></li>
           <li><a href="pages/contact.php">Contact</a></li>
         </ul>
       </div>
     </nav>
    </section>
   
 
     <section id="sliderSection">
     <br>
    <label class="category-lable">GALLERY</label>
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
        <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          
          require_once 'assets/php/admin_add_news_code.php';
              $obj = new News();

              $start = 0;
              $limit = 4;
              $news = $obj->getTrendingNews($start, $limit);
              if(!empty($news)) {
              foreach($news as $new) {
                $category = $obj->getCategoryName($new['category_ID']);
                $count = strlen($new['news_title']);
                $count2 = strlen($new['news_description']);
                if ($count > 55) {
                  $title = substr($new['news_title'], 0, 30). ' . . . ';
                } else {
                  $title = $new['news_title'];
                }
                if ($count2 > 75) {
                  $desc = substr($new['news_description'], 0, 75). ' . . . ';
                } else {
                  $desc = $new['news_description'];
                }
                echo '
                <div class="single_iteam" style="background-image: url(\'assets/images/news/'.$new['news_image1'].'\'); background-size: cover;">
                    <div class="slider_article">
                        <label class="category-lable">'.$category.'</label>
                        <h2 id="trendHead"><a href="pages/single_page.php?id='.$new['news_ID'].'">'.$title.'</a></h2>
                        <p id="trendDesc"">'.$desc.'</p>
                    </div>
                </div>
            ';
            
              }
            }  else {
              echo '
              <li>
              <div style="background-color: red; color: white; text-align: center; height: 200px">
                      <label style="margin-top: 90px; font-size: 18px">No news available!</label>
                    </div>
                    </li>
              ';
            }

        ?>

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest updates</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
             
            <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          
          require_once 'assets/php/admin_add_news_code.php';
              $obj = new News();

              $start = 0;
              $limit = 5;
              $news = $obj->getRows($start, $limit);
              if(!empty($news)) {
              foreach($news as $new) {
                echo '
                
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.php?id='.$new['news_ID'].'" class="media-left"> <img alt="" src="assets/images/news/'.$new['news_image1'].'"> </a>
                    <div class="media-body"> <a href="pages/single_page.php?id='.$new['news_ID'].'" class="catg_title"> '.$new['news_title'].'</a> </div>
                  </div>
                </li>
          
                ';
              }
            } else {
              echo '
              <li>
              <div style="background-color: red; color: white; text-align: center; height: 200px">
                      <label style="margin-top: 90px; font-size: 18px">No news available!</label>
                    </div>
                    </li>
              ';
            }
        ?>

            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Academic</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="pages/category_news.php?id=1" class="featured_img"> <img alt="" src="images/academic.jpeg"> <span class="overlay"></span> </a>
                    <figcaption> <a href="pages/category_news.php?id=1">Get all Academic News and Updates happening at Maarima Madrassa</a> </figcaption>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
              <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          
          require_once 'assets/php/admin_add_news_code.php';
              $obj = new News();

              $start = 0;
              $limit = 4;
              $news = $obj->getSpecifNews($start, $limit, 1);

              if(!empty($news)) {
              foreach($news as $new) {
                echo '
                
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.php?id='.$new['news_ID'].'" class="media-left"> <img alt="" src="assets/images/news/'.$new['news_image1'].'"> </a>
                    <div class="media-body"> <a href="pages/single_page.php?id='.$new['news_ID'].'" class="catg_title"> '.$new['news_title'].'</a> </div>
                  </div>
                </li>
          
                ';
              }
            }  else {
              echo '
              <li>
              <div style="background-color: red; color: white; text-align: center; height: 200px">
                      <label style="margin-top: 90px; font-size: 18px">No news available!</label>
                    </div>
                    </li>
              ';
            }

        ?>
                
              </ul>
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
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          
          require_once 'assets/php/admin_add_news_code.php';
              $obj = new News();

              $start = 0;
              $limit = 4;
              $news = $obj->getTrendingNews($start, $limit);
              if(!empty($news)) {
              foreach($news as $new) {
                echo '
                <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.php?id='.$new['news_ID'].'" class="media-left"> <img alt="" src="assets/images/news/'.$new['news_image1'].'"> </a>
                  <div class="media-body"> <a href="pages/single_page.php?id='.$new['news_ID'].'" class="catg_title"> '.$new['news_title'].'</a> </div>
                </div>
              </li>
                ';
              }
              } else {
                echo '
                <li>
                <div style="background-color: red; color: white; text-align: center; height: 200px">
                        <label style="margin-top: 90px; font-size: 18px">No trending news available!</label>
                      </div>
                      </li>
                ';
              }
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


  <footer id="footer">
  <div class="footer_top">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="footer_widget wow fadeInLeftBig">
          <h2>MAARIMA MADRASSA</h2>
          <P>A platform developed specifically to provide means for information and updates sharing about Maarima Madrassa</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="footer_widget wow fadeInDown">
          <h2>Quick Links</h2>
          <ul class="tag_nav">
            <li><a href="pages/category_news.php?id=1">Academic</a></li>
            <li><a href="pages/category_news.php?id=2">Projects</a></li>
            <li><a href="pages/category_news.php?id=3">Events</a></li>
            <li><a href="pages/gallery.php">Gallery</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="footer_widget wow fadeInRightBig">
          <h2>Contact</h2>
          <address>
          Maarima Madrassa, <br>
          P.O.Box 6716, <br>
          Moshi-Kilimanjaro, Tanzania.
          </address>
          <i class="fa fa-phone"></i><span> 0652 235 141</span><br>
        </div>
      </div>
    </div>
  </div>
  <div>
    <ul class="social_nav">
      <li class="facebook"><a href="#"></a></li>
      <li class="twitter"><a href="#"></a></li>
      <li class="youtube"><a href="#"></a></li>
      <li class="mail"><a href="#"></a></li>
    </ul>
  </div>
  
  <div class="footer_bottom">
    <p class="copyright">Copyright &copy; <?php echo date('Y'); ?><a href="../index.php"> MAARIMA-MADRASSA</a></p>
    <p class="developer" style="color: whitesmoke">Developed By S & J</p>
  </div>
</footer>
  

</div>

<form method="post" action="pages/gallery.php" id="myForm">
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
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
</body>
</html>