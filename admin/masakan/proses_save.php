<?php
include "../koneksi.php";
$nama_masakan = $_POST['nama_masakan'];
$harga = $_POST['harga'];
$status_masakan = $_POST['status_masakan'];
$file_name= $_FILES['gambar']['name'];
$source= $_FILES['gambar']['tmp_name'];
$folder ="uploads/";
if(move_uploaded_file($source, $folder.$file_name)){
 $qry=mysqli_query($koneksi,"INSERT INTO masakan(nama_masakan,
 											harga,
 											status_masakan,gambar) 
 						VALUES 				
 											('$nama_masakan',
 											'$harga',
 											'$status_masakan',
 											'$file_name')");
 header('location:index.php');
}else{
	echo "gagal";
}
?>