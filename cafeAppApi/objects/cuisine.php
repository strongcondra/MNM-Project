<?php
class Cuisine{
    private $conn;
    private $tableName = 'cuisine';
    public function __construct($db)
    {
        $this->conn = $db;
    }
    //gets all cafes
    function read()
    {
        $query = "SELECT * FROM " . $this->tableName;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    

}
