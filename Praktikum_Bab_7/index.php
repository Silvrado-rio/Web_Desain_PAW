<?php
require 'config.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $user);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($pass, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-body bg-login">
    <div class="container" style="max-width: 400px;">
        <div class="card p-4 p-md-5">
            <h3 class="text-center mb-4 fw-bold text-primary">Selamat Datang</h3>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-danger py-2"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if (isset($_GET['status']) && $_GET['status'] == 'registered'): ?>
                <div class="alert alert-success py-2">Registrasi berhasil! Silakan login.</div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Masuk</button>
            </form>
            <div class="text-center mt-4">
                <span class="text-muted">Belum punya akun?</span> <a href="register.php" class="text-decoration-none fw-bold">Daftar sekarang</a>
            </div>
        </div>
    </div>
</body>
</html>