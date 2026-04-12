<?php
require_once 'auth_guard.php';

if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'member') {
    $_SESSION['access_error'] = "Akses Ditolak! Publik tidak boleh masuk ke Ruangan B.";
    header('location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman B - Member Zootopia & Madagascar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<video autoplay muted loop class="video-bg" id="bgVideo">
    <source src="../assets/Zootopia2.mp4" type="video/mp4">
</video>
<div class="overlay"></div>

<div class="content-wrapper">
    <div class="glass-box">
        <h2>Halaman B - Member Zootopia</h2>
        <button class="btn-sound" onclick="toggleSound()" id="soundBtn">🔇 Nyalakan Suara</button>
        <p>Hanya Admin dan Member yang bisa masuk ke sini. Nikmati lagu dari Madagascar 3!</p>
        <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</div>

<script src="../js/script.js"></script>

</body>
</html>