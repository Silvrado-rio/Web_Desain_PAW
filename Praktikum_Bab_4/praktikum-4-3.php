<?php

class Mahasiswa {
    public $nama;
    public $nim;
    public $prodi;

    public function __construct($nama, $nim, $prodi) {
        $this->nama = $nama;
        $this->nim = $nim;
    }

    public function kuliah() {
        return "Halo, nama saya " . $this->nama . " dengan NIM " . $this->nim . " dan prodi " . $this->prodi;
    }

    public function ujian() {
        return "Saya " . $this->nama . " sedang mengikuti ujian.";
    }

    public function praktikum() {
        return "Saya " . $this->nama . " sedang melakukan praktikum.";
    }
}

$mahasiswa1 = new Mahasiswa("Andi", "123456", "Informatika");
echo $mahasiswa1->kuliah() . "\n";
echo $mahasiswa1->ujian() . "\n";
echo $mahasiswa1->praktikum() . "\n";

$mahasiswa2 = new Mahasiswa("Budi", "654321", "Sistem Informasi");
echo $mahasiswa2->kuliah() . "\n";
echo $mahasiswa2->ujian() . "\n";
echo $mahasiswa2->praktikum() . "\n";

?>