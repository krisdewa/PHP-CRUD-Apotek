<?php


function query($query) {
    // global $conn;
    // $result = mysqli_query($conn, $query);
    // $rows = [];
    // while($produk = mysqli_fetch_assoc($result)) {
    //     $rows[] = $produk;
    // }
    // return $rows;
}

function cari($keyword) {
    $query = "SELECT * FROM barang
                WHERE
              nama = '$keyword'
            ";
    return query($query);
}

?>