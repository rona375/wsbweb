<?php
include "db.php"; // pakai koneksi dari db.php

if (isset($_POST['register'])) {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name     = $_POST['name'];
    $nim      = $_POST['nim'];
    $jurusan  = $_POST['jurusan'];
    $prodi    = $_POST['prodi'];

    // Query untuk simpan data ke tabel users
    $query = "INSERT INTO users (username, password, name, nim, jurusan, prodi)
              VALUES ('$username', '$password', '$name', '$nim', '$jurusan', '$prodi')";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="register-page">
    <h2>Sign Up</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Create a username" required><br>
        <input type="password" name="password" placeholder="Create a password" required><br>
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="text" name="nim" placeholder="NIM" required><br>
        <input type="text" name="jurusan" placeholder="Jurusan/Major" required><br>
        <input type="text" name="prodi" placeholder="Study Program" required><br>
        <button type="submit" name="register">SIGN UP</button>
    </form>
    <p>Already have an account? <a href="index.php">Log in</a></p>
</div>
    <!-- background karakter -->
  <img src="img au/heya top.png" class="registrasi-bg-top" alt="Heya top">
  <img src="img au/heya bottom.png" class="registrasi-bg-bottom" alt="Heya bottom">

  <!-- Dekorasi bintang -->
        <img src="img au/Star 1.png" class="star index-star-right-top-big">
        <img src="img au/Star 2.png" class="star index-star-left-bottom-big">
        <img src="img au/Star 3.png" class="star index-star-left-bottom-small">
        <img src="img au/Star 4.png" class="star index-star-right-top-small">
</body>
</html>
