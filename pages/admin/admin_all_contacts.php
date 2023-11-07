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
    <li>Feedbacks</li>
  </ul>
</div>

<section class="container dashboard-content">

  <div class="right-dashboard all-news container">
    <h4>Feedbacks</h4>
    <div style="width: 100%; overflow: auto;">
    <table>
      <thead>
        <th>S/n</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Message</th>
        <th id="last">Actions</th>
      </thead>
      <tbody>

      <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);

            require_once '../../assets/php/admin_add_news_code.php';
            $obj = new News();
       
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
              if(isset($_POST['currentpage'])) {
                $totalNews = $obj->getContactsCount();
                $totalPages = ceil(intval($totalNews) / 10);
                $currentPage = $_POST['currentpage'];
                $newCount = 1;
              
                          // Validate and sanitize the current page value
                    $currentPage = max(1, min($currentPage, $totalPages));
    
                    $start = 0;
                    $limit = 10;
    
                    // Calculate the start index for retrieving news
                    $start = ($currentPage - 1) * $limit;
                    $news = $obj->getContacts($start, $limit);

                    foreach($news as $new) {
                      echo '
                      <tr>
                      <td>'.$newCount.'</td>
                      <td>'.$new['name'].'</td>
                      <td>'.$new['email'].'</td>
                      <td>'.$new['phoneNo'].'</td>
                      <td>'.$new['message'].'</td>
                      <td>
                      <a onclick="return confirm(\'Are you sure you want to delete contact?\')" href="../../assets/php/admin_delete_contact.php?id='.$new['contactId'].'"><i class="fa fa-trash" style="color: red; padding: 4px; border-radius:2px"></i></a>
                  </td>            
                      </tr>
                      ';
                      $newCount++;
                    }
                    echo '                
                    </tbody>
                    </table>
                    </div>
                    ';

              if($totalPages > 1) {
              echo '
              <nav aria-label=" page navigation example" id="pagination">
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
              </nav>
              ';
            }
          }
        }
            
      ?>

    <form method="post" action="" id="myForm2">
    <input action="getusers" type="hidden" value="1", name="currentpage" id="currentpage2">
    </form>
    

  </div>
</section>

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