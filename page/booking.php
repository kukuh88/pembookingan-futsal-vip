
<h1 class="h3 mb-0 text-gray-800">DATA BOOKING</h1>

<?php
	$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    if($notif == "success") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil di Isi!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
?>

<table class="table table-bordered table-striped mt-2">
                    <tr>
                        <th><i class=""></i>NO</th>
                        <th class="text-center">ID Booking</th>
                        <th class="text-center">Nama Pelanggan</th>
                        <th class="text-center">Nama Lapangan </th>
                        <th class="text-center">Tanggal Booking</th>
                        <th class="text-center">Tanggal Main</th>
                        <th class="text-center">Total Booking</th>
                        <th class="text-center">Jam Main</th>
                        <th class="text-center">Durasi</th>
                        <th class="text-center">Status</th>
                    </tr>
                <?php
	            $sql = mysqli_query($koneksi, "SELECT booking.*, pelanggan.nm_lengkap, lapangan.nm_lapangan FROM booking 
                                               LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan
                                               LEFT JOIN lapangan ON Booking.id_lapangan=lapangan.id_lapangan");
                                         
				$no=1;
				if($sql){
					while($result=mysqli_fetch_array($sql)){
						?>
						<tr>
                            <td><?php echo $no ?></td>
							<td><?php echo $result['id_booking']; ?></td>
							<td><?php echo $result['nm_lengkap']; ?></td>
							<td><?php echo $result['nm_lapangan']; ?></td>
							<td><?php echo $result['tgl_pemesanan']; ?></td> 
                            <td><?php echo $result['tgl_main']; ?></td>
                            <td>Rp. <?php echo number_format($result['total_booking']); ?></td>
                            <td><?php echo $result['jam_main']; ?></td>
                            <td><?php echo $result['durasi']; ?></td>
                            <td><?php echo $result['status']; ?></td>
							
						</tr>
						<?php  
						$no++;
					}
				}
				?>  
    </table>

