<?php

function penjumlahan($a, $b) {
    return $a + $b;
}

function panjang_text($text) {
    return strlen($text);
}

echo penjumlahan("6","7") . "\n";
echo penjumlahan("67","67") . "\n";

echo panjang_text("praktikum") . "\n";
echo panjang_text("pemrograman web") . "\n";

?>