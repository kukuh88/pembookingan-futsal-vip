<?php
    include_once("../Function/koneksi.php");
    include_once("../Function/Helper.php");

        $id_pembayaran      = $_POST['id_pembayaran'];  
        $id_denda           = $_POST['id_denda'];  
        $tgl_denda           = $_POST['tgl_denda'];  
        $jenis_denda 	    = $_POST['jenis_denda'];     
        $nominal 			= $_POST['nominal'];  
        $keterangan 		= $_POST['keterangan']; 
        
        
        if( empty($jenis_denda) || empty($nominal) || empty($keterangan)) {
            header("location:".BASE_URL."index.php?page=tambah_denda&notif=require"); 
                            
        }else {  
         $insert = mysqli_query($koneksi, "INSERT INTO denda(id_pembayaran, id_denda,tgl_denda, jenis_denda, nominal, keterangan) VALUES('$id_pembayaran','$id_denda', '$tgl_denda', '$jenis_denda','$nominal','$keterangan')");  
            if($insert){
                header("location:".BASE_URL."index.php?page=denda&pesan=add");
                }
           
        }
?>