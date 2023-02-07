<?php
    include_once("../Function/koneksi.php");
    include_once("../Function/Helper.php");

        $id_lapangan        = $_POST['id_lapangan']; 
        $nm_lapangan		= $_POST['nm_lapangan'];  
        $jenis_lapangan 	= $_POST['jenis_lapangan']; 
        $harga	        	= $_POST['harga'];  

        //gambar
        $nama_file = $_FILES['foto_lapangan']['name'];
        $tmp_name = $_FILES['foto_lapangan']['tmp_name'];

        //upload gambar
        $lokasi_gambar = '../foto_lapangan/';
        move_uploaded_file($tmp_name, $lokasi_gambar.$nama_file);
       
        if(empty($nm_lapangan) || empty($jenis_lapangan) || empty($harga)) {
            header("location:".BASE_URL."index.php?page=adm_tambah_lapangan&notif=require"); 
                            
        }else {  
         $insert = mysqli_query($koneksi, "INSERT INTO lapangan(id_lapangan,nm_lapangan, jenis_lapangan, harga, foto_lapangan) 
		      VALUES('$id_lapangan','$nm_lapangan','$jenis_lapangan','$harga','$nama_file')");  
            if($insert){
                header("location:".BASE_URL."index.php?page=lapangan&notif=success");
                }
           
        }
?>