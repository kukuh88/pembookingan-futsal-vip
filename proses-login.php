<?php
    include_once("Function/koneksi.php");
    include_once("Function/Helper.php");

    
    $username       = $_POST['username'];
    $password       = $_POST['password'];

    //untuk ngecek data ada tidak di database
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    

    if(mysqli_num_rows($query) === 0) { 
        header("location:".BASE_URL."login.php?notif=true");
    }else{

        $row = mysqli_fetch_assoc($query);

        session_start();

        $_SESSION['id_admin'] = $row['id_admin'];
        $_SESSION['nm_admin'] = $row['nm_admin'];
        header("location:".BASE_URL."index.php"); 
    }
?>
