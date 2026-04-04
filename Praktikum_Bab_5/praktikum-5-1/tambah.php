<?php

$filename = 'catatan.txt';
$isi_file = "Dan aku suka baca Manhwa Return of Mount Hua Sect.\n";

if ($file = fopen($filename, "a")) {
    fwrite($file, $isi_file);
    fclose($file);
    echo "Text berhasil ditulis.";
} else {
    echo "Gagal menulis file.";
}

?>