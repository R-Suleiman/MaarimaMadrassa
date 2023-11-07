<?php

class Database
{
    private $dbserver = "localhost";
    private $dbuser = "root";
    private $dbpassword = "";
    private $dbname = "MaarimaMadrassa";
    protected $conn;

    // constructor
    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->dbserver};dbname={$this->dbname};charset=utf8";
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false);
            $this->conn = new PDO($dsn, $this->dbuser, $this->dbpassword, $options);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }
}
?>
