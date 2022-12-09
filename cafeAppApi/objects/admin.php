<?php
class Admin{
    private $conn;
    private $tableName = 'admin';
    private $foodHelpTable = 'foodHelp';
    private $miscHelp = 'miscHelp';
    private $placesHelp = 'placesHelp';
    private $servicesHelp = 'servicesHelp';
    
    public $id;
    public $userName;
    public $email;
    public $password;
    public $terms;
    public $privacyPolicy;
    
    public function __construct($db)
    {
        $this->conn = $db;
    }


    // ==============================MANAGING Admin OPERATIONS====================================
    function read()
    {
        $query = "SELECT * FROM " . $this->tableName;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
      function readFoodQuestons()
    {
        $query = "SELECT * FROM " . $this->foodHelpTable;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }function readMiscQuestions()
    {
        $query = "SELECT * FROM " . $this->miscHelp;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }function readPlacesQuestions()
    {
        $query = "SELECT * FROM " . $this->placesHelp;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }function readServicesQuestions()
    {
        $query = "SELECT * FROM " . $this->servicesHelp;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}