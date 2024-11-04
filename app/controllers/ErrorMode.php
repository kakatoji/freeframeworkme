<?php

class ErrorMode extends Controller
{
  public function index()
  {
    $this->view("template/admin/a_headers");
    $this->view("papdulu/index");
    $this->view("template/admin/a_footer");
  }
}
