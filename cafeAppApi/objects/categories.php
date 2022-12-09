<?php
class Categories{
    private $conn;
    private $tableName = 'categories';
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

class FoodCategories{
    private $conn;
    private $tableName = 'foodCategories';
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