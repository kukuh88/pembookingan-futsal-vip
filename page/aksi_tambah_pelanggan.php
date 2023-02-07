<?php
    include_once("../Function/koneksi.php");
    include_once("../Function/Helper.php");

        $id_pelanggan 			= $_POST['id_pelanggan'];  
        $password 			= $_POST['password']; 
        $nm_lengkap 		= $_POST['nm_lengkap'];  
        $alamat 			= $_POST['alamat'];  
        $no_hp	 			= $_POST['no_hp']; 
        $email 				= $_POST['email']; 
        $jenis_kelamin 		= $_POST['jenis_kelamin'];

        if(empty($id_pelanggan) || empty($password) || empty($nm_lengkap) || empty($alamat) || empty($no_hp) || empty($email) || empty($jenis_kelamin)) {
            header("location:".BASE_URL."index.php?page=adm_tambah_pelanggan&notif=require"); 
                            
        }else {  
         $insert = mysqli_query($koneksi, "INSERT INTO pelanggan(id_pelanggan, password, nm_lengkap, alamat, no_hp, email, jenis_kelamin) 
					            VALUES('$id_pelanggan','$password','$nm_lengkap','$alamat','$no_hp','$email','$jenis_kelamin')");  
            if($insert){
                header("location:".BASE_URL."index.php?page=pelanggan&notif=success");
                }
           
        }
?>