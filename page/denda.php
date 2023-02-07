
<h1 class="h3 mb-0 text-gray-800">DATA DENDA</h1>
<a class="btn btn-sm btn-success ml-1 mt-3 mb-3" href="index.php?page=tambah_denda"><i class="fas fa-plus"></i> Tambah Data</a>
<?php  
		if(isset($_GET['action'])){
			if($_GET['action']=="hapus"){
				$id_denda = $_GET['id_denda'];  
				$sql = mysqli_query($koneksi,"DELETE FROM denda WHERE id_admin = '$id_denda'");  
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
                <strong>Data berhasil di Ubahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
	}
?>
<?php
$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : false;
if($pesan == "add"){
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil di Tambahkan!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
}
?>
<table class="table table-bordered table-striped mt-2">
                    <tr>
                    	<th><i class=""></i>NO</th>
                        <th class="text-center">ID Denda</th>
						<th class="text-center">ID Pembayaran</th>
                        <th class="text-center">Tanggal Denda</th>
                        <th class="text-center">Jenis Denda</th>
                        <th class="text-center">Nominal</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                    <?php
	            $sql = mysqli_query($koneksi, "SELECT * FROM denda "); 
				$no=1;
				if($sql){
					while($result=mysqli_fetch_array($sql)){
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $result['id_denda']; ?></td>
							<td><?php echo $result['id_pembayaran']; ?></td>
							<td><?php echo $result['tgl_denda']; ?></td>
                            <td><?php echo $result['jenis_denda']; ?></td>
							<td>Rp. <?php echo number_format($result['nominal']); ?></td>
							<td><?php echo $result['keterangan']; ?></td>
						</tr>
						<?php  
						$no++;
					}
				}
				?>  
    </table>

