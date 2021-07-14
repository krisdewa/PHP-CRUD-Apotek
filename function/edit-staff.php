<?php

    require_once("../connectdb.php");
    login();

    $ID_Pegawai = $_GET['ID_Pegawai']; 

    $sql_cari = "SELECT * FROM staff WHERE ID_Pegawai = '$ID_Pegawai'";
    $query = mysqli_query($koneksi, $sql_cari);
    $result = mysqli_fetch_assoc($query);

    if(isset($_POST['submit'])) {
        $ID_Pegawai = $_POST['ID_Pegawai'];
        $Nama = $_POST['Nama'];
        $Posisi = $_POST['Posisi'];
        $Alamat = $_POST['Alamat'];
        $Jenis_kelamin = $_POST['Jenis_kelamin'];
        $No_Telp = $_POST['No_Telp'];

        $sql_edit = "UPDATE staff SET Nama = '$Nama', Posisi = '$Posisi', Alamat = '$Alamat', Jenis_kelamin = '$Jenis_kelamin', No_Telp ='$No_Telp' WHERE ID_Pegawai = '$ID_Pegawai' ";
        mysqli_query($koneksi, $sql_edit);

        header("Location:../data-staff.php");
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
        <h1 class="display-5">UPDATE STAFF</h1>
        <hr>
        <form action="edit-staff.php" method="POST">
            <table><br>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" hidden>ID Pegawai</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="ID_Pegawai" value="<?= $result['ID_Pegawai'];?>" hidden>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Nama" value="<?= $result['Nama'];?>" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Posisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Posisi" value="<?= $result['Posisi'];?>" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Alamat" value="<?= $result['Alamat'];?>" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">jenis kelamin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Jenis_kelamin" value="<?= $result['Jenis_kelamin'];?>" >
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
                <a href="../data-staff.php" class="btn btn-danger"> Cancel </a>
            </div>

        </form>
    </div>
</body>
</html>