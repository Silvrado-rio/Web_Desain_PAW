<?php

$filename = 'data.txt';

if (file_exists($filename)) {
    $isi_file = file_get_contents($filename);
    echo $isi_file;
} else {
    echo "File tidak ditemukan.";
}

?>