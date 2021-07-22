<?php

    session_start();

    include_once("connectdb.php");

    $random = rand(10,100);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body style="background-color: #CCFFBD;">
    <div class="wrap-tab">
        <div class="tab">

            <h1>Nota</h1>
            <hr>
            <div class="alert alert-info" role="alert">
                <strong>Pembayaran Dengan Nomer APTK24-<?php echo rand(1000,10000) ?></strong>
            </div>
            <table class="table table-bordered">
                <thead>
                    <strong>Rincian</strong>
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
            <div class="alert alert-info" role="alert">
                <strong>Silahkan Menyerahkan Nota pada Kasir !!!! </strong>
            </div>
            <form action="" method="POST">
                <input onclick="window.print()" name="" id="" class="btn btn-primary" type="button" value="PRINT">
                <button class="btn btn-primary" name="Home" >HOME</button>
            </form>
            
            <?php
                
                if(isset($_POST['Home'])){

                    unset($_SESSION["Keranjang"]);
                    echo "<script> location='staff-service.php'; </script>";
            }
            ?>
    </div>
</body>
</html>