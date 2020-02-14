<?php
	include "../koneksi.php";
	$id_detail_order=$_GET['id_detail_order'];
	mysqli_query($koneksi,"DELETE FROM `detail_order` WHERE id_detail_order='$id_detail_order'");
	header('location:index.php');
?>