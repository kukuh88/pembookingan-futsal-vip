<h1 class="h3 mb-0 text-gray-800">Form Edit Pelanggan</h1>

<?php
    $id_pelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : false;
    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    if($notif == "require") {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data tidak boleh kosong!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }

  	$sql = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");  
	$result = mysqli_fetch_array($sql); 
?>

<div class="card" style="width: 60%">
        <div class= card-body>
            <form method="POST" action="<?php echo BASE_URL."page/aksi_edit_pelanggan.php?id_pelanggan=$id_pelanggan";?>">
            <div class="form-group">
                    <label>ID Pelanggan</label>
                    <input type="hidden" name="id_Pelanggan" class="form-control" value="<?php echo $result['id_pelanggan']?>">
                    <input type="text" name="id_pelanggan" class="form-control" value="<?php echo $result['id_pelanggan'] ?>">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $result['password']?>">
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nm_lengkap" class="form-control" value="<?php echo $result['nm_lengkap']?>">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $result['alamat']?>">
                </div>

                <div class="form-group">
                    <label>No.Hp</label>
                    <input type="text" name="no_hp"  class="form-control" value="<?php echo $result['no_hp']?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email"  class="form-control " value="<?php echo $result['email']?>">
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" >
                        <option value="<?php echo $result['jenis_kelamin']?>"><?php echo $result['jenis_kelamin']?></option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select> 
                </div>
                
                <button type="submit" class="btn btn-success mt-3 ">Update</button>
            </form>
        </div>
        
    </div>