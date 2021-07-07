<?php
    require_once("../connectdb.php");
    
    $ID_Pegawai = $_GET['ID_Pegawai'];

    $sql_delete = "DELETE FROM staff WHERE ID_Pegawai = '$ID_Pegawai' ";
    mysqli_query($koneksi, $sql_delete);

    header("Location:../data-staff.php");
?>