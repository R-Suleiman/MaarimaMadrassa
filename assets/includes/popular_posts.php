<?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          
          require_once '../assets/php/admin_add_news_code.php';
              $obj = new News();

              $start = 0;
              $limit = 4;
              $news = $obj->getTrendingNews($start, $limit);
              if(!empty($news)) {
              foreach($news as $new) {
                echo '
                <li>
                <div class="media wow fadeInDown"> <a href="single_page.php?id='.$new['news_ID'].'" class="media-left"> <img alt="" src="../assets/images/news/'.$new['news_image1'].'"> </a>
                  <div class="media-body"> <a href="single_page.php?id='.$new['news_ID'].'" class="catg_title"> '.$new['news_title'].'</a> </div>
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