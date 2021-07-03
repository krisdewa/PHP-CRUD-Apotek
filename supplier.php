<?php
    include_once("connectdb.php");
    // login();
    
    $sql_get = "SELECT * FROM supplier";
    $query_supplier = mysqli_query($koneksi, $sql_get);

    $results = [];

    while($row = mysqli_fetch_assoc($query_supplier)) {
        $results[] = $row;
    }

    include_once("navbar.php")
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
    <div class="wrap-tab">
        <div class="tab">
            <div style="background-color: #7ECA9C;" class="card">
            <div style="background-color: #7ECA9C;" class="border-0 card-header">
                    <h5 class="text-light card-title">Data Supplier</h5>
                </div>
                <div class="card-body">
                    <table style="background-color: white;" class="table-tab">
                        <thead>
                            <tr style="color: black;" >
                                <th scope="col">No</th>
                                <th scope="col">ID Supplier</th>
                                <th scope="col">Nama Supplier</th>
                                <th scope="col">Alamat Supplier</th>
                                <th scope="col">No Telp</>
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
                                <td> <?= $result['ID_Supplier'] ?></td>
                                <td> <?= $result['nama_supplier'] ?></td>
                                <td> <?= $result['alamat_supplier'] ?></td>
                                <td> <?= $result['No_Telp'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="edit_supplier.php?ID_Supplier=<?=$result['ID_Supplier'];?>"><i class="bi bi-pencil"></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="hapus_supplier.php?ID_Supplier=<?=$result['ID_Supplier'];?>"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                                
                        </tbody>

                        <?php
                            $no++;
                            endforeach;
                        ?>

                    </table>
                    <div class="bawah">
                        <button style="margin-left: 10px" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahsupliyer">Tambah Supplier</button>
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
            <h5 style="color: black; margin-top: 8px;" class="text-light fw-bolder text-center">TAMBAH SUPPLIER</h5>
        <div class="modal-body">
            <form action="">
                <div style="color: white;" class="row">
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahid">ID Supplier</label>
                        <input type="text" class="form-control" id="IDSupplier" placeholder=""> <br>
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahnama">Nama Supplier</label>
                        <input type="text" class="form-control" id="NamaSupplier" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="tambahjeniskel">Alamat Supplier</label>
                        <input type="text" class="form-control" id="AlamatSupplier" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label style="margin-bottom: 5px;" for="inputPassword4">No Telp</label>
                        <input type="text" class="form-control" id="NoTelp" placeholder="">
                    </div>
                </div>
            </form>
        </div>
        <div class="border-0 modal-footer">
            <button style="margin-top: 50px; margin-bottom: 50px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
            <button style="margin-top: 50px; margin-bottom: 50px; margin-right: 7px; background-color: #00FF19;" type="submit" class="btn btn-success">Simpan</button>
        </div>
        </div>
    </div>
    </div>
    <!-- end modal -->
</body>
</html>