<?php

include 'koneksi.php';

$nim = $_POST['nim'];
$tanggal = $_POST['tanggal'];
$jenis = $_POST['jenis_pembayaran'];
$nominal = $_POST['nominal'];
$status = $_POST['status'];

mysqli_query(
    $conn,
    "INSERT INTO billing
    (nim,tanggal,jenis_pembayaran,nominal,status)
    VALUES
    (
        '$nim',
        '$tanggal',
        '$jenis',
        '$nominal',
        '$status'
    )"
);

header("Location: billing.php?nim=$nim");

?>