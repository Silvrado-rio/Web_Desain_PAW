<?php
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $name = $_POST['full_name'];
    $username = $_POST['username'];
    
    $stmt = $pdo->prepare("UPDATE users SET full_name = :full_name, username = :username WHERE id = :id");
    $stmt->bindParam(':full_name', $name);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php?status=updated");
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    session_destroy();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dashboard">
    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-5 py-3 custom-navbar">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">Sistem Kelola User</a>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-outline-danger px-4">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card p-4 p-md-5">
                    <h4 class="mb-4 fw-bold">Pengaturan Profil</h4>
                    
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
                        <div class="alert alert-success py-2">Profil berhasil diperbarui!</div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($user['full_name']) ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
                        </div>
                        
                        <hr class="my-4">
                        
                        <div class="d-flex flex-column flex-sm-row justify-content-between gap-3">
                            <button type="submit" name="update" class="btn btn-success px-4 py-2 fw-bold">Simpan Perubahan</button>
                            <button type="submit" name="delete" class="btn btn-danger px-4 py-2 fw-bold" onclick="return confirm('Apakah kamu yakin ingin menghapus akun ini secara permanen?')">Hapus Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>