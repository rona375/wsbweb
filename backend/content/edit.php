<?php
include '../db.php';

if (!isset($_POST['id'])) {
    die("ID tidak ditemukan!");
}

$id       = (int)$_POST['id'];
$username = trim($_POST['username']);
$name     = trim($_POST['name']);
$nim      = trim($_POST['nim']);
$jurusan  = trim($_POST['jurusan']);
$prodi    = trim($_POST['prodi']);
$password = $_POST['password'] ?? '';

// kalau password diisi → hash baru, kalau kosong tetap pakai lama
if (!empty($password)) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users 
               SET username=?, password=?, name=?, nim=?, jurusan=?, prodi=?
             WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $username, $password, $name, $nim, $jurusan, $prodi, $id);
} else {
    $sql = "UPDATE users 
               SET username=?, name=?, nim=?, jurusan=?, prodi=?
             WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $username, $name, $nim, $jurusan, $prodi, $id);
}

if ($stmt->execute()) {
    // setelah update redirect balik ke index.php bagian tabel
    header("Location: http://localhost/Projek%20Semester%203/backend/index.php?updated=true&menu=table");
    exit;
} else {
    echo "Gagal update data: " . $stmt->error;
}
?>
