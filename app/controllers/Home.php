<?php

class Home extends Controller
{
  public function index()
  {
    $data = [
      "title" => "my blog",
      "nama" => "kakatoji"
    ];
    $this->view("template/pages/p_header", $data);
    $this->view("template/pages/p_navbar");
    $this->view("pages/index",$data);
    $this->view("template/pages/p_footer");
  }
}
