<?php
require 'config/Database.php';

Class Model{
    private $dbconn;

    public function __construct(){
        $database = new Database;
        $this->dbconn = $database->dbconn;
    }

    public function write($content){
        $stmt = $this->dbconn->prepare("INSERT INTO message (content) VALUES (?)");
        $stmt->bind_param("s", $content);
        $stmt->execute();
        $stmt->close();
    }

    public function read(){
        $sql = "SELECT * FROM message";
        return $this->dbconn->query($sql);
    }
}
?>
