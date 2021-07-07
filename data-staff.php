<?php
    include_once("connectdb.php");
    login();
    
    $sql_get = "SELECT * FROM staff";
    $query_staff = mysqli_query($koneksi, $sql_get);

    $results = [];

    while($row = mysqli_fetch_assoc($query_staff)) {
        $results[] = $row;
    }

    include_once("navbar-kepala.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <link rel="stylesheet" href="css/style_tab.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>
    <div class="wrap-tab table-responsive">
        <div class="tab">
            <div style="background-color: #7ECA9C;" class="card">
                <div style="background-color: #7ECA9C;" class="border-0 card-header">
                    <h5 class="text-light card-title">Data Staff</h5>
                </div>
                <div class="card-body">
                <table style="background-color: white;" class="table-tab">
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
                    <?php
                        $no =1;
                        foreach($results as $result) :
                    ?>

                    <tbody>
                        <tr>
                            <td> <?= $no ?></td>
                            <td> <?= $result['ID_Pegawai'] ?></td>
                            <td> <?= $result['Nama'] ?></td>
                            <td> <?= $result['Posisi'] ?></td>
                            <td> <?= $result['Alamat'] ?></td>
                            <td> <?= $result['Jenis_kelamin'] ?></td>
                            <td> <?= $result['No_Telp'] ?></td>
                            <td>
                                <a class="btn btn-warning" href="function/edit-staff.php?ID_Pegawai=<?=$result['ID_Pegawai'];?>"><i class="bi bi-pencil"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus ?')" href="function/hapus-staff.php?ID_Pegawai=<?=$result['ID_Pegawai'];?>"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>

                    <?php
                        $no++;
                        endforeach;
                    ?>
                </table>
                <div class="bawah">
                    <button style="margin-left: 10px" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahstaff">Tambah Staff</button>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahstaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div style="background-color: #2F5D62;" class="modal-content">
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