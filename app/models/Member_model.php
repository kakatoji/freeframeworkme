<?php

class Member_model
{
  private $table = "tbl_member";
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAllMember()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultSet();
  }

  public function getMemberById($id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
    $this->db->bind(":id", $id); // Bind parameter :id
    return $this->db->single();
  }

  public function tambahMember($data)
  {
    $query =
      "INSERT INTO tbl_member (nama, nik, email, skil) VALUES (:nama, :nik, :email, :skil)";
    $this->db->query($query);

    // Bind all parameters
    $this->db->bind(":nama", $data["nama"] ?? null);
    $this->db->bind(":nik", $data["nik"] ?? null);
    $this->db->bind(":email", $data["email"] ?? null);
    $this->db->bind(":skil", $data["skil"] ?? null);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function hapusMember($id)
  {
    $query = "DELETE FROM tbl_member WHERE id = :id";
    $this->db->query($query);
    $this->db->bind(":id", $id); // Bind parameter :id
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function ubahMember($data)
  {
    $query = "UPDATE tbl_member SET
              nama = :nama,
              nik = :nik,
              email = :email,
              skil  = :skil
              WHERE id = :id";
    $this->db->query($query);

    // Bind all parameters
    $this->db->bind(":nama", $data["nama"] ?? null);
    $this->db->bind(":nik", $data["nik"] ?? null);
    $this->db->bind(":email", $data["email"] ?? null);
    $this->db->bind(":skil", $data["skil"] ?? null);
    $this->db->bind(":id", $data["id"] ?? null);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function cariAllMember()
  {
    // Mengambil keyword dari POST dengan validasi
    $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : "";

    // Perbaiki typo "FORM" menjadi "FROM" dan sesuaikan parameter
    $query = "SELECT * FROM tbl_member WHERE nama LIKE :nama";
    $this->db->query($query);

    // Bind parameter dengan wildcard untuk LIKE
    $this->db->bind(":nama", "%$keyword%");

    return $this->db->resultSet();
  }
  
}
