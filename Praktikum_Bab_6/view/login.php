<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('location: dashboard.php');
    exit;
}

$error = '';
$inputEmail = '';
$inputPassword = '';

if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    $inputEmail = $_SESSION['old_email'];
    $inputPassword = $_SESSION['old_password'];

    unset($_SESSION['login_error']);
    unset($_SESSION['old_email']);
    unset($_SESSION['old_password']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = [
        ['email' => 'admin@mail.com', 'password' => 'admin123', 'role' => 'admin', 'name' => 'Admin Rio'],
        ['email' => 'member@mail.com', 'password' => 'member123', 'role' => 'member', 'name' => 'Member Zootopia'],
        ['email' => 'publik@mail.com', 'password' => 'publik123', 'role' => 'publik', 'name' => 'Public Lion King']
    ];

    $login_success = false;
    foreach ($users as $user) {
        if ($email === $user['email'] && $password === $user['password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['name'];
            $login_success = true;
            
            echo "<script>localStorage.removeItem('videoTime'); window.location.href='dashboard.php';</script>";
            exit;
        }
    }

    if (!$login_success) {
        $_SESSION['login_error'] = "Email atau password yang Anda masukkan salah!";
        $_SESSION['old_email'] = htmlspecialchars($email);
        $_SESSION['old_password'] = htmlspecialchars($password);
        
        header('location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<video autoplay muted loop class="video-bg" id="bgVideo">
    <source src="../assets/Cars.mp4" type="video/mp4">
</video>
<div class="overlay"></div>

<div class="content-wrapper">
    <div class="glass-box">
        <h2>Login Fans</h2>
        
        <button class="btn-sound" onclick="toggleSound()" id="soundBtn">🔇 Nyalakan Suara</button>

        <form method="post" action="" id="loginForm">
            <input type="email" name="email" placeholder="Masukkan Email" required value="<?= $inputEmail ?>">
            <input type="password" name="password" placeholder="Masukkan Password" required value="<?= $inputPassword ?>">
            <input type="submit" value="Login" class="btn btn-primary">
        </form>
    </div>
</div>

<?php if ($error != ''): ?>
<div class="salah-overlay" id="errorSalah">
    <div class="salah-content">
        <h3>Login Gagal!</h3>
        <p><?= $error; ?></p>
        <button class="btn btn-danger" onclick="document.getElementById('errorSalah').style.display='none'">Tutup</button>
    </div>
</div>
<?php endif; ?>

<script src="../js/script.js"></script>

</body>
</html>