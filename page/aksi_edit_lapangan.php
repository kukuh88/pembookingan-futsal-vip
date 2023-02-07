<?php  
    include_once("../Function/koneksi.php");
    include_once("../Function/Helper.php");
	

		$nm_lapangan 		= $_POST['nm_lapangan'];
        $jenis_lapangan     = $_POST['jenis_lapangan'];   
        $harga 		        = $_POST['harga'];

        //gambar
        $nama_file = $_FILES['foto_lapangan']['name'];
        $tmp_name = $_FILES['foto_lapangan']['tmp_name'];

        //upload gambar
        $lokasi_gambar = '../foto_lapangan/';
        move_uploaded_file($tmp_name, $lokasi_gambar.$nama_file);
         
        if(empty($nm_lapangan) || empty($jenis_lapangan) || empty($harga)) {
            header("location:".BASE_URL."index.php?page=edit_lapangan&notif=require"); 
                            
        }else {  
			$id_lapangan = $_GET['id_lapangan']; 
			$Update_lapangan = mysqli_query($koneksi, "UPDATE lapangan
				SET nm_lapangan='$nm_lapangan',jenis_lapangan='$jenis_lapangan',harga='$harga', foto_lapangan='$nama_file'
				WHERE id_lapangan='$id_lapangan'");  
			if($Update_lapangan){ 
				header("location:".BASE_URL."index.php?page=lapangan&pesan=success");
		}
        
        }