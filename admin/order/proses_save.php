<?php
include "../koneksi.php";
$id_order = $_POST['id_order'];
$keterangan = $_POST['keterangan'];
$status_order = $_POST['status_order'];
mysqli_query($koneksi,"INSERT INTO `order`(id_order,keterangan,status_order) VALUES('$id_order','$keterangan','$status_order')");
   header('location:index.php');
?>