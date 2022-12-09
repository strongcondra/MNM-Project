<?php
class Notifications
{
    public $notification;
    public $user_mobile;
    private $tableName = 'notifications';
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function create()
    {
        $query = "INSERT INTO " . $this->tableName . " SET notification = :notification, user_mobile = :user_mobile";
        $stmt = $this->conn->prepare($query);

        $this->notification = htmlspecialchars(strip_tags($this->notification));
        $this->user_mobile = htmlspecialchars(strip_tags($this->user_mobile));

        $stmt->bindParam(':notification', $this->notification);
        $stmt->bindParam(':user_mobile', $this->user_mobile);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function readNotifications()
    {
        $query = "SELECT * FROM " . $this->tableName . " WHERE user_mobile = :user_mobile ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_mobile', $this->user_mobile);
        $stmt->execute();
        return $stmt;
    }

}
