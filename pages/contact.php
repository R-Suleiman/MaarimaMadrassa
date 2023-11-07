<!DOCTYPE html>
<html>
<head>
<title>MAARIMA MADRASSA | CONTACT</title>
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
.msgSentSuccess {
  width:100%;
  padding:10px;
  background-color: green;
  color:white;
  font-size:20px;
  display: none;
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
        <div class="msgSentSuccess">hello</div>
        <div class="header_bottom" style="display: flex; justify-content: space-between;">
          
          <h1>THE REGISTERED <span style="color: green">MAARIMA</span> MADRASSA</h1>
          
          
          <div class="mainLogoBlock" style="width: 50%;">
          <img src="../images/Maarima_logo.jpg" alt=""  class="main-logo">

          </div>
        </div>
      </div>
    </div>

    <?php
    include '../assets/includes/navbar.php'
    ?>

  <section id="contentSection" class="main-content" style="display:flex; align-items: center">
    <div class="row contact_row">
      <div class="col-lg-8 col-md-8 col-sm-8" style="width:100%;">
        <div class="left_content">
          <div class="contact_area">
            <h2>Contact Us</h2>
            <p>For any enquery or Feedback to Maarima Madrassa, please fill and submit the form below. We appreciate your feedback!</p>
            <form method="POST" action="../assets/php/ajax.php" class="contact_form">
              <label id="nameMsg" style="display:none"></label>
              <input class="form-control nameInput" type="text" name="name" placeholder="Name">
              <input class="form-control emailInput" type="email" name="email" placeholder="Email">
              <label id="phoneMsg" style="display:none"></label>
              <input class="form-control phoneInput" type="phoneNo" name="phoneNo" placeholder="Phone Number"> <br>
              <label id="msgMsg" style="display:none"></label>
              <textarea class="form-control msgInput" cols="30" rows="10" name="message" placeholder="Message"></textarea>
              <input type="submit" name="submitContact">
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="contact-logo" style="width: 55%; margin: 0 auto"> <img src="../images/Maarima_logo.jpg" style="width: 100%"></div>
  </section>
 
  <?php
  include "../assets/includes/footer.php";
  ?>

</div>


<form method="post" action="gallery.php" id="myForm">
    <input action="getGallery" type="hidden" value="1", name="currentpage" id="currentpage">
    </form>

<script>
        const params = window.location.search
        const status = new URLSearchParams(params).get('success')
        console.log(status);

        window.addEventListener('load', () => { 
            const msgSentSuccessDOM = document.querySelector('.msgSentSuccess');
            
            if (status === 'true') { 
                setTimeout(() => {
                    msgSentSuccessDOM.style.display = 'block';
                    msgSentSuccessDOM.innerHTML = 'Message submitted Successfully';
                }, 500);
            } else if(status === 'false') {
              setTimeout(() => {
                    msgSentSuccessDOM.style.display = 'block';
                    msgSentSuccessDOM.style.backgroundColor = 'red';
                    msgSentSuccessDOM.innerHTML = 'An Error has occured, Please try again later.';
                }, 500);
            }

            setTimeout(() => {
                    msgSentSuccessDOM.style.display = 'none';
                }, 5000);
        });

// Gallery render
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
