<?php 
namespace Example\Controllers;
use m4\m4mvc\core\Controller;
use m4\m4mvc\helper\Request;
use m4\m4mvc\helper\Redirect;
use m4\m4mvc\helper\Response;

class Todos extends Controller
{
  public function __construct ()
  {
    $this->model = $this->getModel('Todo');
  }

  public function index ()
  {
    $this->data = $this->model->list() ?? [];
  }

  public function add ()
  {
    Request::forceMethod('post');

    $this->model->create($_POST['title']);

    Redirect::to('/');
  }

  public function toggle ()
  {
    Request::forceMethod('post');

    $result = $this->model->toggle($_POST['id']);

    $result ? Response::success('done') : Response::error('fail');
  }

  public function delete ($id)
  {
    $this->model->delete($id);
    Redirect::to('/');
  }
}