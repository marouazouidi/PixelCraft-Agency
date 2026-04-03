<?php


require_once __DIR__ . '/../../config/database.php';

class Db {
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass  = DB_PASS;

    private $conn;

    public function connect()
    {
        $this->conn = null;

        try{

            $this->conn = new PDO( "mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        }catch(PDOException $e){

                die("Connection Failed: " . $e->getMessage());
        }

        return $this->conn;
    }

}
?>