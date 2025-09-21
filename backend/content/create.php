<?php
include '../db.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name     = $_POST['name'];
    $nim      = $_POST['nim'];
    $jurusan  = $_POST['jurusan'];
    $prodi    = $_POST['prodi'];

    $sql = "INSERT INTO users (username, password, name, nim, jurusan, prodi) 
            VALUES ('$username','$password','$name','$nim','$jurusan','$prodi')";
    mysqli_query($conn, $sql);

    // redirect balik ke tabel
    header("Location: ../index.php?menu=table&created=true");
    exit;
}
