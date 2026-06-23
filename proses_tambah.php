<?php

include 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

mysqli_query(
    $conn,
    "INSERT INTO mahasiswa
    VALUES(
    '$nim',
    '$nama',
    '$jurusan',
    '$alamat',
    '$no_hp'
    )"
);

header("location:index.php");

?>