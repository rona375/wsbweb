<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 0) {
        $error_message = "❌ Username tidak ditemukan!";
    } else {
        $row = $result->fetch_assoc();
        if ($row['password'] !== $password) {
            $error_message = "⚠️ Password salah!";
        } else {
            // simpan semua kolom ke session
            $_SESSION['username'] = $row['username'];
            $_SESSION['name']     = $row['name'];
            $_SESSION['nim']      = $row['nim'];
            $_SESSION['jurusan']  = $row['jurusan'];
            $_SESSION['prodi']    = $row['prodi'];

            header("Location: http://localhost/Projek%20Semester%203/backend/index.php");
            exit();
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-page">
      <h2>Login</h2>
      <form action="index.php" method="POST">
          <input type="text" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password" required>

          <div class="forgot">
            <a href="forgot_password.php">Forgot your password?</a>
          </div>
          <button type="submit" name="login">LOGIN</button> 
      </form>
        <div class="signup">
      <p>Don't have an account? <a href="register.php">Sign up</a></p>
  </div>

  <!-- background karakter -->
  <img src="img au/dude top.png" class="bg-top" alt="Dude top">
  <img src="img au/dude bottom.png" class="bg-bottom" alt="Dude bottom">

  <!-- Dekorasi bintang -->
        <img src="img au/Star 1.png" class="star index-star-right-top-big">
        <img src="img au/Star 2.png" class="star index-star-left-bottom-big">
        <img src="img au/Star 3.png" class="star index-star-left-bottom-small">
        <img src="img au/Star 4.png" class="star index-star-right-top-small">
</body>
</html>

<?php if (!empty($error_message)): ?> 
<div class="popup"> 
    <p><?php echo $error_message; ?></p>
    <button onclick="this.parentElement.style.display='none';">OK</button> 
</div>
<?php endif; ?>
