<?php
include_once("../Function/koneksi.php");
include_once("../Function/Helper.php");
?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Laporan Booking</title>
  </head>
  <body>

  <center>
                <h1>FUTSAL RENTAL</h1>
                <h2>Laporan Booking</h2>
            </center>
                       
         <table class= " table table-bordered table-striped">
            <tr>
                <th><i class=""></i>NO</th>
                <th class="text-center">ID Booking</th>
                <th class="text-center">Nama Pelanggan</th>
                <th class="text-center">Nama Lapangan </th>
                <th class="text-center">Tanggal Booking</th>
                <th class="text-center">Tanggal Main</th>
                <th class="text-center">Jam Main</th>
                <th class="text-center">Durasi</th>
                <th class="text-center">Status</th>
                        
            </tr>
        <?php
	            $sql = mysqli_query($koneksi, "SELECT booking.*, pelanggan.nm_lengkap, lapangan.nm_lapangan FROM booking 
                                               INNER JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan
                                               INNER JOIN lapangan ON Booking.id_lapangan=lapangan.id_lapangan");
                                         
				$no=1;
				if($sql){
					while($result=mysqli_fetch_array($sql)){
						?>
						<tr>
                            <td><?php echo $no ?></td>
							<td class="text-center"><?php echo $result['id_booking']; ?></td>
							<td><?php echo $result['nm_lengkap']; ?></td>
							<td><?php echo $result['nm_lapangan']; ?></td>
							<td><?php echo $result['tgl_pembayaran']; ?></td> 
                            <td><?php echo $result['tgl_main']; ?></td>
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

   

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <Script type="text/javascript">
    window.print();l
    </Script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>         
            
            
  

