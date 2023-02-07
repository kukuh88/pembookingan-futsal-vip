<?php  
    include_once("../Function/koneksi.php");
    include_once("../Function/Helper.php");
	

		$nm_admin 		    = $_POST['nm_admin'];
        $username 		    = $_POST['username'];
        $password 		    = $_POST['password'];
        $alamat_admin	 	= $_POST['alamat_admin'];  
		$tlp_admin 		    = $_POST['tlp_admin']; 
        if( empty($nm_admin) || empty($username) || empty($password) ||  empty($alamat_admin) || empty($tlp_admin)) {
            header("location:".BASE_URL."index.php?page=edit_admin&notif=require"); 
		}else{ 
			$id_admin = $_GET['id_admin']; 
			$Update_admin = mysqli_query($koneksi, "UPDATE admin 
				SET nm_admin='$nm_admin', username='$username',password='$password',alamat_admin='$alamat_admin', tlp_admin='$tlp_admin'
				WHERE id_admin='$id_admin'");  
			if($Update_admin){ 
				header("location:".BASE_URL."index.php?page=admin&notif=success");
			}
        }
    