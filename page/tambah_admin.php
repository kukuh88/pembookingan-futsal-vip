<h1 class="h3 mb-0 text-gray-800">Form Tambah Admin</h1>
<?php
	$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    if($notif == "require") {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data tidak boleh kosong!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
    $auto_kode = mysqli_query($koneksi, "select * from admin");
    $nomor = mysqli_num_rows($auto_kode) + 1;
    if($nomor >= 1 && $nomor <=9) $kode = "ADM-0$nomor";
    else if($nomor >= 10 && $nomor <=99) $kode = "ADM-$nomor";
    else $kode = "ADM-0$nomor";
?>

<div class="card" style="width: 60%">
        <div class= card-body>
            <form method="POST" action="<?php echo BASE_URL."page/aksi_tambah_admin.php";?>">
            <div class="form-group">
                    <label>ID Admin</label>
                    <input type="text" class="form-control" value="<?= $kode; ?>" disabled>
                    <input type="hidden" name="id_admin" value="<?= $kode; ?>"
                </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nm_admin" class="form-control">
            </div>
            <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>                              
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat_admin" class="form-control">
                </div>

                <div class="form-group">
                    <label>No.Hp</label>
                    <input type="text" name="tlp_admin"  class="form-control">
                </div>
                
                <button type="submit" class="btn btn-success mt-3 ">Simpan</button>
            </form>
        </div>
        
    </div>