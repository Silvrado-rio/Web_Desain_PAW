<?php

$filename = 'data.txt';

if (file_exists($filename)) {
    $isi_file = fopen($filename, 'r');
    if ($isi_file) {
        while (($line = fgets($isi_file)) !== false) {
            echo $line;
        }
        fclose($isi_file);
    } else {
        echo "Gagal membuka file.";
    }
} else {
    echo "File tidak ditemukan.";
}

?>