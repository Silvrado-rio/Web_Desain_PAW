<?php

$filename = 'catatan.txt';
$isi_file = "Aku suka membaca Manhwa Omnicient Reader Viewpoint.\n";

if (file_put_contents($filename, $isi_file) !== false) {
    echo "File berhasil ditulis.";
} else {
    echo "Gagal menulis file.";
}

?>