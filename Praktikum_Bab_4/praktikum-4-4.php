<?php

$index_array = ["Teknik Informatika", "Teknik Komputer", "Ilmu Komputer",
                "Sistem Informasi", "Teknologi Informasi", "Pendidikan Teknologi Informasi"];

foreach ($index_array as $index) {
    echo $index . "\n";
}

$associative_array = [
    "TIF" => "Teknik Informatika",
    "TK" => "Teknik Komputer",
    "IK" => "Ilmu Komputer",
    "SI" => "Sistem Informasi",
    "TI" => "Teknologi Informasi",
    "PTI" => "Pendidikan Teknologi Informasi"
];

foreach ($associative_array as $key => $value) {
    echo $key . " => " . $value . "\n";
}

?>