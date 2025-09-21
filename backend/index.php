<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: http://localhost/Projek%20Semester%203/au/index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Campus Connect</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <?php include ("header.php"); ?>
    <?php include ("sidebar.php"); ?>
    <main id="main" class="main">
      <?php
      if (!isset($_GET['menu']) || $_GET['menu'] == 'dashboard') {
          include("main.php");
      } elseif ($_GET['menu'] == 'profile') {
          include("content/profile.php");
      } elseif ($_GET['menu'] == 'table') {
          include("content/table.php");   
      } elseif ($_GET['menu'] == 'edit') {
          include("content/edit.php");  
      } elseif ($_GET['menu'] == 'logout') {
          include("content/logout.php");
      } else {
          include("content/484.php");
      }
      ?>
  </main>
    <?php include ("footer.php"); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleSwitch = document.getElementById('flexSwitchCheckDefault');
    const body = document.body;
    const themeText = document.getElementById('theme-text'); // Pastikan baris ini ada
    
    const applyTheme = (theme) => {
      if (theme === 'dark') {
        body.classList.add('dark-mode');
        toggleSwitch.checked = true;
        themeText.textContent = 'Light Mode'; // Pastikan baris ini ada
      } else {
        body.classList.remove('dark-mode');
        toggleSwitch.checked = false;
        themeText.textContent = 'Dark Mode'; // Pastikan baris ini ada
      }
    };

    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
      applyTheme(savedTheme);
    } else {
      const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      if (prefersDark) {
        applyTheme('dark');
      } else {
        applyTheme('light');
      }
    }

    toggleSwitch.addEventListener('change', () => {
      if (toggleSwitch.checked) {
        applyTheme('dark');
        localStorage.setItem('theme', 'dark');
      } else {
        applyTheme('light');
        localStorage.setItem('theme', 'light');
      }
    });
  });
</script>

</html>
