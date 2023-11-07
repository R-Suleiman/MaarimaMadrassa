<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'admin_add_news_code.php';
$obj = new News();
$news_posted = 0;
$news_failed = 0;
// Adding News action
if (isset($_POST['submit'])) {
    $newsTitle = $_POST['newsTitle'];
    $newsCategory = $_POST['newsCategory'];
    $newsDesc = $_POST['newsDesc'];
    $picture1 = $_FILES['picture1'];

    $newsId = (!empty($_POST['newsId'])) ? $_POST['newsId'] : "";

    $imagename1 = "";

    if (!empty($picture1['name'])) {
        $imagename1 = $obj->uploadPhoto($picture1);
        $categoryId = $obj->getCategoryId($newsCategory);
        $trending = ($obj->isTrending()) ? 1 : 0;

        $newsData = [
            'category_ID' => $categoryId,
            'news_title' => $newsTitle,
            'news_image1' => $imagename1,
            'news_description' => $newsDesc,
            'news_trend' => $trending,
            'news_date' => date('Y-m-d H:i:s'),
        ];
    } else {
        $categoryId = $obj->getCategoryId($newsCategory);
        $trending = ($obj->isTrending()) ? 1 : 0;

        $newsData = [
            'category_ID' => $categoryId,
            'news_title' => $newsTitle,
            'news_description' => $newsDesc,
            'news_trend' => $trending,
            'news_date' => date('Y-m-d H:i:s'),
        ];
    }

    $newsId = $obj->add($newsData);
   

    if (!empty($newsId)) {
        $news_posted = 1;
    }
}

   //getcountof function and get all news based on the specific page (pagination)
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['currentpage'])) {
            $currentPage = (!empty($_POST['currentpage'])) ? $_POST['currentpage'] : 1;
            $limit = 5;
            $start = ($currentPage - 1) * $limit;
            $news = $obj->getRows($start, $limit);
            if(!empty($news)){
                $newsList = $news;
            } else {
                $newsList = [];
            }

            $total = $obj->getCount();
            $newsArray = ['count' => $total, 'news' => $newsList];

        }
    }

    //updating news information
    $updateNewsSuccess = 0;
    $updateNewsFail = 0;
    if (isset($_POST['update'])) {
        $id = $_POST['newId'];
        $newsTitle = $_POST['newsTitle'];
        $newsCategory = $_POST['newsCategory'];
        $newsDesc = $_POST['newsDesc'];
        $picture1 = $_FILES['picture1'];

    
        // $newsId = (!empty($_POST['newsId'])) ? $_POST['newsId'] : "";
    
        $imagename1 = "";
    
        if (!empty($picture1['name'])) {
            $imagename1 = $obj->uploadPhoto($picture1);
            $categoryId = $obj->getCategoryId($newsCategory);
            $trending = ($obj->isTrending()) ? 1 : 0;
    
            $newsData = [
                'category_ID' => $categoryId,
                'news_title' => $newsTitle,
                'news_image1' => $imagename1,
                'news_description' => $newsDesc,
                'news_trend' => $trending,
                'news_date' => date('Y-m-d H:i:s'),
            ];
        } else {
            $categoryId = $obj->getCategoryId($newsCategory);
            $trending = ($obj->isTrending()) ? 1 : 0;
    
            $newsData = [
                'category_ID' => $categoryId,
                'news_title' => $newsTitle,
                'news_description' => $newsDesc,
                'news_trend' => $trending,
                'news_date' => date('Y-m-d H:i:s'),
            ];
        }
    
        $obj->update($newsData, $id);
        $updateNewsSuccess = 1;
    }

    // user sending contact
    if(isset($_POST['submitContact'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNO = $_POST['phoneNo'];
        $message = $_POST['message'];

        $contactData = [
            'name' => $name,
            'email' => $email,
            'phoneNo' => $phoneNO,
            'message' => $message,
        ];

       $commentId = $obj->sendContact($contactData);
        if($commentId) {
            header('location: ../../pages/contact.php?success=true');
        } else {
            header('location: ../../pages/contact.php?success=false');
        }
    }


            // changing admin password
            $currentPass2 = 0;
            $confirmPass2 = 0;
            $currentPassFail2 = 0;
            $confPassFail2 = 0;
            if (isset($_POST['adminChangePassword'])) {
                session_start();
                $id = $_SESSION['admin'];
                $currentPassword = $_POST['currentPassword'];
                $newPassword = $_POST['newPassword'];
                $confNewPassword = $_POST['confirm-password'];
        
                $adminData = $obj->getSingleAdmin($id);
        
                  if(!empty($adminData) && $adminData['password'] === $currentPassword) {
                    if ($newPassword === $confNewPassword) {
                        $adminData = [
                            'password' => $newPassword,
                        ];
                        $obj->updateAdminProfile($adminData, $id);
                        $confirmPass2 = 1;
                    } else {
                        $confPassFail2 = 1;
                    }
                    $currentPass2 = 1;
                  } else {
                    $currentPassFail2 = 1;
                  } 
            }

    // Adding to Gallery action
    if (isset($_POST['addGallery'])) {
        $picture1 = $_FILES['galleryImg1'];
        $picDesc1 = $_POST['imageDesc1'];
        $picture2 = $_FILES['galleryImg2'];
        $picDesc2 = $_POST['imageDesc2'];
        $picture3 = $_FILES['galleryImg3'];
        $picDesc3 = $_POST['imageDesc3'];
        $picture4 = $_FILES['galleryImg4'];
        $picDesc4 = $_POST['imageDesc4'];
        $allPics = [$picture1, $picture2, $picture3, $picture4];
        $allDescs = [$picDesc1, $picDesc2, $picDesc3, $picDesc4];

        $imageName = "";
        $count = 0;

        foreach ($allPics as $pic) {
            if (!empty($pic['name'])) {
                $imageName = $obj->uploadGalleryPic($pic);

                $galleryData = [
                    'image_name' => $imageName,
                    'image_description' => $allDescs[$count],
                    'date_added' => date('Y-m-d H:i:s'),
                ];
                $galleryId = $obj->addToGallery($galleryData);
            }
            $count++;
        }
    
       
        if($galleryId) {
            header('location: ../../pages/admin/admin_add_gallery.php?success=true');
        } else {
            header('location: ../../pages/admin/admin_add_gallery.php?success=false');
        }
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post News</title>

    <style>
        #success{
            width: 100%;
            background-color: lightgreen;
            padding: 10px;
        }
        #failed {
            width: 100%;
            background-color: red;
            padding: 10px;
        }
        .submit {
            padding: 5px;
            border: none;
            border-radius: 5px;
            background-color: blue;
            color: white;
            cursor: pointer;
            font-size: 15px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
 
    <?php  

        // posting news
    if($news_posted) {
        echo '
        <div id="success">
             news posted successfully!
         </div>
         <a href="../../pages/admin/admin_dashboard.php"><button type="submit" name="submit" class="submit">Return</button></a>
        ';
    } else {
        if($news_failed) {
            echo '
            <div id="failed">
                An error has occured. Couldnt post!
             </div>
            ';
        }
    }

        // changing admin password
        if($currentPass2) {
            if($confirmPass2) {
            echo '
            <div id="success">
                 Password Changed successfully!
             </div>
             <a href="../../pages/admin/admin_dashboard.php"><button type="submit" name="submit" class="submit">Return</button></a>
            ';
            } else {
                if($confPassFail2) {
                echo '
                <div id="failed">
                    New password do not match!
                 </div>
                 <a href="../../pages/admin/admin_change_password.php"><button type="submit" name="submit" class="submit">Return</button></a>
                ';
                }
            }
        } else {
            if ($currentPassFail2) {
            echo '
            <div id="failed">
                Current Password incorrect!
             </div>
             <a href="../../pages/admin/admin_change_password.php"><button type="submit" name="submit" class="submit">Return</button></a>
            ';
            }
        }

    //update news
    if($updateNewsSuccess) {
        echo '
        <div id="success">
             News updated successful!
         </div>
         <a href="../../pages/admin/admin_dashboard.php"><button type="submit" name="submit" class="submit">Return</button></a>
        ';
    } else {
        if($updateNewsFail) {
            echo '
            <div id="failed">
                An error has occured. Couldnt update news!
             </div>
             <a href="../../pages/admin/admin_dashboard.php"><button type="submit" name="submit" class="submit">Return</button></a>
            ';
        }
    }

    ?>
    
</body>
</html>