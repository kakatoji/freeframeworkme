<?php
class Users_model
{
  private $table = "tbl_users";
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }
  public function getAllUsers()
  {
    $this->db->query("SELECT * FROM ".$this->table);
    return $this->db->resultSet();
  }
}
