<?php
include 'koneksi.php';

$keyword = $_GET['keyword'] ?? '';

$sql = "
SELECT
    m.*,
    COALESCE(SUM(b.nominal),0) AS total_tagihan
FROM mahasiswa m
LEFT JOIN billing b
ON m.nim = b.nim
";

if($keyword != ''){
    $sql .= " WHERE m.nama LIKE '%$keyword%'";
}

$sql .= " GROUP BY m.nim";

$data = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
<title>Data Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>Data Mahasiswa</h2>

<div class="d-flex justify-content-between align-items-center mb-3">

    <a href="tambah.php" class="btn btn-primary">
        Tambah Data
    </a>

    <form method="GET" class="d-flex">
        <input
            type="text"
            name="keyword"
            value="<?= $keyword; ?>"
            placeholder="Cari nama mahasiswa"
            class="form-control me-2"
            style="width:300px;">

        <button type="submit" class="btn btn-success">
            Cari
        </button>
    </form>

</div>

<table class="table table-bordered">

<tr>
<th>NIM</th>
<th>Nama</th>
<th>Jurusan</th>
<th>Alamat</th>
<th>No HP</th>
<th>Total Tagihan</th>
<th>Aksi</th>
</tr>

<?php while($mhs = mysqli_fetch_array($data)) { ?>

<tr>

<td><?= $mhs['nim']; ?></td>
<td><?= $mhs['nama']; ?></td>
<td><?= $mhs['jurusan']; ?></td>
<td><?= $mhs['alamat']; ?></td>
<td><?= $mhs['no_hp']; ?></td>
<td>Rp <?= number_format($mhs['total_tagihan'],0,',','.'); ?></td>

<td>

<a href="edit.php?nim=<?= $mhs['nim']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?nim=<?= $mhs['nim']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">
Hapus
</a>

<a href="billing.php?nim=<?= $mhs['nim']; ?>"
class="btn btn-info btn-sm">
Billing
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
