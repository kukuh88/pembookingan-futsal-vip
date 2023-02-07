<?php
    include_once("../Function/koneksi.php");
    include_once("../Function/Helper.php");

        $id_admin           = $_POST['id_admin'];  
        $nm_admin 		    = $_POST['nm_admin'];     
        $username 			= $_POST['username'];  
        $password 			= $_POST['password']; 
        $alamat_admin 		= $_POST['alamat_admin'];  
        $tlp_admin	 		= $_POST['tlp_admin']; 
        
        if( empty($nm_admin) || empty($username) || empty($password) ||  empty($alamat_admin) || empty($tlp_admin)) {
            header("location:".BASE_URL."index.php?page=tambah_admin&notif=require"); 
                            
        }else {  
         $insert = mysqli_query($koneksi, "INSERT INTO admin(id_admin,nm_admin, username, password, alamat_admin, tlp_admin) 
					            VALUES('$id_admin','$nm_admin','$username','$password','$alamat_admin','$tlp_admin')");  
            if($insert){
                header("location:".BASE_URL."index.php?page=admin&pesan=add");
                }
           
        }
?>