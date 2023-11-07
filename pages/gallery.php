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
  
  <section id="contentSection" class="imgGallery">
<br>
<div class="row">

<?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);

            require_once '../assets/php/admin_add_news_code.php';
            $obj = new News();
       
            if($_SERVER['REQUEST_METHOD'] === 'POST') {

              if(isset($_POST['currentpage'])) {
                $totalGallery = $obj->getGalleryCount();
                $totalPages = ceil(intval($totalGallery) / 16);
                $currentPage = $_POST['currentpage'];
                $newCount = 1;
              
                          // Validate and sanitize the current page value
                    $currentPage = max(1, min($currentPage, $totalPages));
    
                    $start = 0;
                    $limit = 16;
    
                    // Calculate the start index for retrieving gallery
                    $start = ($currentPage - 1) * $limit;
                    $gallery = $obj->getGallery($start, $limit);

                    foreach($gallery as $gall) {
                      echo '
                      <div class="column">
                      <img src="../assets/images/gallery/'.$gall['image_name'].'" alt="">
                      <lable> '.$gall['date_added'].'</lablel>
                      <p style="padding: 3px; margin: 5px 0; font-size: 16px;">'.$gall['image_description'].'</p>
                    </div>
                      ';
                    }

                    echo '</div>
                    </div>';

                    if($totalPages > 1) {
                      echo '
                      <center><nav aria-label=" page navigation example" id="pagination">
                      <ul class="pagination justify-content-center">';
                
                      $prevClass = ($currentPage === 1) ? "disabled" : "";
                      echo '
                      <li class="page-item '.$prevClass.'"><a href="#" class="page-link" data-page="'.($currentPage - 1).'">Previous</a></li>
                      ';
        
                      for ($p = 1; $p <= $totalPages; $p++) {
                        $activeClass = $currentPage == $p? "active" : "";
                        echo '
                        <li class="page-item '.$activeClass.'"><a href="#" class="page-link" data-page="'.$p.'">'.$p.'</a></li>
                        ';
                      }
                      $nextClass = ($currentPage >= $totalPages) ? "disabled" : "";
                      echo '
                      <li class="page-item '.$nextClass.'"><a href="#" class="page-link" data-page="'.($currentPage + 1).'">Next</a></li>
                      </ul>
                      </nav></center>
                      ';
                    }
              }
            }
?>

<form method="post" action="" id="myForm2">
    <input action="getusers" type="hidden" value="1", name="currentpage" id="currentpage2">
    </form>

</section>
<br><br>
  
  <?php
  include "../assets/includes/footer.php";
  ?>

</div>

<script>

    // Event listener for pagination links
    document.querySelectorAll('.page-link').forEach(function(link) {
  link.addEventListener('click', function(event) {
    event.preventDefault();
    var page = this.getAttribute('data-page');
    document.getElementById('currentpage2').value = page;
    document.getElementById('myForm2').submit();
  });
});

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