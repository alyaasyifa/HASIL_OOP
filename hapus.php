<?php 
include 'koneksi.php';

$hapus = mysqli_query($server, "DELETE FROM kalkulator_nilai WHERE nis='$_GET[nis]'");
 if($hapus){
    echo "berhasil";
    echo "<br>";
    echo "<a href='tampil.php'>Kembali</a>";
 }
?>
