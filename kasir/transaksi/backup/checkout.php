<?php 
session_start();
require '../../koneksi.php';
require 'item.php';

// Save new orders
$sql1 = 'INSERT INTO `order` (tanggal,keterangan,status_order) VALUES ("'.date('Y-m-d').'","New Order","Success")';
mysqli_query($koneksi, $sql1);
$id_order = mysqli_insert_id($koneksi); 
// Save order details for new orders
$cart = unserialize(serialize($_SESSION['cart']));
for($i=0; $i<count($cart);$i++) {
$sql2 = 'INSERT INTO detail_order (id_order,id_masakan,keterangan,status_detail_order) VALUES ( '.$id_order.',
'.$cart[$i]->id_masakan.',"New Order","Ready")';
mysqli_query($koneksi, $sql2);
}
// Clear all product in cart
unset($_SESSION['cart']);
 ?>
 Thanks for buying products. Click <a href="index.php">here</a> to continue purchasing products.