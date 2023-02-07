<h1 class="h3 mb-0 text-gray-800">Form Edit Admin</h1>

<?php
    $id_admin = isset($_GET['id_admin']) ? $_GET['id_admin'] : false;
    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    if($notif == "require") {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data tidak boleh kosong!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }

	$sql = mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin = '$id_admin'");  
	$result = mysqli_fetch_array($sql); 
?>

<div class="card" style="width: 60%">
        <div class= card-body>
            <form method="POST" action="<?php echo BASE_URL."page/aksi_edit_admin.php?id_admin=$id_admin";?>">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="hidden" name="id_admin" class="form-control" value="<?php echo $result['id_admin']?>">
                <input type="text" name="nm_admin" class="form-control"  value="<?php echo $result['nm_admin']?>">
            </div>
            <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $result['username']?>">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $result['password']?>">
                </div>                              
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat_admin" class="form-control" value="<?php echo $result['alamat_admin']?>">
                </div>

                <div class="form-group">
                    <label>No.Hp</label>
                    <input type="text" name="tlp_admin"  class="form-control" value="<?php echo $result['tlp_admin']?>">
                </div>
                
                <button type="submit" class="btn btn-success mt-3 ">Update</button>
            </form>
        </div>
        
    </div>