<?php  
    include_once("../Function/koneksi.php");
    include_once("../Function/Helper.php");
	

		$id_pelanggan 		        = $_POST['id_pelanggan'];
        $nm_lengkap     		= $_POST['nm_lengkap'];   
        $password 		        = $_POST['password'];
        $alamat                 = $_POST['alamat'];  
		$no_hp 		            = $_POST['no_hp'];
        $email 		            = $_POST['email'];
        $jenis_kelamin          = $_POST['jenis_kelamin']; 
        if(empty($id_pelanggan) || empty($password) || empty($nm_lengkap) || empty($alamat) || empty($no_hp) || empty($email) || empty($jenis_kelamin)) {
            header("location:".BASE_URL."index.php?page=edit_pelanggan&notif=require"); 
                            
        }else {  
			$id_pelanggan = $_GET['id_pelanggan']; 
			$Update_pelanggan = mysqli_query($koneksi, "UPDATE pelanggan
				SET nm_lengkap='$nm_lengkap',password='$password',alamat='$alamat',no_hp='$no_hp',email='$email',jenis_kelamin='$jenis_kelamin'
				WHERE id_pelanggan='$id_pelanggan'");  
			if($Update_pelanggan){ 
				header("location:".BASE_URL."index.php?page=pelanggan&pesan=success");
		}
        
        }