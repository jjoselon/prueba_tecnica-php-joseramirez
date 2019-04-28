<?php
namespace Core;

class EntityBase {

    private $db;

    public function __construct() {
        require_once 'Connection.php';
        $this->connection = new Connection;
        $this->db = $this->connection->connect();
    }

    public function db(){
        return $this->db;
    }
}
?>
