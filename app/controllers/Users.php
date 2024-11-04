<?php

class Users extends Controller
{
  public function _construct()
  {
    if (empty($_COOKIE["user_name"])) {
      header("Location: " . BASEURL . "/users/login");
    }
  }
  public function index()
  {
    if (!empty($_COOKIE["user_name"])) {
      $this->dashboard();
      exit();
    } else {
      header("Location: " . BASEURL . "/");
      exit();
    }
  }
  public function register()
  {
    $this->view("template/admin/a_headers");
    $this->view("users/register");
    $this->view("template/admin/a_footer");
  }
  public function users_register()
  {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      header("Location: " . BASEURL . "/users/Error");
      exit();
    }

    $nama = $_POST["nama1"] . " " . $_POST["nama2"];
    $email = $_POST["email"];
    $level = $_POST["users"];
    $encPwd = password_hash($_POST["password1"], PASSWORD_BCRYPT);
    if ($_POST["password1"] !== $_POST["password2"]) {
      Flasher::setFlash("password", "harus sama", "danger");
      $this->view("template/admin/a_headers");
      $this->view("users/register");
      $this->view("template/admin/a_footer");
      exit();
    }
    if (!preg_match("(@gmail.com|@hotmail.com)", $_POST["email"])) {
      Flasher::setFlash("kesalahan? ", "harus menggunakan gmail", "danger");
      $this->view("template/admin/a_headers");
      $this->view("users/register");
      $this->view("template/admin/a_footer");
      exit();
    }
    if ($this->model("UsersLogin_model")->getUserByEmail($_POST["email"])) {
      Flasher::setFlash("Email exits..", "!!", "danger");
      $this->view("template/admin/a_headers");
      $this->view("users/register");
      $this->view("template/admin/a_footer");
      exit();
    }
    if (strlen($_POST["password1"]) < 5) {
      Flasher::setFlash(
        "panjang password harus lebih dari
      " .
          strlen($_POST["password1"]) .
          " digit",
        "!!",
        "danger"
      );
      $this->view("template/admin/a_headers");
      $this->view("users/register");
      $this->view("template/admin/a_footer");
      exit();
    }
    $cleanNama = $this->clean("Helper")->cleanStr($nama);
    $cek = $this->model("UsersLogin_model")->registerUser(
      $cleanNama,
      $email,
      $encPwd,
      $level
    );

    $this->view("template/admin/a_headers");
    $this->view("users/login");
    $this->view("template/admin/a_footer");
  }
  public function login()
  {
    if (!empty($_COOKIE["user_name"])) {
      $this->dashboard();
      exit();
    }
    $this->view("template/admin/a_headers");
    $this->view("users/login");
    $this->view("template/admin/a_footer");
  }
  public function login_prosess()
  {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      $this->Error();
      exit();
    }
    if (!isset($_POST["checkbox"])) {
      Flasher::setFlash("Please click Remember me..", "!!", "danger");
      $this->login();
      exit();
    }
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $level = $_POST["users"];
    $user = $this->model("UsersLogin_model")->getUserByEmail($email);
    if ($user && password_verify($pass, $user["password"])) {
      //simpan session
      $_SESSION["user_id"] = $user["id"];
      $_SESSION["user_email"] = $user["email"];
      $_SESSION["user_level"] = $user["users"];
      $_SESSION["user_name"] = $user["nama"];
      //simpan cookie jika cekbok di pilih
      if (isset($_POST["checkbox"])) {
        setcookie("user_id", $user["id"], time() + 86400 * 30, "/");
        setcookie("user_email", $user["email"], time() + 86400 * 30, "/");
        setcookie("user_level", $user["users"], time() + 86400 * 30, "/");
        setcookie("user_name", $user["nama"], time() + 86400 * 30, "/");
        header("Location: " . BASEURL . "/users/dashboard");
        exit();
      } else {
        Flasher::setFlash("Data masih ada yg salah", "!!..", "danger");
        $this->login();
        exit();
      }
    }
  }
  public function dashboard()
  {
    if (empty($_COOKIE["user_name"])) {
      header("Location: " . BASEURL . "/users/login");
    }
    $data = [
      "title" => "HALAMAN " . $_COOKIE["user_level"],
      "data" => $_COOKIE,
      "user" => [
        "data" => $this->model("Users_model")->getAllUsers(),
      ],
    ];
    if ($_COOKIE["user_level"] !== "admin") {
      $this->userdash($data);
    }
  }
  public function userdash($data)
  {
    $this->view("template/admin/a_headers", $data);
    $this->view("template/users/u_sidebar");
    $this->view("users/dashboard", $data);
    $this->view("template/admin/a_footer");
  }
  public function logout()
  {
    // Hapus session
    session_unset();
    session_destroy();

    // Hapus cookie
    setcookie("user_id", "", time() - 3600, "/");
    setcookie("user_email", "", time() - 3600, "/");
    setcookie("user_level", "", time() - 3600, "/");
    setcookie("user_name", "", time() - 3600, "/");

    header("Location: " . BASEURL . "/users/login");
    exit();
  }
  public function Error()
  {
    $this->view("template/admin/a_headers");
    $this->view("papdulu/index");
    $this->view("template/admin/a_footer");
  }
  public function userprofile()
  {
    $data = [
      "title" => "Profile seting",
    ];
    $this->view("template/admin/a_headers", $data);
    $this->view("template/users/u_sidebar");
    $this->view("users/userprofile", $data);
    $this->view("template/admin/a_footer");
  }
}
