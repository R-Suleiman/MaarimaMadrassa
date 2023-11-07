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

  .more-info-btn {
    border: none;
    background-color: blue;
    color: white;
    padding: 5px;
    border-radius: 10px;
    cursor: pointer;
  }

  .more-info-btn:hover {
    background-color: rgb(5, 5, 83);
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
          <img src="../images/Maarima_logo.jpg" alt="" class="main-logo">

          </div>
        </div>
      </div>
    </div>

    <?php
    include '../assets/includes/navbar.php'
    ?>

  <section id="contentSection" style="margin-top: 10px"> 

        <div class=" container">
        <div class="single_post_content ">

        <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);

          require_once '../assets/php/admin_add_news_code.php';
          $obj = new News();
            $id = $_GET['id'];
            $categoryName = $obj->getCategoryName($id);

            echo ' <h2><span>'.$categoryName.'</span></h2> ';

            $news = $obj->getCategoryNews($id);
            if (!empty($news)) {
              foreach($news as $data) {
                $count = strlen($data['news_title']);
                $count2 = strlen($data['news_description']);
                if ($count > 30) {
                  $title = substr($data['news_title'], 0, 30). ' . . . ';
                } else {
                  $title = $data['news_title'];
                }
                if ($count2 > 80) {
                  $desc = substr($data['news_description'], 0, 80). ' . . . ';
                } else {
                  $desc = $data['news_description'];
                }
                echo '
                <div class="single_post_content_left left-22">
                <ul class="business_catgnav  wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig "> <a href="single_page.php?id='.$data['news_ID'].'" class="featured_img "> <img alt="" src="../assets/images/news/'.$data['news_image1'].'">  </a>
                      <h4 style="margin-top: 20px;">'.$title.'</h4>
                      <P>'.$desc.'</P>
                    </figure>
                  </li>
                </ul>
                <a href="single_page.php?id='.$data['news_ID'].'"><button class="more-info-btn">Read More</button></a>
              </div>
                ';
              }
            
            }  else {
              echo '
              <div style="background-color: red; color: white; text-align: center; height: 200px">
                      <label style="margin-top: 90px; font-size: 18px">No news available!</label>
                    </div>
              ';
            }


            ?>

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
</body>
</html>