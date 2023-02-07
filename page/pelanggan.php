
<h1 class="h3 mb-0 text-gray-800">DATA PELANGGAN</h1>
<a class="btn btn-sm btn-success ml-1 mt-3 mb-3" href="index.php?page=adm_tambah_pelanggan"><i class="fas fa-plus"></i> Tambah Data</a>

<?php  
	if(isset($_GET['action'])){
		if($_GET['action']=="hapus"){
			$id_pelanggan = $_GET['id_pelanggan'];  
			$sql = mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");  
			if($sql){  
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data berhasil di hapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
			}else{  
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Data Gagal di Hapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';					 
			}  
		}
	}  
?>  

<?php
	$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    if($notif == "success") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di Tambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
?>

<?php
	$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : false;
    if($pesan == "success") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di Ubahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
?>

<table class="table table-bordered table-striped mt-2">
                    <tr>
                    	<th><i class=""></i>NO</th>
                        <th class="text-center">ID Pelanggan</th>
                        <th class="text-center">Nama lengkap</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No HP</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php
	            $sql = mysqli_query($koneksi, "SELECT * FROM pelanggan"); 
				$no=1;
				if($sql){
					while($result=mysqli_fetch_array($sql)){
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $result['id_pelanggan']; ?></td>
							<td><?php echo $result['nm_lengkap']; ?></td>
							<td><?php echo $result['alamat']; ?></td>
							<td><?php echo $result['no_hp']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $result['jenis_kelamin']; ?></td>
							<td>
								<a href="index.php?page=edit_pelanggan&id_pelanggan=<?php echo $result['id_pelanggan']; ?>"
								 class="btn btn-sm btn-info mb-1"><i class="fas fa-edit"></i></a>
								<a href="index.php?page=pelanggan&action=hapus&id_pelanggan=<?php echo $result['id_pelanggan']; ?>"
                                onclick="return confirm('Yakin Ingin Dihapus')" class="btn btn-sm btn-danger mb-1"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
						<?php  
						$no++;
					}
				}
				?>  
    </table>

