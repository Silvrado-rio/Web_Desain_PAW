<?php
require_once 'auth_guard.php';

if ($_SESSION['role'] !== 'admin') {
    $_SESSION['access_error'] = "Akses Ditolak! Ruangan A ini khusus untuk Admin.";
    header('location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman A - Admin Rio</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<video autoplay muted loop class="video-bg" id="bgVideo">
    <source src="../assets/zootopia.mp4" type="video/mp4">
</video>
<div class="overlay"></div>

<div class="content-wrapper">
    <div class="glass-box">
        <h1>Ruangan A - Admin Rio</h1>
        <button class="btn-sound" onclick="toggleSound()" id="soundBtn">🔇 Nyalakan Suara</button>
        <p>Hanya Admin yang bisa masuk ke sini. Nikmati lagu dari Zootopia!</p>
        <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</div>

<script src="../js/script.js"></script>

</body>
</html>