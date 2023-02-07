<h1 class="h3 mb-0 text-gray-800">Form Tambah Data Lapangan</h1>
<?php
$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
if ($notif == "require") {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data tidak boleh kosong!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
}
$auto_kode = mysqli_query($koneksi, "select * from lapangan");
$nomor = mysqli_num_rows($auto_kode) + 1;
if ($nomor >= 1 && $nomor <= 9) $kode = "LPG-000$nomor";
else if ($nomor >= 10 && $nomor <= 99) $kode = "LPG-00$nomor";
else if ($nomor >= 100 && $nomor <= 999) $kode = "LPG-0$nomor";
else $kode = "LPG-0$nomor";
?>

<div class="card" style="width: 60%">
    <div class=card-body>
        <form method="POST" action="<?php echo BASE_URL . "page/aksi_tambah_lapangan.php"; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>ID Lapangan</label>
                <input type="text" class="form-control" value="<?= $kode; ?>" disabled>
                <input type="hidden" name="id_lapangan" value="<?= $kode; ?>" </div>

                <div class="form-group">
                    <label>Nama Lapangan</label>
                    <input type="text" name="nm_lapangan" class="form-control">
                </div>

                <div class="form-group">
                    <label>Jenis Lapangan</label>
                    <input type="text" name="jenis_lapangan" class="form-control">
                </div>

                <div class="form-group">
                    <label>harga</label>
                    <input type="text" name="harga" class="form-control">
                </div>

                <div class="form-group">
                    <label>Foto Lapangan</label>
                    <input type="file" name="foto_lapangan" class="form-control">
                </div>

                <button type="submit" class="btn btn-success mt-3 ">Simpan</button>
        </form>
    </div>

</div>