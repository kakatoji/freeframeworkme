<?php

class UsersLogin_model
{
  private $table = "tbl_users";
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }
  public function getUserByEmail($data)
  {
    $email = $data;
    $this->db->query(
      "SELECT * FROM " .
        $this->table .
        " WHERE email = :email
    LIMIT 1"
    );
    $this->db->bind(":email", $email);
    $this->db->execute();
    return $this->db->single();
  }
  public function registerUser($nama, $email, $password,$level)
  {
    $this->db->query(
      "INSERT INTO " .
        $this->table .
        " (nama,email,password,users) VALUES
    (:nama,:email,:password,:users)"
    );
    $this->db->bind(":nama", $nama);
    $this->db->bind(":email", $email);
    $this->db->bind(":password", $password);
    $this->db->bind(":users", $level);
    return $this->db->execute();
  }
}
