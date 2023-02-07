<h1 class="h3 mb-0 text-gray-800">Form Tambah Denda</h1>
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

    $auto_kode = mysqli_query($koneksi, "select * from denda");
    $nomor = mysqli_num_rows($auto_kode) + 1;
    if($nomor >= 1 && $nomor <=9) $kode = "DD-000$nomor";
    else if($nomor >= 10 && $nomor <=99) $kode = "DD-00$nomor";
    else if($nomor >= 100 && $nomor <= 999) $kode = "DD-0$nomor";
    else $kode = "DD-0$nomor";
?>

<div class="card" style="width: 60%">
        <div class= card-body>
            <form method="POST" action="<?php echo BASE_URL."page/aksi_tambah_denda.php";?>">
             <div class="form-group">
                <label>ID Denda</label>
                <input type="text" name="id_denda" value="<?php echo $kode ?>" readonly="" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis Denda</label>                       
                <select name="jenis_denda" class="form-control">
                    <option value="Kerusakan">Kerusakan</option>
                    <option value="Telat">Telat</option>
                </select>
            </div>
            <div class="form-group">
                    <label>Tanggal Denda</label>
                    <input type="date" name="tgl_denda" class="form-control">
                </div>
            <div class="form-group">
                    <label>Nominal</label>
                    <input type="text" name="nominal" class="form-control">
                </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>   
            <div class="form-group">
                <label>ID Pembayaran</label>                           
                <select name="id_pembayaran" class="form-control">
                    <?php $data_pembayaran = mysqli_query($koneksi,"select * from pembayaran a 
                        left join booking b on a.id_booking = b.id_booking
                        left join pelanggan c on b.id_pelanggan = c.id_pelanggan");
                        if($data_pembayaran){
                            while($result = mysqli_fetch_array($data_pembayaran)){
                                ?><option value="<?php echo $result['id_pembayaran'] ?>"><?php echo $result['id_pembayaran'] ." - ". $result['nm_lengkap'] ?></option><?php
                            }
                        }
                    ?>
            </select>
            </div>
                <button type="submit" class="btn btn-success mt-3 ">Simpan</button>
            </form>
        </div>
        
    </div>

  