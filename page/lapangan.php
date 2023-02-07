
<h1 class="h3 mb-0 text-gray-800">DATA LAPANGAN</h1>
<a class="btn btn-sm btn-success ml-1 mt-3 mb-3" href="index.php?page=adm_tambah_lapangan"><i class="fas fa-plus"></i> Tambah Data</a>

<?php  
	if(isset($_GET['action'])){
		if($_GET['action']=="hapus"){
			$id_lapangan = $_GET['id_lapangan'];  
			$sql = mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_lapangan = '$id_lapangan'");  
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
                        <th class="text-center">ID lapangan</th>
                        <th class="text-center">Nama Lapangan</th>
                        <th class="text-center">Jenis Lapangan </th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Foto Lapangan</th>

                        <th class="text-center">Action</th>
                    </tr>
                    <?php
	            $sql = mysqli_query($koneksi, "SELECT * FROM lapangan"); 
				$no=1;
				if($sql){
					while($result=mysqli_fetch_array($sql)){
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $result['id_lapangan']; ?></td>
							<td><?php echo $result['nm_lapangan']; ?></td>
							<td><?php echo $result['jenis_lapangan']; ?></td>
							<td>Rp. <?php echo number_format($result['harga']); ?></td>

                            <td><img src="foto_lapangan/<?php echo $result['foto_lapangan'] ?>" width="120" height="120" alt="Foto Lapangan tidak ada"></img></a> </td>
							<td>
								<a href="index.php?page=edit_lapangan&id_lapangan=<?php echo $result['id_lapangan']; ?>"
								 class="btn btn-sm btn-info mb-1"><i class="fas fa-edit"></i></a>
								<a href="index.php?page=lapangan&action=hapus&id_lapangan=<?php echo $result['id_lapangan']; ?>"
                                onclick="return confirm('Yakin Ingin Dihapus')" class="btn btn-sm btn-danger mb-1"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
						<?php  
						$no++;
					}
				}
				?>  
    </table>

