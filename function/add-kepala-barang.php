<?php 
    require_once("../connectdb.php");
    login();
    
    if(isset($_POST['submit'])) {
        $ID_Barang = $_POST['ID_Barang'];
        $nama_barang = $_POST['nama_barang'];
        $kategori = $_POST['kategori'];
        $harga_jual = $_POST['harga_jual'];
        $harga_beli = $_POST['harga_beli'];
        $stok = $_POST['stok'];

        $sql_insert = "INSERT INTO barang VALUES('$ID_Barang','$nama_barang', '$kategori', '$harga_jual','$harga_beli', '$stok')";
        mysqli_query($koneksi, $sql_insert);

        header("location:../data-kepala-barang.php");
    }
?>
