<?php
	include "../koneksi.php";
	$id_order=$_GET['id_order'];
	mysqli_query($koneksi,"DELETE FROM `order` WHERE id_order='$id_order'");
	header('location:index.php');
?>