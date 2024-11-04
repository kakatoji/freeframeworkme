<?php

class Admin extends Controller
{
  /**
   * Menampilkan halaman login admin.
   */
  public function index()
  {
    $data = [
      "title" => "Admin Login",
    ];
    $this->view("template/header", $data);
    $this->view("admin/index");
    $this->view("template/footer");
  }

  /**
   * Proses login admin.
   */
  public function login()
  {
    $userModel = $this->model("User_model");
    $user = $userModel->cekUser();

    if ($user) {
      // Jika pengguna ditemukan, simpan data pengguna dalam session
      $_SESSION["user"] = $user; // Simpan data pengguna dalam session
      Flasher::setFlash("berhasil", "Berhasil Login", "success");
      header("Location: " . BASEURL . "/admin/dashboard");
    } else {
      Flasher::setFlash("cek username or password,", "Login gagal", "danger");
      header("Location: " . BASEURL . "/admin");
    }
    exit();
  }
  public function dashboard()
  {
    if (empty($_SESSION["user"])) {
      header("Location: " . BASEURL . "/admin");
      exit();
    }
    if ($_SESSION["user"]["level"] !== "admin") {
      header("Location: " . BASEURL . "/users");
      exit();
    }
    $data = [
      "title" => "Halaman Admin",
      "data" => [
        "user" => $_SESSION["user"]["username"],
        "level" => $_SESSION["user"]["level"],
      ],
    ];
    $this->view("template/admin/a_headers", $data);
    $this->view("template/admin/a_sidebar", $data);
    $this->view("admin/dashboard", $data);
    $this->view("template/admin/a_footer", $data);
  }
}
