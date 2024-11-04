<?php
// Inisialisasi sesi, panggil hanya sekali
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "config/config.php";
require_once "core/App.php";
require_once "core/Controller.php";
require_once "core/Database.php";
require_once "core/Flasher.php";


