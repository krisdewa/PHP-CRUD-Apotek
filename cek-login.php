<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'connectdb.php';

// menangkap data yang dikirim dari form login
// $email = $_POST['email'];
// $password = md5($_POST['password']);

// With Filter 
$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
$password = filter_var(md5($_POST['password']), FILTER_SANITIZE_STRING);

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="kepala"){

		// buat session login dan username
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "kepala";
		// alihkan ke halaman dashboard admin
		header("location:halaman-kepala.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="staff"){
		// buat session login dan username
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "staff";
		// alihkan ke halaman dashboard pegawai
		header("location:halaman-staff.php");

	}else if($data['level']=="pelanggan"){
		// buat session login dan username
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "pelanggan";
		// alihkan ke halaman dashboard pegawai
		header("location:pembelian/index.php");

	}else{
		// alihkan ke halaman login kembali
		// echo("")

		echo "<script> alert('Email atau password anda salah !!!'); </script>";
		echo "<script> location='login.php'; </script>";
	}

}else{
	echo "<script> alert('Email atau password anda salah !!!'); </script>";
	echo "<script> location='login.php'; </script>";
}



?>