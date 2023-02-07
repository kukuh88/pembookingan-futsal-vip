<?php
session_start();
include_once("../Function/koneksi.php");
include_once("../Function/Helper.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <title>Laporan Booking</title>
</head>

<body>

    <center>
        <h1>FUTSAL RENTAL</h1>
        <h2>LAPORAN BOOKING</h2>
    </center>
    <table class=" table table-bordered table-striped">
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
        $bulan = $_SESSION['bulan'];
        $tahun = $_SESSION['tahun'];

        $awal_bulan = $tahun . '-' . $bulan . '-01';
        $akhir_bulan = $tahun . '-' . $bulan . '-31';

        $sql = mysqli_query($koneksi, "SELECT pembayaran.*, booking.*, pelanggan.nm_lengkap, lapangan.nm_lapangan FROM 
                                                pembayaran
                                                LEFT JOIN booking ON pembayaran.id_booking = booking.id_booking 
                                               LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan
                                               LEFT JOIN lapangan ON booking.id_lapangan=lapangan.id_lapangan
                                               where booking.status = 'Diterima'
                                               AND booking.tgl_pemesanan between '$awal_bulan' and '$akhir_bulan' order by booking.id_booking");

        $no = 1;
        $grandtotal = 0;
        if ($sql) {
            while ($result = mysqli_fetch_array($sql)) {
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
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Pangkalpinang, <?php echo date("d M Y") ?><br> Finance</p>
                <br>
                <br>
                <p>__________________________</p>
            </td>
        </tr>
    </table>

    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript">
        print()
    </script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>