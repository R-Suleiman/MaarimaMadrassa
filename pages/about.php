<!DOCTYPE html>
<html>
<head>
<title>ABOUT | MWECAU UPDATES & INFORMATION</title>
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
  
  <section id="contentSection">
    <div class="row" style="width:100%;">
      <div class="col-lg-8 col-md-8 col-sm-8" style="width:100%;">
        <div class="left_content">
          <div class="contact_area">
            <h2>About Us</h2>
            <img src="../images/Maarima_logo.jpg" style="width: 50%; float: right">
            <p>A platform developed specifically to provide means for information and updates sharing about Maarima Madrassa</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus, officia possimus neque mollitia, incidunt odit explicabo molestias porro tempore at esse. Nesciunt aut porro commodi voluptatibus ipsam sapiente incidunt qui. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur illum veritatis expedita quod odio a aliquid dignissimos dicta repellendus provident, aliquam quasi eaque tempore, repudiandae nam accusamus voluptatem, incidunt quia.</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus, officia possimus neque mollitia, incidunt odit explicabo molestias porro tempore at esse. Nesciunt aut porro commodi voluptatibus ipsam sapiente incidunt qui. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur illum veritatis expedita quod odio a aliquid dignissimos dicta repellendus provident, aliquam quasi eaque tempore, repudiandae nam accusamus voluptatem, incidunt quia.</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus, officia possimus neque mollitia, incidunt odit explicabo molestias porro tempore at esse. Nesciunt aut porro commodi voluptatibus ipsam sapiente incidunt qui. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur illum veritatis expedita quod odio a aliquid dignissimos dicta repellendus provident, aliquam quasi eaque tempore, repudiandae nam accusamus voluptatem, incidunt quia.</p>
          </div>
        </div>
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