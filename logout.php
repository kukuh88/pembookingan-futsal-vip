<?php

    session_start();

    unset($_SESSION['id_admin']);
    unset($_SESSION['nm_admin']);

    header("location:login.php");

?>