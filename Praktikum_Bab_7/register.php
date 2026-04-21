<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name = $_POST['full_name'];

    $stmt = $pdo->prepare("INSERT INTO users (username, password, full_name) VALUES (:username, :password, :full_name)");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $pass);
    $stmt->bindParam(':full_name', $name);
    
    if ($stmt->execute()) {
        header("Location: index.php?status=registered");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-body bg-register">
    <div class="container" style="max-width: 450px;">
        <div class="card p-4 p-md-5">
            <h3 class="text-center mb-4 fw-bold text-primary">Registrasi</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Daftar Sekarang</button>
            </form>
            <div class="text-center mt-4">
                <span class="text-muted">Sudah punya akun?</span> <a href="index.php" class="text-decoration-none fw-bold">Login di sini</a>
            </div>
        </div>
    </div>
</body>
</html>