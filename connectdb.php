<?php
// KONEKSI KE DATABASE
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "database_apotek";
$koneksi    = mysqli_connect($host, $user, $password, $database);

if(!$koneksi){
    echo "Database tidak terkoneksi";
}

//UNTUK WAJIB AUTHENTICATION SEBELUM MENGAKSES WEB
function login() {
    session_start();
    if(empty($_SESSION['email'])){
        header('location: login.php');
    }
}

?>

