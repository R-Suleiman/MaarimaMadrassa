<?php
require 'connect.php';

class News extends Database
{
    protected $tableName = "news";
    protected $contact = 'contact';
    protected $gallery = 'gallery';

    // function to add news
    public function add($data)
    {
        if (!empty($data)) {
            $fields = $placeholders = [];
            foreach ($data as $field => $value) {
                $fields[] = $field;
                $placeholders[] = ":{$field}";
            }
        }

        $sql = "INSERT INTO {$this->tableName} (" . implode(',', $fields) . ") VALUES (" . implode(',', $placeholders) . ")";

        $stmt = $this->conn->prepare($sql);

        try {
            $this->conn->beginTransaction();
            $stmt->execute($data);
            $lastInsertedId = $this->conn->lastInsertId();
            $this->conn->commit();
            return $lastInsertedId;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

        // function to send Contact
        public function sendContact($data)
        {
            if (!empty($data)) {
                $fields = $placeholders = [];
                foreach ($data as $field => $value) {
                    $fields[] = $field;
                    $placeholders[] = ":{$field}";
                }
            }
    
            $sql = "INSERT INTO {$this->contact} (" . implode(',', $fields) . ") VALUES (" . implode(',', $placeholders) . ")";
    
            $stmt = $this->conn->prepare($sql);
    
            try {
                $this->conn->beginTransaction();
                $stmt->execute($data);
                $lastInsertedId = $this->conn->lastInsertId();
                $this->conn->commit();
                return $lastInsertedId;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }


    // function to get rows
    public function getRows($start = 0, $limit = 5)
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY news_ID DESC LIMIT {$start}, {$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

    // function to get all contacts
    public function getContacts($start = 0, $limit = 5)
    {
        $sql = "SELECT * FROM {$this->contact} ORDER BY contactId DESC LIMIT {$start}, {$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

        // function to get specific news
        public function getSpecifNews($start, $limit, $category)
        {
            $sql = "SELECT * FROM {$this->tableName} WHERE category_ID = $category ORDER BY news_ID DESC LIMIT {$start}, {$limit}";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $results = [];
            }
            return $results;
        }

        // function to get all news of a specific category
        public function getCategoryNews($category)
        {
            $sql = "SELECT * FROM {$this->tableName} WHERE category_ID = $category ORDER BY news_date DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $results = [];
            }
            return $results;
        }

                // function to get single admin row
                public function getSingleAdmin($reg_no)
                {
                    $sql = "SELECT * FROM admin WHERE registration_NO = :reg_no";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute(['reg_no' => $reg_no]);
                    if ($stmt->rowCount() > 0) {
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    } else {
                        $result = [];
                    }
                    return $result;
                }

    // function to return trending news
    public function getTrendingNews($start, $limit)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE news_trend = 1 ORDER BY news_ID DESC LIMIT {$start}, {$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

    // function to get single news row
    public function getRow($value)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE news_ID = :field";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['field' => $value]);
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }

    // function to get category id
    public function getCategoryId($categoryName)
    {
        $sql = "SELECT * FROM news_category WHERE category_name = :categoryName";
        $stmt = $this->conn->prepare($sql);
        // $stmt->bindValue(":{$categoryName}", $categoryName);
        $stmt->execute(['categoryName' => $categoryName]);
       
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($results as $result) {
                return $result['category_ID'];
            }
        
    }

    //function to get category name
    public function getCategoryName($categoryId) {
        $sql = "SELECT * FROM news_category WHERE category_ID = :categoryId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['categoryId' => $categoryId]);
       
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($results as $result) {
                return $result['category_name'];
            }
    }

    // function to check if the post is trending or not
    public function isTrending()
    {
        return isset($_POST['trending']) ? 1 : 0;
    }

    // function to count number of rows
    public function getCount($categoryId)
    {
        $sql = "SELECT count(*) AS ncount FROM {$this->tableName} WHERE category_ID = :categoryId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['categoryId' => $categoryId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['ncount'];
    }

        // function to count number of contacts rows
        public function getContactsCount()
        {
            $sql = "SELECT count(*) AS ccount FROM {$this->contact}";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['ccount'];
        }

    // function to upload photos
    public function uploadPhoto($file)
    {
        if (!empty($file)) {
            $fileTempPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileType = $file['type'];
            $fileNameCmps = explode('.', $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $allowedExtensions = ["png", "jpg", "jpeg", "webp"];

            if (in_array($fileExtension, $allowedExtensions)) {
                $uploadFileDir = '../images/news/';
                $destFilePath = $uploadFileDir . $newFileName;
                if (move_uploaded_file($fileTempPath, $destFilePath)) {
                    return $newFileName;
                } else {
                    echo 'error uploading file <br>';
                }
            }
        }
    }

    // function to update news
    public function update($data, $id) {
        if (!empty($data)) {
            $fields = "";
            $x = 1;
            $fieldsCount = count($data);
            $params = [];
            foreach ($data as $field => $value) {
                $fields .= "{$field} = :{$field}";
                if ($x < $fieldsCount) {
                    $fields .= ",";
                }
                $params[":{$field}"] = $value;
                $x++;
            }
        }
        $sql = "UPDATE {$this->tableName} SET {$fields} WHERE news_ID = :id";
        $params[":id"] = $id;
    
        $stmt = $this->conn->prepare($sql);
    
        try {
            $this->conn->beginTransaction();
            $stmt->execute($params);
            $this->conn->commit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

                // function to update admin profile
                public function updateAdminProfile($data, $id) {
                    if (!empty($data)) {
                        $fields = "";
                        $x = 1;
                        $fieldsCount = count($data);
                        $params = [];
                        foreach ($data as $field => $value) {
                            $fields .= "{$field} = :{$field}";
                            if ($x < $fieldsCount) {
                                $fields .= ",";
                            }
                            $params[":{$field}"] = $value;
                            $x++;
                        }
                    }
                    $sql = "UPDATE admin SET {$fields} WHERE registration_NO = :id";
                    $params[":id"] = $id;
                
                    $stmt = $this->conn->prepare($sql);
                
                    try {
                        $this->conn->beginTransaction();
                        $stmt->execute($params);
                        $this->conn->commit();
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }

    // function to delete news

    public function delete($id) {
        $sql = "DELETE FROM {$this->tableName} WHERE news_ID = :id";

        $stmt = $this->conn->prepare($sql);
    
        try {
            $this->conn->beginTransaction();
            $stmt->execute(["id" => $id]);
            $this->conn->commit();
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

        // function to delete user

        public function deleteContact($id) {
            $sql = "DELETE FROM {$this->contact} WHERE contactId = :id";
    
            $stmt = $this->conn->prepare($sql);
        
            try {
                $this->conn->beginTransaction();
                $stmt->execute(["id" => $id]);
                $this->conn->commit();
                
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    
        }       

        // add to gallery
                // function to send Contact
                public function addToGallery($data)
                {
                    if (!empty($data)) {
                        $fields = $placeholders = [];
                        foreach ($data as $field => $value) {
                            $fields[] = $field;
                            $placeholders[] = ":{$field}";
                        }
                    }
            
                    $sql = "INSERT INTO {$this->gallery} (" . implode(',', $fields) . ") VALUES (" . implode(',', $placeholders) . ")";
            
                    $stmt = $this->conn->prepare($sql);
            
                    try {
                        $this->conn->beginTransaction();
                        $stmt->execute($data);
                        $lastInsertedId = $this->conn->lastInsertId();
                        $this->conn->commit();
                        return $lastInsertedId;
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }

        // function to upload gallery pics
    public function uploadGalleryPic($file)
    {
        if (!empty($file)) {
            $fileTempPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileType = $file['type'];
            $fileNameCmps = explode('.', $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $allowedExtensions = ["png", "jpg", "jpeg", "webp"];

            if (in_array($fileExtension, $allowedExtensions)) {
                $uploadFileDir = '../images/gallery/';
                $destFilePath = $uploadFileDir . $newFileName;
                if (move_uploaded_file($fileTempPath, $destFilePath)) {
                    return $newFileName;
                } else {
                    echo 'error uploading file <br>';
                }
            }
        }
    }

    // update to the gallery
        // function to update news
        public function updateGallery($data, $id) {
            if (!empty($data)) {
                $fields = "";
                $x = 1;
                $fieldsCount = count($data);
                $params = [];
                foreach ($data as $field => $value) {
                    $fields .= "{$field} = :{$field}";
                    if ($x < $fieldsCount) {
                        $fields .= ",";
                    }
                    $params[":{$field}"] = $value;
                    $x++;
                }
            }
            $sql = "UPDATE {$this->gallery} SET {$fields} WHERE image_ID = :id";
            $params[":id"] = $id;
        
            $stmt = $this->conn->prepare($sql);
        
            try {
                $this->conn->beginTransaction();
                $stmt->execute($params);
                $this->conn->commit();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        // delete from gallery
        public function deleteGallery($id) {
            $sql = "DELETE FROM {$this->gallery} WHERE image_ID = :id";
    
            $stmt = $this->conn->prepare($sql);
        
            try {
                $this->conn->beginTransaction();
                $stmt->execute(["id" => $id]);
                $this->conn->commit();
                
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    
        }  

            // function to get all gallery
    public function getGallery($start = 0, $limit = 16)
    {
        $sql = "SELECT * FROM {$this->gallery} ORDER BY image_ID DESC LIMIT {$start}, {$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

                // function to get all gallery
    public function getAllGallery()
    {
        $sql = "SELECT * FROM {$this->gallery} ORDER BY image_ID DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }

            // function to count number of gallery rows
            public function getGalleryCount()
            {
                $sql = "SELECT count(*) AS gcount FROM {$this->gallery}";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['gcount'];
            }

    // function for search
}
?>
