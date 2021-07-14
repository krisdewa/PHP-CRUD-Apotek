<?php
    include_once("../connectdb.php");
    login();
    include_once("navbar.php");

    $batas = 4;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;
    
    $data = mysqli_query($koneksi,"select * from barang");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);

    $ambil = $koneksi -> query("SELECT * FROM barang LIMIT $halaman_awal, $batas");
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
                        <nav>
                            <br><br>
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                                </li>
                                <?php 
                                for($x=1;$x<=$total_halaman;$x++){
                                    ?> 
                                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                    <?php
                                }
                                ?>				
                                <li class="page-item">
                                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                                </li>
                            </ul>
                        </nav>
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