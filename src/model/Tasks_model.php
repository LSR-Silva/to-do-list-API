<?php
namespace model;

require_once __DIR__ . '/vendor/autoload.php';

use \PDO;

class Tasks_model {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
          
        $query = "INSERT INTO tasks 
                SET name = :NAME, description = :DESCRIPTION, price = :PRICE, active = :ACTIVE";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":NAME", $data['name']);
        $stmt->bindParam(":DESCRIPTION", $data['description']);
        $stmt->bindParam(":PRICE", $data['price']);
        $stmt->bindParam(":ACTIVE", $data['active']);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function list() {
        $query = "SELECT id, name, price
                  FROM tasks  
                  WHERE active = 'T'
                  ORDER BY price ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update($data) {
        
        $query = "UPDATE tasks 
                SET name = :NAME, description = :DESCRIPTION, price = :PRICE, active = :ACTIVE
                WHERE id = :ID";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":ID", $data['id']);
        $stmt->bindParam(":NAME", $data['name']);
        $stmt->bindParam(":DESCRIPTION", $data['description']);
        $stmt->bindParam(":PRICE", $data['price']);
        $stmt->bindParam(":ACTIVE", $data['active']);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($id) {
        $query = "DELETE FROM tasks 
                WHERE id = :ID";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":ID", $id);
        

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>