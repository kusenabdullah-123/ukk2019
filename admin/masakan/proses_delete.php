<?php
	include "../koneksi.php";
	$id_masakan=$_GET['id_masakan'];
	$sql1 = "SELECT * FROM masakan WHERE id_masakan='$id_masakan'";
	$query1 = mysqli_query($koneksi,$sql1) or die (mysqli_error());
	$data = mysqli_fetch_array($query1);
	mysqli_query($koneksi,"DELETE FROM masakan WHERE id_masakan='$id_masakan'");
	$path = "uploads/".$data["gambar"];
 
	// cek jika ada file
	if(file_exists($path)){
 
		// gunakan fungsi php unlink
		unlink($path);
	}
	header('location:index.php');
?>