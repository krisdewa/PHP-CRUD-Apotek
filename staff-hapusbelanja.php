<?php

    session_start();

    $id_produk = $_GET["id"];
    unset($_SESSION["Keranjang"] [$id_produk]);

    echo "<script> alert('Produk Telah Di Hapus !!'); </script>";
    echo "<script> location='staff-keranjang.php'; </script>";

?>