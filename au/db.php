<?php
$host = "localhost";   // Host database
$user = "root";        // User default laragon/xampp
$pass = "";            // Password default kosong
$db   = "au";          // Nama database kamu

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
