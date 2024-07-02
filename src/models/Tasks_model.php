<?php
namespace App\Models;

require_once __DIR__ . '\..\..\vendor\autoload.php';

use App\Config\Database;
use \PDO;

class Tasks_model 
{
    private static $conn;

    public function __construct()
    {
        self::$conn = Database::getConnection();
    }

    public static function create($data) 
    {
        $query = "INSERT INTO tasks 
                SET description = :DESCRIPTION";

        $stmt = self::$conn->prepare($query);

        $stmt->bindParam(":DESCRIPTION", $data['description']);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public static function list() 
    {
        $query = "SELECT id, description, completed
                  FROM tasks";

        $stmt = self::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function update_task_description($data) 
    {
        $query = "UPDATE tasks 
                SET description = :DESCRIPTION
                WHERE id = :ID";

        $stmt = self::$conn->prepare($query);

        $stmt->bindParam(":ID", $data['id']);
        $stmt->bindParam(":DESCRIPTION", $data['description']);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public static function update_task_progress($data) 
    {
        $query = "UPDATE tasks 
                SET completed = :COMPLETED
                WHERE id = :ID";

        $stmt = self::$conn->prepare($query);

        $stmt->bindParam(":COMPLETED", $data['completed']);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public static function delete($id) 
    {
        $query = "DELETE FROM tasks 
                WHERE id = :ID";

        $stmt = self::$conn->prepare($query);
        $stmt->bindParam(":ID", $id);
        

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>