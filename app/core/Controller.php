<?php

class Controller
{
  public function view($view, $data = [])
  {
    require_once "../app/views/" . $view . ".php";
  }
  public function model($model)
  {
    require_once "../app/models/" . $model . ".php";
    return new $model();
  }
  public function clean($clean)
  {
    require_once "../app/helper/" . $clean . ".php";
    return new $clean();
  }
  public function upload($up)
  {
    require_once "../app/upload/".$up.".php";
    return new $up;
  }
}
