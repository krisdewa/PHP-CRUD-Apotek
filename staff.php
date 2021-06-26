<?php
    include_once("connectdb.php");
    // login();
    
    $sql_get = "SELECT * FROM staff";
    $query_staff = mysqli_query($koneksi, $sql_get);

    $results = [];

    while($row = mysqli_fetch_assoc($query_staff)) {
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
            <table class="table-tab">
                <thead>
                    <tr>
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
                            <a class="btn btn-warning" href="edit_staff.php?ID_Pegawai=<?=$result['ID_Pegawai'];?>"><i class="bi bi-pencil"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="hapus_staff.php?ID_Pegawai=<?=$result['ID_Pegawai'];?>"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>

                </tbody>

                <?php
                    $no++;
                    endforeach;
                ?>

            </table>
        </div>
    </div>
</body>
</html>