<?php
    $pageactive = "service";
    include_once("connectdb.php");
    login();
    include_once("navbar-staff.php");

    // PAGINATION TABLE 
    $batas = 8;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $sebelumnya = $halaman - 1;
    $selanjutnya = $halaman + 1;
    
    $data = mysqli_query($koneksi, "SELECT * FROM barang");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);

    // Tampilkan data sesuai dengan batas
    $data = mysqli_query($koneksi, "SELECT * FROM barang LIMIT $halaman_awal, $batas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service - SISTEM ADMINISTRASI APOTEK</title> 

    <!-- CSS -->
    <link rel="stylesheet" href="css/style_tab.css" />
    <link rel="stylesheet" href="css/style.css" />    

    <!-- ANIMATED -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
<body>
    <div class="wrap-tab">
        <div class="tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <!-- FORM SEARCHING -->
                        <form action="" method="get">
                            <div class="input-group">
                                <!-- Buat sebuah textbox dengan name cari -->
                                <input type="text" class="form-control" placeholder="Pencarian..." id="keyword" name="cari" autofocus autocomplete="off" required> &nbsp;
                                <span class="input-group-btn">
                                    <!-- Buat sebuah tombol search dengan type submit -->
                                    <button class="btn btn-primary" type="submit" id="btn-search" name="">SEARCH</button>
                                    <a href="staff-service.php" class="btn btn-warning">RESET</a>
                                </span>
                            </div>
                        </form>
                        <!--  -->

                        <!-- PENCARIAN BARANG -->
                        <?php 
                        if(isset($_GET['cari'])){
                            $cari = $_GET['cari'];
                            $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_barang like '%".$cari."%'");					
                        }else{
                            $data = mysqli_query($koneksi, "SELECT * FROM barang LIMIT $halaman_awal, $batas");		
                        }

                        while($produk = mysqli_fetch_array($data)) { 
                        ?>
                        <div class="col-sm-3" data-aos="zoom-in-down"> <br>
                            <div class="card">
                                <div class="card-body ">
                                    <center>
                                    <h5 class="card-title service"><?= $produk['nama_barang'] ?></h5>
                                    <img src="gambar/<?php echo $produk['foto'] ?>" width="250">
                                    <p class="card-text service1">Harga : Rp.  <?= number_format($produk['harga_jual']) ?></p>
                                    <p class="card-text service1">Stock : <?= $produk['stok'] ?></p>
                                    <a href="staff-beli.php?id=<?php echo $produk["ID_Barang"]; ?>" class="btn btn-primary btn-block"> Beli </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!--  -->
                        
                        <!-- PAGINATION TABLE -->
                        <nav> <br>
                            <ul class="pagination justify-content-center">
                                <!-- Tombol Sebelumnya -->
                                <?php if($halaman <= 1) {?>
                                    <li class="page-item disabled">
                                        <a class="page-link" <?php echo "href='?halaman=$sebelumnya'"; ?>> sebelumnya </a>
                                    </li>
                                <?php } else { ?>
                                    <li class="page-item">
                                        <a class="page-link" <?php echo "href='?halaman=$sebelumnya'"; ?>> sebelumnya </a>
                                    </li>
                                <?php } ?>
                                <!--  -->

                                <!--  -->
                                <?php for($x = 1; $x <= $total_halaman; $x++){ ?> 
                                    <?php if($x != $halaman){?> 
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"> <?php echo $x; ?></a></li>
                                    <?php }else{ ?>
                                            <li class="page-item active"><a class="page-link "><?php echo $x; ?> </a> </li>
                                    <?php } ?>	        
                                <?php } ?>	
                                <!--  -->


                                <!-- Tombol Selanjutnya -->
                                <?php if($halaman >= $total_halaman) {?>
                                    <li class="page-item disabled">
                                        <a  class="page-link" <?php echo "href='?halaman=$selanjutnya'"; ?>> selanjutnya </a>
                                    </li>
                                <?php } else { ?>
                                    <li class="page-item">
                                        <a  class="page-link" <?php echo "href='?halaman=$selanjutnya'"; ?>> selanjutnya </a>
                                    </li>
                                <?php } ?>
                                <!--  -->

                            </ul>
                        </nav>
                    
                    <!-- Tombol untuk menuju keranjang -->
                    <div class="footer">
                        <a href="staff-keranjang.php" class="btn btn-success float-xl-left">Keranjang &raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ANIMATED -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

</body>
</html>