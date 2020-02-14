<?php
	include('../koneksi.php');
	$id_detail_order=$_GET['id_detail_order'];
	$id_order=
	$tanggal =$_POST['tanggal'];
	$keterangan=$_POST['keterangan'];
	$status_order=$_POST['status_order'];
 	mysqli_query($koneksi,"UPDATE `order` set tanggal='$tanggal' ,keterangan='$keterangan', status_order='$status_order' where id_detail_order='$id_detail_order'");
 	
	
	header('location:index.php');

?>