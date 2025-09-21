<?php
include '../db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM users WHERE id=$id");

header("Location: http://localhost/Projek%20Semester%203/backend/index.php?deleted=true&menu=table");

