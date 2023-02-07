<form method="post" action="">
<div class="title"><h3>LAPORAN BOOKING</h3></div>
<label>Bulan</label>
<select name="bulan"placeholder="Tanggal" class="form-control">
<option value="01">Januari</option>
<option value="02">Februai</option>
<option value="03">Maret</option>
<option value="04">April</option>
<option value="05">Mei</option>
<option value="06">Juni</option>
<option value="07">Juli</option>
<option value="08">Agustus</option>
<option value="09">September</option>
<option value="10">Oktober</option>
<option value="11">November</option>
<option value="12">Desember</option>
</select><br>
<label>Tahun</label>
<select name="tahun" placeholder="Tahun" class="form-control">
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
</select><br>
<input type="submit" name="submit" value="Cari" class="submit">
<input type="submit" name="print" value="Print" class="submit">

<?php
if(isset($_POST['submit'])){
	?>
			   <table class= " table table-bordered table-striped">
		            <tr>
		                <th><i class=""></i>NO</th>
		                <th class="text-center">ID Booking</th>
		                <th class="text-center">Nama Pelanggan</th>
		                <th class="text-center">Nama Lapangan </th>
		                <th class="text-center">Tanggal Pembayaran</th>
		                <th class="text-center">Tanggal Booking</th>
		                <th class="text-center">Tanggal Main</th>
		                <th class="text-center">Jam Main</th>
		                <th class="text-center">Durasi</th>
		                <th class="text-center">Total Booking</th>
		                <th class="text-center">Status</th>
		                        
		            </tr>
				<?php  
				//Halaman View Laporan Penjualan
				$bulan= $_POST['bulan'];
				$tahun= $_POST['tahun'];
				
				$awal_bulan = $tahun.'-'.$bulan.'-01';
				$akhir_bulan = $tahun.'-'.$bulan.'-31';

				$sql = mysqli_query($koneksi, "SELECT pembayaran.*, booking.*, pelanggan.nm_lengkap, lapangan.nm_lapangan FROM 
												pembayaran
												LEFT JOIN booking ON pembayaran.id_booking = booking.id_booking 
                                               LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan
                                               LEFT JOIN lapangan ON booking.id_lapangan=lapangan.id_lapangan
                                               where booking.status = 'Diterima'
                                               AND booking.tgl_pemesanan between '$awal_bulan' and '$akhir_bulan' order by booking.id_booking");
                                         
				$no=1;
                $grandtotal=0;
				if($sql){
					while($result=mysqli_fetch_array($sql)){
						?>
						<tr>
                            <td><?php echo $no ?></td>
							<td><?php echo $result['id_booking']; ?></td>
							<td><?php echo $result['nm_lengkap']; ?></td>
							<td><?php echo $result['nm_lapangan']; ?></td>
							<td><?php echo $result['tgl_pembayaran']; ?></td>
							<td><?php echo $result['tgl_pemesanan']; ?></td> 
                            <td><?php echo $result['tgl_main']; ?></td>
                            <td><?php echo $result['jam_main']; ?></td>
                            <td><?php echo $result['durasi']; ?></td>
                            <td>Rp. <?php echo number_format($result['total_booking']); ?></td>
                            <td><?php echo $result['status']; ?></td>
							
						</tr>
						<?php  
						$no++;
                        $grandtotal += $result['total_booking'];
					}
					?>
                    <tr>
                            <td colspan="9">Grandtotal</td>
                            <td>Rp. <?php echo number_format($grandtotal) ?></td>
                    </tr>
                    <?php
				}
				?>         
    		</table>
            <table width= "100%">
                <tr>
                    <td></td>
                    <td width="200px">
                        <p>Pangkalpinang, <?php echo date("d M Y")?><br> Finance</p>
                        <br>
                        <br>
                        <p>__________________________</p>
                    </td>
                </tr>
            </table>
<?php
}elseif(isset($_POST['print'])){
	$_SESSION['bulan'] = $_POST['bulan'];
	$_SESSION['tahun'] = $_POST['tahun'];
	echo"<meta http-equiv='refresh' content='0 url =page/laporan_booking.php' target='_blank'>";
}	
?>
</form>
  <!-- page end-->
       