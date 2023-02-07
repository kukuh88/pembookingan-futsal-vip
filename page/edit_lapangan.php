<h1 class="h3 mb-0 text-gray-800">Form Edit Admin</h1>


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
    $id_lapangan= isset($_GET['id_lapangan']) ? $_GET['id_lapangan'] : false;
    $sql = mysqli_query($koneksi,"SELECT * FROM lapangan WHERE id_lapangan = '$id_lapangan'");  
	$result = mysqli_fetch_array($sql); 
?>
<div class="card" style="width: 60%">
        <div class= card-body>
            <form method="POST" action="<?php echo BASE_URL."page/aksi_edit_lapangan.php?id_lapangan=$id_lapangan";?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Lapangan</label>
                <input type="hidden" name="id_lapangan" class="form-control" value="<?php echo $result['id_lapangan']?>">
                <input type="text" name="nm_lapangan" class="form-control"  value="<?php echo $result['nm_lapangan']?>">
            </div>
            <div class="form-group">
                    <label>Jenis lapangan</label>
                    <input type="text" name="jenis_lapangan" class="form-control" value="<?php echo $result['jenis_lapangan']?>">
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control" value="<?php echo $result['harga']?>">
                </div>                              
                <div class="form-group">
                    <label>Foto Lapangan</label>
                    <input type="file" name="foto_lapangan" class="form-control">
                </div>   
                <button type="submit" class="btn btn-success mt-3 ">Update</button>
            </form>
        </div>
        
    </div>