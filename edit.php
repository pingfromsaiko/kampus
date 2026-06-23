<?php

include 'koneksi.php';

$nim = $_GET['nim'];

$data = mysqli_query(
$conn,
"SELECT * FROM mahasiswa
WHERE nim='$nim'"
);

$mhs = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Edit Mahasiswa</h2>

<form action="proses_edit.php"
method="POST">

<input type="hidden"
name="nim"
value="<?= $mhs['nim']; ?>">

<div class="mb-3">

<label>Nama</label>

<input
type="text"
name="nama"
value="<?= $mhs['nama']; ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Jurusan</label>

<input
type="text"
name="jurusan"
value="<?= $mhs['jurusan']; ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Alamat</label>

<textarea
name="alamat"
class="form-control"><?= $mhs['alamat']; ?></textarea>

</div>

<div class="mb-3">

<label>No HP</label>

<input
type="text"
name="no_hp"
value="<?= $mhs['no_hp']; ?>"
class="form-control">

</div>

<button class="btn btn-warning">
Update
</button>

</form>

</div>

</body>
</html>