<?php

class Admin_model
{
    private $table = "tbl_admin";
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Pastikan ini menginisialisasi koneksi database dengan benar
    }

    public function cekUser()
    {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        // Persiapkan query
        $this->db->query(
            "SELECT * FROM " . $this->table . " WHERE username = :username AND password = :password"
        );

        // Mengikat parameter
        $this->db->bind(':username', $user);
        $this->db->bind(':password', $pass);

        // Eksekusi query dan ambil hasil
        $result = $this->db->single();

        // Periksa apakah ada hasil
        if ($result) {
            // Pengguna ditemukan, lakukan sesuatu dengan data pengguna
            return $result;
        } else {
            // Pengguna tidak ditemukan
            return $result;
        }
    }
}