<?php

include 'koneksi.php';

$nim = $_GET['nim'] ?? '';

if($nim == ''){
    die("NIM tidak ditemukan");
}

// Ambil data mahasiswa
$mahasiswa = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT * FROM mahasiswa
         WHERE nim='$nim'"
    )
);

if(!$mahasiswa){
    die("Data mahasiswa tidak ditemukan");
}

// Ambil data billing
$billing = mysqli_query(
    $conn,
    "SELECT * FROM billing
     WHERE nim='$nim'"
);

// Hitung total tagihan
$total = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COALESCE(SUM(nominal),0) AS total_tagihan
         FROM billing
         WHERE nim='$nim'"
    )
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Billing Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Billing Mahasiswa</h2>

    <a href="index.php" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <div class="card mb-3">
        <div class="card-body">

            <p><strong>NIM :</strong> <?= $mahasiswa['nim']; ?></p>
            <p><strong>Nama :</strong> <?= $mahasiswa['nama']; ?></p>
            <p><strong>Jurusan :</strong> <?= $mahasiswa['jurusan']; ?></p>

        </div>
    </div>
    <div class="mb-3">

    <a href="index.php" class="btn btn-secondary">
        Kembali
    </a>

    <a href="tambah_billing.php?nim=<?= $nim; ?>"
       class="btn btn-success">
       Tambah Billing
    </a>

</div>

<div class="alert alert-primary">

    <strong>NIM :</strong>
    <?= $mahasiswa['nim']; ?>

    <br>

    <strong>Nama :</strong>
    <?= $mahasiswa['nama']; ?>

    <br>

    <strong>Jurusan :</strong>
    <?= $mahasiswa['jurusan']; ?>

</div>

    <table class="table table-bordered">

        <tr>
            <th>ID Billing</th>
            <th>Tanggal</th>
            <th>Jenis Pembayaran</th>
            <th>Nominal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($billing)) { ?>

        <tr>
            <td><?= $row['id_billing']; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['jenis_pembayaran']; ?></td>
            <td>
                Rp <?= number_format($row['nominal'],0,',','.'); ?>
            </td>
            <td>

<?php if($row['status'] == 'Lunas'){ ?>

    <span class="badge bg-success">
        Lunas
    </span>

<?php } else { ?>

    <span class="badge bg-danger">
        Belum Lunas
    </span>

<?php } ?>

</td>
<td>

<a href="hapus_billing.php?id=<?= $row['id_billing']; ?>&nim=<?= $nim; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Hapus billing ini?')">
   Hapus
</a>

</td>
        </tr>

        <?php } ?>

    </table>

    <div class="alert alert-info">
        <strong>Total Tagihan :</strong>
        Rp <?= number_format($total['total_tagihan'],0,',','.'); ?>
    </div>

</div>

</body>
</html>