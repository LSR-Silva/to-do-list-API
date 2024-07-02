<?php
namespace App\Config;

require_once __DIR__ . '\..\..\vendor\autoload.php';

use \PDO;
use \PDOException;

class Database 
{
    private static $host = "localhost";
    private static $db_name = "to_do_list";
    private static $username = "root";
    private static $password = "";
    public static $conn;

    public static function getConnection() 
    {
        self::$conn = null;
        try {
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
            self::$conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return self::$conn;
    }
}

?>