<?php
    include_once("../connectdb.php");

    include_once("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service</title> 
    <link rel="stylesheet" href="../css/style_tab.css" />
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrap-tab">
        <div class="tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php $ambil = $koneksi -> query("SELECT * FROM barang"); ?>
                        <?php while($produk = $ambil -> fetch_assoc()) { ?>
                        <div class="col-sm-6"> <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $produk['nama_barang'] ?></h5>
                                    <p class="card-text">Harga : RP.  <?= number_format($produk['harga_jual']) ?></p>
                                    <p class="card-text">Stock : <?= $produk['stok'] ?></p>
                                    <a href="beli.php?id=<?php echo $produk["ID_Barang"]; ?>" class="btn btn-primary">Beli</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    <div class="footer">
                    <br>
                        <a href="keranjang.php" class="btn btn-success float-xl-left">Keranjang &raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>