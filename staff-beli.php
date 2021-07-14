<?php

    session_start();

    $id_produk = $_GET['id'];

    if(isset($_SESSION['Keranjang'] [$id_produk])){

        $_SESSION['Keranjang'][$id_produk] += 1;

    }else{

        $_SESSION['Keranjang'][$id_produk] = 1;
    }

    echo "<script> alert('Produk Telah Masuk keranjang'); </script>";
    echo "<script> location='staff-keranjang.php'; </script>";


?>