<?php
require_once 'auth_guard.php';

$accessError = '';
if (isset($_SESSION['access_error'])) {
    $accessError = $_SESSION['access_error'];
    unset($_SESSION['access_error']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<video autoplay muted loop class="video-bg" id="bgVideo">
    <source src="../assets/Rio - Layalaya.mp4" type="video/mp4">
</video>
<div class="overlay"></div>

<div class="content-wrapper">
    <div class="glass-box" style="width: 400px;">
        <h2>Selamat Datang,<br><?= $_SESSION['name']; ?>!</h2>
        <p>Anda login sebagai: <strong><?= strtoupper($_SESSION['role']); ?></strong></p>

        <button class="btn-sound" onclick="toggleSound()" id="soundBtn">🔇 Nyalakan Suara</button>

        <h3>Pilih Ruangan:</h3>
        
        <div class="menu-group">
            <a href="halaman_a.php" class="btn btn-primary">Ruangan A (Khusus Admin)</a>
            <a href="halaman_b.php" class="btn btn-success">Ruangan B (Admin & Member)</a>
            <a href="halaman_c.php" class="btn btn-secondary">Ruangan C (Publik)</a>
            <a href="logout.php" class="btn btn-danger" style="margin-top: 10px;">Logout</a>
        </div>
    </div>
</div>

<?php if ($accessError != ''): ?>
<div class="salah-overlay" id="accessSalah">
    <div class="salah-content">
        <h3>Akses Ditolak! 🛑</h3>
        <p><?= $accessError; ?></p>
        <button class="btn btn-danger" onclick="document.getElementById('accessSalah').style.display='none'">Mengerti</button>
    </div>
</div>
<?php endif; ?>

<script src="../js/script.js"></script>

</body>
</html>