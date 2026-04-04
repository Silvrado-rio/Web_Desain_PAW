<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];

    $data_simpan = "Nama: $nama | NIM: $nim | Email: $email\n";

    $file = 'data_mahasiswa.txt';

    $handle = fopen($file, "a");

    if ($handle) {
        fwrite($handle, $data_simpan);
        
        fclose($handle);
        
        echo "<h3>Berhasil!</h3>";
        echo "Data berhasil disimpan ke dalam file <b>$file</b>.<br><br>";
        echo "<a href='form.html'>Kembali isi form lagi</a>";
    } else {
        echo "Gagal membuka atau membuat file.";
    }

} else {
    echo "Harap isi form terlebih dahulu!";
}
?>