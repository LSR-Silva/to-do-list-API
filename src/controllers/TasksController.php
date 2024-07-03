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

  public function create(Request $request, Response $response, array $args): Response
  {
    $data = $request->getParsedBody();

    $response->getBody()->write(json_encode($this->tasks_model->create($data)));

    return $response->withHeader('Content-Type', 'application/json');
  }

  public function list(Request $request, Response $response): Response
  {
    $data = $this->tasks_model->list();
    $response->getBody()->write(json_encode($data));

    return $response->withHeader('Content-Type', 'application/json');
  }
  
  public function update_task_progress(Request $request, Response $response, array $args): Response 
  {
    $data = $request->getParsedBody();

    $response->getBody()->write(json_encode($this->tasks_model->update_task_progress($data)));

    return $response->withHeader('Content-Type', 'application/json');
  }

  public function delete($id)
  {
      
  }
}
?>