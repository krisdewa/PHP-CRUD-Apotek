<?php
    include_once("connectdb.php");
    // login();
    
    $sql_get = "SELECT * FROM barang";
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
    <title>Barang</title>
    <link rel="stylesheet" href="css/style_tab.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
        <div class="tab">
            <table class="table-tab">
                <thead>
                    <tr>
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
                            <a class="btn btn-warning" href="edit_barang.php?ID_Barang=<?=$result['ID_Barang'];?>"><i class="bi bi-pencil"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="hapus_barang.php?ID_Barang=<?=$result['ID_Barang'];?>"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>

                </tbody>

                <?php
                    $no++;
                    endforeach;
                ?>

            </table>
        </div>
</body>
</html>