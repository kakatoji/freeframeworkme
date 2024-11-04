<?php

class About extends Controller
{
  public function index($nama = "Aang", $job = "lfing")
  {
    $data = [
      "title" => "ABOUT ME",
      "nama" => "Aang Saputra",
      "umur" => 34,
    ];
    $this->view("template/header", $data);
    $this->view("template/navbar");
    $this->view("about/index", $data);
    $this->view("template/footer");
  }
  public function page()
  {
    $data =[
      'title' => "Page me"
      ];
    $this->view("template/header",$data);
    $this->view("template/navbar");
    $this->view("about/page");
    $this->view("template/footer");
  }
}
