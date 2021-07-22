<?php
    $pageactive = "staff";
    include_once("connectdb.php"); login();
    include_once("navbar-kepala.php");
    include_once("data-staff.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <link rel="stylesheet" href="css/style_tab.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>
    <div class="wrap-tab table-responsive">
        <div class="tab">
            <div style="background-color: #7ECA9C;" class="card">
                <div style="background-color: #7ECA9C;" class="border-0 card-header">
                    <h5 class="text-light card-title">Data Staff - SISTEM ADMINISTRASI APOTEK</h5>
                </div>
                <div class="card-body">
                <table style="background-color: white;" class="table-tab">

                    <!-- FORM SEARCHING -->
                    <form action="" method="get">
                        <div class="input-group">
                            <!-- Buat sebuah textbox dengan name cari -->
                            <input type="text" class="form-control" placeholder="Pencarian..." id="keyword" name="cari" autofocus autocomplete="off" required> &nbsp;
                            <span class="input-group-btn">
                                <!-- Buat sebuah tombol search dengan type submit -->
                                <button class="btn btn-primary" type="submit" id="btn-search" name="">SEARCH</button>
                                <a href="data-staff.php" class="btn btn-warning">RESET</a>
                            </span>
                        </div>
                    </form><br>
                    <!--  -->

                    <thead class="thead-dark">
                        <tr style="color: black;" class="">
                            <th scope="col">No</th>
                            <th scope="col">ID Pegawai</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- PAGINATION TABLE -->
                        <?php
                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                            $sebelumnya = $halaman - 1;
                            $selanjutnya = $halaman + 1;
                            
                            $data = mysqli_query($koneksi, "SELECT * FROM staff");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            // Tampilkan data sesuai dengan batas
                            $data = mysqli_query($koneksi, "SELECT * FROM staff LIMIT $halaman_awal, $batas");

                            if(isset($_GET['cari'])){
                                $cari = $_GET['cari'];
                                $data = mysqli_query($koneksi, "SELECT * FROM staff WHERE Nama LIKE '%$cari%' OR
                                                                                        Posisi LIKE '%$cari%' OR
                                                                                        Alamat LIKE '%$cari%' OR
                                                                                        Jenis_kelamin LIKE '%$cari%' OR
                                                                                        No_Telp LIKE '%$cari%'
                                                    ");
                            }else{
                                $data = mysqli_query($koneksi, "SELECT * FROM staff LIMIT $halaman_awal, $batas");		
                            }

                            $no = $halaman_awal + 1;

                            while($produk = mysqli_fetch_array($data)) { 
                        ?>
                        <tr>
                            <td> <?= $no++ ?></td>
                            <td> <?= $produk['ID_Pegawai'] ?></td>
                            <td> <?= $produk['Nama'] ?></td>
                            <td> <?= $produk['Posisi'] ?></td>
                            <td> <?= $produk['Alamat'] ?></td>
                            <td> <?= $produk['Jenis_kelamin'] ?></td>
                            <td> <?= $produk['No_Telp'] ?></td>
                            <td>
                                <a class="btn btn-warning" href="function/edit-staff.php?ID_Pegawai=<?=$produk['ID_Pegawai'];?>"><i class="bi bi-pencil"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus ?')" href="function/hapus-staff.php?ID_Pegawai=<?=$produk['ID_Pegawai'];?>"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>

                        <!-- END PAGINATION -->
                        <?php
                            }
                        ?>
                </table>
                <div class="bawah">
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

                            <!-- number array -->
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
                    <button style="margin-left: 20px; margin-top:-60px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahstaff">Tambah Staff</button>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahstaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div style="background-color: #7ECA9C;" class="modal-content">
        <div class="border-0 modal-header">
            <h5 class="text-light fw-bolder modal-title" id="exampleModalLabel">APTK24</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <h5 style="color: black; margin-top: 8px;" class="text-light fw-bolder text-center">TAMBAH STAFF</h5>
        <div class="modal-body">
            <form action="function/add-staff.php" method="POST">
                <div style="color: white;" class="row">
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahid">ID Pegawai</label>
                        <input type="number" class="form-control" name="ID_Pegawai" placeholder=""> <br>
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahnama">Nama</label>
                        <input type="text" class="form-control" name="Nama" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="inputPassword4">Posisi</label>
                        <input type="text" class="form-control" name="Posisi" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahalam">Alamat</label>
                        <input type="text" class="form-control" name="Alamat" placeholder=""> <br>
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahjeniskel">Jenis Kelamin</label>
                        <input type="text" class="form-control" name="Jenis_kelamin" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="inputPassword4">No Telp</label>
                        <input type="number" class="form-control" name="No_Telp" placeholder=""> <br>
                    </div>
                </div>
                <div class="border-0 modal-footer">
                    <button style="margin-top: 50px; margin-bottom: 50px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
                    <button style="margin-top: 50px; margin-bottom: 50px; margin-right: 7px; background-color: #00FF19;" type="submit" name="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- end modal -->
</body>
</html>