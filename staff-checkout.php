<?php
    $pageactive = "service";
    session_start();

    include_once("connectdb.php");
    include_once("navbar-staff.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service - SISTEM ADMINISTRASI APOTEK</title> 
    <link rel="stylesheet" href="css/style_tab.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="wrap-tab">
        <div class="tab">
            <h1>Checkout</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                <?php $nomer = 1 ?>
                <?php $totalbalanja = 0; ?>
                    <?php foreach($_SESSION['Keranjang'] as $id_produk => $jumlah): ?>
                    <?php 
                        $ambil = $koneksi -> query("SELECT * FROM barang WHERE ID_Barang = '$id_produk'");
                        $pecah = $ambil -> fetch_assoc();
                        $total=$pecah['harga_jual']*$jumlah; 
                    ?>
                    <tr>
                        <td><?php echo $nomer ?></td>
                        <td><?php echo $pecah["nama_barang"]; ?></td>
                        <td> RP. <?php echo number_format($pecah["harga_jual"]) ?></td>
                        <td><?php echo $jumlah ?></td>
                        <td> RP. <?php echo number_format($total) ?></td>
                    </tr>
                    <?php $nomer++ ?>
                    <?php $totalbalanja += $total; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalbalanja)?></th>
                    </tr>
                </tfoot>
            </table>
            <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-groub">
                                <input type="text" class="form-control" placeholder="Masukan Nama" name="nama_pembeli" id="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-groub">
                                <input type="text" class="form-control" placeholder="Masukan Alamat" name="alamat" id="">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="">
                                <button class="btn btn-primary" name="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
            </form>
            <?php

                if(isset($_POST['submit'])){

                    $tanggal = date("Y-m-d");

                    foreach ($_SESSION["Keranjang"] as $id_produk1 => $jumlah1){

                        $ambil1 = $koneksi -> query("INSERT INTO beli (nama_pelanggan, ID_Barang, alamat, tanggal, jumlah_barang, total) VALUES ('$_POST[nama_pembeli]','$id_produk1','$_POST[alamat]', '$tanggal', '$jumlah1', '$totalbalanja')");
                    }

                    // $ambil2 = $koneksi -> query("SELECT * FROM beli WHERE ID_Beli");

                    // $akun = $ambil2 -> fetch_assoc();
                    // $_SESSION["Pelanggan"] = $akun;
                    

                    echo "<script> alert('Checkout Selesai !!!'); </script>";
                    echo "<script> location='staff-nota.php'; </script>";
            }
        ?>
    </div>
</body>
</html>