<?php
include('koneksi.php');
$nama= $_POST['nama'];
$username=$_POST['username'];
$pass=$_POST['password'];
mysqli_query($koneksi,"INSERT INTO pelanggan(nama,username,password) values('$nama','$username','$pass')");
header("location:index.php");
?>