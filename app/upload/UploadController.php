<?php

// controllers/UploadController.php
class UploadController
{
  public function store()
  {
    // Periksa apakah file diunggah
    if (
      isset($_FILES["photo"]) &&
      $_FILES["photo"]["error"] === UPLOAD_ERR_OK
    ) {
      $fileTmpPath = $_FILES["photo"]["tmp_name"];
      $fileName = $_FILES["photo"]["name"];
      $fileSize = $_FILES["photo"]["size"];
      $fileType = $_FILES["photo"]["type"];
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));

      // Daftar ekstensi file yang diperbolehkan
      $allowedfileExtensions = ["jpg", "jpeg", "png"];
      $maxFileSize = 3 * 1024 * 1024; // 3MB dalam byte

      // Cek tipe file dan ukuran
      if (
        in_array($fileExtension, $allowedfileExtensions) &&
        $fileSize <= $maxFileSize
      ) {
        // Generate nama unik untuk file
        $newFileName = md5(time() . $fileName) . "." . $fileExtension;

        // Tentukan folder penyimpanan
        $uploadFileDir = BASEURL."/uploads/";
        $dest_path = $uploadFileDir . $newFileName;

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
          echo "File berhasil diunggah!";
        } else {
          echo "Terjadi kesalahan saat mengunggah file.";
        }
      } else {
        // Tampilkan pesan kesalahan jika ukuran atau tipe file tidak sesuai
        if ($fileSize > $maxFileSize) {
          echo "Ukuran file terlalu besar. Maksimal 3 MB.";
        } else {
          echo "Tipe file tidak diizinkan. Unggah file gambar (JPG, JPEG, PNG).";
        }
      }
    } else {
      echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
    }
  }
}
