<?php 
    require_once("../connectdb.php");
    login();
    
    if(isset($_POST['submit'])) {
        $ID_Supplier = $_POST['ID_Supplier'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat_supplier = $_POST['alamat_supplier'];
        $No_Telp = $_POST['No_Telp'];

        $sql_insert = "INSERT INTO supplier VALUES('$ID_Supplier','$nama_supplier','$alamat_supplier', '$No_Telp')";
        mysqli_query($koneksi, $sql_insert);

        header("location:../data-supplier.php");
    }
?>
