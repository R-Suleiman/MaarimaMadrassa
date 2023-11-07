<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$success = 0;
$invalid = 0;
session_start();


require 'connect.php';
class Login extends Database {
    protected $adminTable = 'admin';

    public function getAdminDetails() {
          $sql = "SELECT * FROM {$this->adminTable}";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          if ($stmt->rowCount() > 0) {
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }  else {
            $results = [];
        }
        return $results;
        }
      
}

// admin login
$obj = new Login;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['admin-login'])) {
        $usernameOrEmail = $_POST['usernameEmail'];
        $password = $_POST['password'];

        $adminData = $obj->getAdminDetails();
        foreach($adminData as $data) {
            $adminEmail = $data['email'];
            $adminUsername = $data['admin_name'];
            $adminPassword = $data['password'];
        }
       
        if(($adminPassword === $password) && (($adminEmail === $usernameOrEmail) || ($adminUsername === $usernameOrEmail))) {
            $success = 1;
                $_SESSION['admin'] = $usernameOrEmail;
                header('location: ../../pages/admin/admin_dashboard.php');
        } else {
            $invalid = 1;
        }

    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

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
    </style>
</head>
<body>
 
    <?php  

    if(!$unregistered) {
    if($success) {
        echo '
       <div id="success">
            Login sucessfull!
        </div>
       ';
    } else {
        if($invalid) {
            echo '
            <div id="failed">
                 Invalid credentials!
             </div>
            ';
         } 
         
    }
} else {
    echo '
    <div id="failed">
         user not registered!
     </div>
    ';
}
    
    ?>

    
</body>
</html>