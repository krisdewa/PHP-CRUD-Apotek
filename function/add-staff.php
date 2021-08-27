<?php 
    require_once("../connectdb.php");
    login();
    
    if(isset($_POST['submit'])) {
        $ID_Pegawai = $_POST['ID_Pegawai'];
        $Nama = $_POST['Nama'];
        $Jenis_kelamin = $_POST['Jenis_kelamin'];
        $Alamat = $_POST['Alamat'];
        $Posisi = $_POST['Posisi'];
        $No_Telp = $_POST['No_Telp'];

        $sql_insert = "INSERT INTO staff VALUES('$ID_Pegawai','$Nama','$Posisi', '$Alamat','$Jenis_kelamin', '$No_Telp')";
        mysqli_query($koneksi, $sql_insert);

        header("location:../data-staff.php");
    }
?>
