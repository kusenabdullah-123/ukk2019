<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from pelanggan where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
	// cek jika user login sebagai admin

		// buat session login dan username
		$_SESSION['username'] = $username;
		// alihkan ke halaman dashboard admin
		header("location:index2.php");

	// cek jika user login sebagai pegawai
}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	



?>