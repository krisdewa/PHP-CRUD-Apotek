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


        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif','webp');
        $filename = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
        if(!in_array($ext,$ekstensi) ) {
            echo "<script> alert('Ekstensi tidak sesuai !!!'); </script>";
		    echo "<script> location='../data-staff-barang.php'; </script>";
        }else{
            if($ukuran < 1044070){		
                $foto = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/'.$rand.'_'.$filename);

                $sql_insert = "INSERT INTO barang VALUES('$ID_Barang','$nama_barang', '$kategori', '$harga_jual','$harga_beli', '$stok', '$foto')";
                mysqli_query($koneksi, $sql_insert);

                echo "<script> alert('Berhasil Menambahkan Data !!!'); </script>";
		        echo "<script> location='../data-staff-barang.php'; </script>";

            }else{
                echo "<script> alert('Ukuran terlalu besar !!!'); </script>";
		        echo "<script> location='../data-staff-barang.php'; </script>";
            }
        }

        // header("location:../data-staff-barang.php");
    }
?>
