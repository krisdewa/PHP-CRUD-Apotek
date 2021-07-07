<?php
    require_once("../connectdb.php");
    
    $ID_Barang = $_GET['ID_Barang'];

    $sql_delete = "DELETE FROM barang WHERE ID_Barang = '$ID_Barang' ";
    mysqli_query($koneksi, $sql_delete);

    header("Location:../data-staff-barang.php");
?>
