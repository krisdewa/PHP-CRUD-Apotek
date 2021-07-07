<?php
    require_once("../connectdb.php");
    
    $ID_Supplier = $_GET['ID_Supplier'];

    $sql_delete = "DELETE FROM supplier WHERE ID_Supplier = '$ID_Supplier' ";
    mysqli_query($koneksi, $sql_delete);

    header("Location:../data-supplier.php");
?>