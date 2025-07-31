<?php
require_once __DIR__ . '/config/config.php';

if (isset($_SESSION['username'])) {
    header('Location: views/dashboard.php');
    exit;
}

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = get_users();
    if (empty($users)) {
        $pesan = "<p class='salah'>⚠️ Tidak bisa ambil data dari Google Sheets!</p>";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login_berhasil = false;

        foreach ($users as $user) {
            // Pastikan password dibandingkan sebagai string
            if ($user['username'] === $username && (string)$user['password'] === $password) {
                $login_berhasil = true;
                $_SESSION['username'] = $username;
                break;
            }
        }

        if ($login_berhasil) {
            // Catat login ke Google Sheets
            log_login($username);

            $pesan = "<p class='benar'>✅ Login Anda Benar!</p>";
            header("refresh:1;url=views/dashboard.php");
        } else {
            $pesan = "<p class='salah'>❌ Login Anda Salah, silakan ulangi.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .benar { color: green; font-weight: bold; }
    .salah { color: red; font-weight: bold; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <?= $pesan ?>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
