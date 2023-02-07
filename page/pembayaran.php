
<h1 class="h3 mb-0 text-gray-800">DATA PEMBAYARAN</h1>

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

    $status = isset($_GET['status']);
    if($status){
        $id_booking     = $_GET['id_booking'];
        $status         = $_GET['status'];
        $Update_status = mysqli_query($koneksi, "UPDATE booking 
                SET status='$status'
                WHERE id_booking='$id_booking'");  
    }
?>

<table class="table table-bordered table-striped mt-2">
                    <tr>
                        <th><i class=""></i>NO</th>
                        <th class="text-center">ID PEMBAYARAN</th>
                        <th class="text-center">ID BOOKING</th>
                        <th class="text-center">TANGGAL PEMBAYARAN</th>
                        <th class="text-center">NAMA PELANGGAN</th>
                        <th class="text-center">TOTAL PEMBAYARAN</th>
                        <th class="text-center">BUKTI PEMBAYARAN</th>
                        <th class="text-center">ACTION</th>

                    </tr>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM Pembayaran
                                                LEFT JOIN Booking ON pembayaran.id_booking=booking.id_booking
                                                LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan
                                                LEFT JOIN Lapangan ON booking.id_lapangan=lapangan.id_lapangan");
                                                
                          
				$no=1;
				if($sql){
					while($result=mysqli_fetch_array($sql)){
						?>
						<tr>
                            <td><?php echo $no ?></td>
							<td><?php echo $result['id_pembayaran']; ?></td>
                            <td><?php echo $result['id_booking']; ?></td>
							<td><?php echo $result['tgl_pembayaran']; ?></td>
                            <td><?php echo $result['nm_lengkap']; ?></td>
                            <td>Rp. <?php echo number_format($result['total_pembayaran']); ?></td>
                            <td><img src="foto_pembayaran/<?php echo $result['gambar'] ?>" width="100" height="100" alt="Foto Pembayaran tidak ada"></img></a> </td>
                            <td>
							<?php if($result['status'] == 'on process'){ ?>
                                <a href="index.php?page=pembayaran&action=status&id_booking=<?php echo $result['id_booking']; ?>&status=Diterima" class="btn btn-sm btn-info mb-1">Approve</a>
                                <a href="index.php?page=pembayaran&action=status&id_booking=<?php echo $result['id_booking']; ?>&status=Ditolak" class="btn btn-sm btn-danger mb-1">Reject</a>
                            <?php } ?>
							</td>
						</tr>
						<?php  
						$no++;
					}
				}
				?>  
    </table>

