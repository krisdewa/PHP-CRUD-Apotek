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
        <div class="tab">
            <table class="table-tab">
                <thead>
                    <tr>
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
        </div>
</body>
</html>