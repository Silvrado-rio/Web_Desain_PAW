<?php
require_once 'auth_guard.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman C - Public Lion King</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<video autoplay muted loop class="video-bg" id="bgVideo">
    <source src="../assets/The Lion King.mp4" type="video/mp4">
</video>
<div class="overlay"></div>

<div class="content-wrapper">
    <div class="glass-box">
        <h2>Halaman C - Public Lion King</h2>
        <button class="btn-sound" onclick="toggleSound()" id="soundBtn">🔇 Nyalakan Suara</button>
        <p>Semua orang bisa masuk. Silahkan menikmati lagu dari The Lion King!</p>
        <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</div>

<script src="../js/script.js"></script>

</body>
</html>