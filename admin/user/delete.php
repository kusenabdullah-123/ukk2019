
<?php
	include "../koneksi.php";
	$id_pelanggan=$_GET['id_pelanggan'];
	mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
	header('location:datapelanggan.php');
?>