<h1 class="h3 mb-0 text-gray-800">Form Tambah Data Pelanggan</h1>
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
?>

<div class="card" style="width: 60%">
        <div class= card-body>
            <form method="POST" action="<?php echo BASE_URL."page/aksi_tambah_pelanggan.php";?>">
                <div class="form-group">
                    <label>ID Pelanggan</label>
                    <input type="text" name="id_pelanggan" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nm_lengkap" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                </div>

                <div class="form-group">
                    <label>No.Hp</label>
                    <input type="text" name="no_hp"  class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email"  class="form-control">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option>--Pilih Jenis Kelamin--</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select> 
                </div>
                
                <button type="submit" class="btn btn-success mt-3 ">Simpan</button>
            </form>
        </div>
        
    </div>