<?php
namespace App\Controllers;

require_once __DIR__ . '\..\..\vendor\autoload.php';

use App\Models\Tasks_model;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TasksController 
{

  private $tasks_model;

  public function __construct() 
  {
    $this->tasks_model = new Tasks_model();
  }

  public function create(Request $request, Response $response, array $args) 
  {
    $data = $request->getParsedBody();

    if (!isset($data['description'])) {
      $response->getBody()->write(json_encode(["error" => "Nome e email são obrigatórios"]));
      return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
    }

    $response->getBody()->write(json_encode($this->tasks_model->create($data)));
    // $response->getBody()->write(json_encode($this->tasks_model->create($data)));

    return $response->withHeader('Content-Type', 'application/json');
  }

  public function list(Request $request, Response $response) 
  {
    $data = $this->tasks_model->list();
    $response->getBody()->write(json_encode($data));

    return $response->withHeader('Content-Type', 'application/json');
  }

  public function edit($id) 
  {
      
  }
  
  public function update($data) 
  {

  }

  public function delete($id) {
      
  }
}
?>