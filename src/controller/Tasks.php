<?php
namespace controller;

require_once __DIR__ . '/vendor/autoload.php';

use model\Tasks_model;
use config\Database;

class Tasks {

  private $tasks_model;
  private $db;

  public function __construct() {
    $this->db = new Database();
    $this->tasks_model = new Tasks_model($this->db);
  }

  public function create($data) {
    
  }

  public function list() {
      
  }

  public function edit($id) {
      
  }
  
  public function update($data) {

  }

  public function delete($id) {
      
  }
}
?>