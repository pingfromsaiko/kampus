<?php

include 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

mysqli_query(
$conn,
"UPDATE mahasiswa SET

nama='$nama',
jurusan='$jurusan',
alamat='$alamat',
no_hp='$no_hp'

WHERE nim='$nim'"
);

header("location:index.php");

?>