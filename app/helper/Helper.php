<?php

class Helper
{
  public function cleanStr($name)
  {
    $name = trim($name);
    $name = preg_replace("/[^a-zA-Z\s]/", "", $name);
    $name = preg_replace("/\s+/", " ", $name);
    return $name;
  }
  public function capitalStr($name)
  {
    return ucwords(strtolower($name));
  }
}
