<?php
class CafeDb{
    private $host = "127.0.0.1";
    private $db_name = "u185060096_mnmapp";
    private $username = "u185060096_userroot";
    private $password = ":Gz8YXiE37";

    public $conn;
  
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
