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
          <img src="../../images/Maarima_logo.jpg" alt="" class="main-logo">

          </div>
        </div>
      </div>
    </div>

    <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="../../index.php">Home</a></li>
              <li><a href="../pages/about.php">About</a></li>
              <li><a href="../pages/contact.php">Contact</a></li>
              <li><a href="../pages/category_news.php?id=2">Projects</a></li>
              <li><a href="../pages/category_news.php?id=3">Events</a></li>
              <li><a href="../pages/gallery.php">Gallery</a></li>
            </ul>
          </div>
          <div class="header_top_right">
          <p><?php echo date('Y-m-d'); ?></p>
          </div>

        </div>
      </div>
    </div>
  </header>
  
  <section id="contentSection">
    <div class="login-box">
    <h2>Admin Login</h2>
    <form action="../../assets/php/login_code.php" method="post">
      <input type="text" id="reg-no-text" name="usernameEmail" class="loginInput" placeholder="username or email" autocomplete="off" required> <br>
      <input type="password" name="password" id="password-text" class="loginInput" placeholder="Password" autocomplete="off" required> <br>
      <button type="submit" name="admin-login" id="loginBtn">Login</button> <br>
      <span><a href="">Forgot password?</a></span> <br> 
    </form>
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
            <li><a href="../category_news.php?id=1">Academic</a></li>
            <li><a href="../category_news.php?id=2">Projects</a></li>
            <li><a href="../category_news.php?id=3">Events</a></li>
            <li><a href="../gallery.php">Gallery</a></li>
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
<script src="../../assets/js/jquery.min.js"></script> 
<script src="../../assets/js/wow.min.js"></script> 
<script src="../../assets/js/bootstrap.min.js"></script> 
<script src="../../assets/js/slick.min.js"></script> 
<script src="../../assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="../../assets/js/jquery.newsTicker.min.js"></script> 
<script src="../../assets/js/jquery.fancybox.pack.js"></script> 
<script src="../../assets/js/custom.js"></script>
</body>
</html>