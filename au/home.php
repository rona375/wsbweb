<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: http://localhost/Projek%20Semester%203/backend/index.php");
    exit();
}
?>