<?php
    include_once("connectdb.php");
    login();
    
    $sql_get = "SELECT * FROM barang";
    $query_staff = mysqli_query($koneksi, $sql_get);

    $results = [];

    while($row = mysqli_fetch_assoc($query_staff)) {
        $results[] = $row;
    }
    
    include_once("navbar-staff.php")
?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <link rel="stylesheet" href="css/style_tab.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="wrap-tab">
        <div class="tab">
            <div style="background-color: #7ECA9C;" class="card">
                <div style="background-color: #7ECA9C;" class="border-0 card-header">
                    <h5 class="text-light card-title">Data Staff</h5>
                </div>
                <div class="card-body"> 
                    <table style="background-color: white;" class="table-tab">
                        <thead>
                            <tr style="color: black;">
                                <th scope="col">No</th>
                                <th scope="col">ID Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kategori Barang</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <?php
                            $no =1;
                            foreach($results as $result) :
                        ?>

                        <tbody>
                            <tr>
                                <td> <?= $no ?></td>
                                <td> <?= $result['ID_Barang'] ?></td>
                                <td> <?= $result['nama_barang'] ?></td>
                                <td> <?= $result['kategori'] ?></td>
                                <td> <?= $result['harga_jual'] ?></td>
                                <td> <?= $result['harga_beli'] ?></td>
                                <td> <?= $result['stok'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="function/edit-staff-barang.php?ID_Barang=<?=$result['ID_Barang'];?>"><i class="bi bi-pencil"></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus ?')" href="function/hapus-staff-barang.php?ID_Barang=<?=$result['ID_Barang'];?>"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                        </tbody>

                        <?php
                            $no++;
                            endforeach;
                        ?>

                    </table>
                    <div class="bawah">
                        <button style="margin-left: 10px" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahsupliyer">Tambah Barang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahsupliyer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div style="background-color: #2F5D62;" class="modal-content">
        <div class="border-0 modal-header">
            <h5 class="text-light fw-bolder modal-title" id="exampleModalLabel">APTK24</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <h5 style="color: black; margin-top: 8px;" class="text-light fw-bolder text-center">TAMBAH BARANG</h5>
        <div class="modal-body">
            <form action="function/add-staff-barang.php" method="POST">
                <div style="color: white;" class="row">
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahid">ID Barang</label>
                        <input type="number" class="form-control"  name="ID_Barang" placeholder=""> <br>
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahnama">Nama Barang</label>
                        <input type="text" class="form-control"  name="nama_barang" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahjeniskel">Kategori Barang</label>
                        <input type="text" class="form-control" name="kategori" placeholder=""> <br>
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="inputPassword4">Harga Jual</label>
                        <input type="number" class="form-control" name="harga_jual" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="inputPassword4">Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="inputPassword4">Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="">
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