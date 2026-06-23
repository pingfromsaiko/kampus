<!DOCTYPE html>
<html>
<head>

<title>Tambah Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Tambah Mahasiswa</h2>

<form action="proses_tambah.php"
method="POST">

<div class="mb-3">
<label>NIM</label>
<input type="text"
name="nim"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Nama</label>
<input type="text"
name="nama"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Jurusan</label>
<input type="text"
name="jurusan"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea
name="alamat"
class="form-control"></textarea>
</div>

<div class="mb-3">
<label>No HP</label>
<input type="text"
name="no_hp"
class="form-control">
</div>

<button type="submit"
class="btn btn-success">
Simpan
</button>

</form>

</div>

</body>
</html>