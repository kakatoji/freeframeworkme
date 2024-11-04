<?php

class Member extends Controller
{
  public function index()
  {
    $data = [
      "title" => "Member",
      "mbr" => $this->model("Admin_model")->getAllMember(),
    ];
    $this->view("template/header", $data);
    $this->view("template/navbar");
    $this->view("member/index", $data);
    $this->view("template/footer");
  }
  public function detail($id)
  {
    $data = [
      "title" => "DETAIL Member",
      "mbr" => $this->model("Member_model")->getMemberById($id),
    ];
    $this->view("template/header", $data);
    $this->view("template/navbar");
    $this->view("member/detail", $data);
    $this->view("template/footer");
  }
  public function tambah()
  {
    if ($this->model("Member_model")->tambahMember($_POST) > 0) {
      Flasher::setFlash("berhasil", "ditambahkan", "success");
      header("Location: " . BASEURL . "/member");
      exit();
    } else {
      Flasher::setFlash("gagal", "ditambahkan", "danger");
      header("Location: " . BASEURL . "/member");
      exit();
    }
  }

  public function hapus($id)
  {
    if ($this->model("Member_model")->hapusMember($id) > 0) {
      Flasher::setFlash("berhasil", "dihapus", "success");
      header("Location: " . BASEURL . "/member");
      exit();
    } else {
      Flasher::setFlash("gagal", "dihapus", "danger");
      header("Location: " . BASEURL . "/member");
      exit();
    }
  }
  public function getubah()
  {
    header("Content-Type: application/json");
    $id = $_POST["id"];
    $data = $this->model("Member_model") . getMemberById($id);
    if ($data) {
      echo json_encode($data);
    } else {
      echo json_encode(["error" => "Data tidak ditemukan"]);
    }
  }
  public function ubah()
  {
    if ($this->model("Member_model")->ubahMember($_POST) > 0) {
      Flasher::setFlash("berhasil", "diubah", "success");
      header("Location: " . BASEURL . "/member");
      exit();
    } else {
      Flasher::setFlash("gagal", "diubah", "danger");
      header("Location: " . BASEURL . "/member");
      exit();
    }
  }
  public function cari()
  {
    $data = [
      "title" => "Member",
      "mbr" => $this->model("Member_model")->cariAllMember(),
    ];

    $this->view("template/header", $data);
    $this->view("template/navbar");
    $this->view("member/index", $data);
    $this->view("template/footer");
  }
}
