<?php

    require_once("../connectdb.php");
    login();

    $ID_Supplier = $_GET['ID_Supplier']; 

    $sql_cari = "SELECT * FROM supplier WHERE ID_Supplier = '$ID_Supplier'";
    $query = mysqli_query($koneksi, $sql_cari);
    $result = mysqli_fetch_assoc($query);

    if(isset($_POST['submit'])) {
        $ID_Supplier = $_POST['ID_Supplier'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat_supplier = $_POST['alamat_supplier'];
        $No_Telp = $_POST['No_Telp'];

        $sql_edit = "UPDATE supplier SET nama_supplier = '$nama_supplier', alamat_supplier = '$alamat_supplier', No_Telp = '$No_Telp' WHERE ID_Supplier = '$ID_Supplier' ";
        mysqli_query($koneksi, $sql_edit);

        header("Location:../data-supplier.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Staff </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body style="background-color: #7ECA9C;">
    <!-- EDIT DATA  -->
    <div class="container-sm"> <br>
        <h1 class="display-5">UPDATE Supplier</h1>
        <hr>
        <form action="edit-supplier.php" method="POST">

            <table><br>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" hidden>ID Pegawai</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="ID_Supplier" value="<?= $result['ID_Supplier'];?>" hidden>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama Supplier</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_supplier" value="<?= $result['nama_supplier'];?>" >
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Alamat Supplier</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat_supplier" value="<?= $result['alamat_supplier'];?>" >
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="No_Telp" value="<?= $result['No_Telp'];?>" >
                    </div>
                </div>

            </table><br>
            <div class="float-xl-right">
                <button class="btn btn-warning" name="submit" type="submit">Update</button>
                <a href="../data-supplier.php" class="btn btn-danger"> Cancel </a>
            </div>

        </form>
    </div>

</body>
</html>