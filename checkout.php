<?php 
session_start();
require 'koneksi.php';
require 'item.php';

     $cart = unserialize(serialize($_SESSION['cart']));
 	 $s = 0;
 	 $index = 0;
 	for($i=0; $i<count($cart); $i++){
 		$s += $cart[$i]->harga * $cart[$i]->quantity;

// Save new orders
$sql1 = 'INSERT INTO `order` (tanggal,keterangan,status_order,total) VALUES ("'.date('Y-m-d').'","New Order","Success",'.$s.')';
}
mysqli_query($koneksi, $sql1);
$id_order = mysqli_insert_id($koneksi); 
// Save order details for new orders
$cart = unserialize(serialize($_SESSION['cart']));
for($i=0; $i<count($cart);$i++) {
	$q = $cart[$i]->quantity;
$sql2 = 'INSERT INTO detail_order (id_order,id_masakan,qty,keterangan,status_detail_order) VALUES ( '.$id_order.',
'.$cart[$i]->id_masakan.','.$q.',"New Order","Ready")';
mysqli_query($koneksi, $sql2);
}
// Clear all product in cart
unset($_SESSION['cart']);
 ?>
 Thanks for buying products. Click <a href="index2.php">here</a> to continue purchasing products.