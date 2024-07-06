<?php

include './config.php';
include 'select.php';
include 'update.php';
include 'insert.php';
include 'delete.php';

class dbConnection
{
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $conn;

    public function __construct($host, $user, $pass, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;

    
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database Not Connected: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>
