<?php

include 'koneksi.php';

$nim = $_GET['nim'] ?? '';

if($nim == ''){
    die("NIM tidak ditemukan");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Billing</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Tambah Data Billing</h2>

    <form action="proses_tambah_billing.php" method="POST">

        <input type="hidden" name="nim" value="<?= $nim; ?>">

        <div class="mb-3">
            <label>Tanggal</label>
            <input
                type="date"
                name="tanggal"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Jenis Pembayaran</label>

            <select
                name="jenis_pembayaran"
                class="form-control"
                required>

                <option value="">-- Pilih Jenis Pembayaran --</option>

                <option value="SPP Semester">
                    SPP Semester
                </option>

                <option value="Uang Gedung">
                    Uang Gedung
                </option>

                <option value="Praktikum">
                    Praktikum
                </option>

                <option value="UTS">
                    Ujian Tengah Semester (UTS)
                </option>

                <option value="UAS">
                    Ujian Akhir Semester (UAS)
                </option>

                <option value="KKN">
                    Kuliah Kerja Nyata (KKN)
                </option>

                <option value="Skripsi">
                    Skripsi / Tugas Akhir
                </option>

                <option value="Wisuda">
                    Wisuda
                </option>

            </select>
        </div>

        <div class="mb-3">
            <label>Nominal</label>
            <input
                type="number"
                name="nominal"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Status</label>

            <select
                name="status"
                class="form-control">

                <option value="Belum Lunas">
                    Belum Lunas
                </option>

                <option value="Lunas">
                    Lunas
                </option>

            </select>
        </div>

        <button
            type="submit"
            class="btn btn-success">
            Simpan
        </button>

        <a href="billing.php?nim=<?= $nim; ?>"
           class="btn btn-secondary">
           Kembali
        </a>

    </form>

</div>

</body>
</html>