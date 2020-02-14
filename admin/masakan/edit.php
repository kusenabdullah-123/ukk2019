<?php
	include('../koneksi.php');
	$id_masakan=$_GET['id_masakan'];
	$nama_masakan=$_POST['nama_masakan'];
	$harga=$_POST['harga'];
	$status_masakan=$_POST['status_masakan'];
	$file_name=$_FILES['gambar']['name'];
	$source= $_FILES['gambar']['tmp_name'];
	$folder ="uploads/";
	$sql1 = "SELECT * FROM masakan WHERE id_masakan='$id_masakan'";
	$query1 = mysqli_query($koneksi,$sql1) or die (mysqli_error());
	$data = mysqli_fetch_array($query1);
 if(isset($_POST['ganti'])){
 	move_uploaded_file($source, $folder.$file_name);
	mysqli_query($koneksi,"UPDATE masakan set nama_masakan='$nama_masakan', harga='$harga', status_masakan='$status_masakan',gambar='$file_name' where id_masakan='$id_masakan'");
	$path = "uploads/".$data["gambar"];
 
	// cek jika ada file
	if(file_exists($path)){
 
		// gunakan fungsi php unlink
		unlink($path);
}
 }else{
 	mysqli_query($koneksi,"UPDATE masakan set nama_masakan='$nama_masakan', harga='$harga', status_masakan='$status_masakan' where id_masakan='$id_masakan'");
 } 
	
	
	header('location:index.php');
//}else{
	//move_uploaded_file($source, $folder.$file_name);
	//mysqli_query($koneksi,"UPDATE masakan set nama_masakan='$nama_masakan', harga='$harga', status_masakan='$status_masakan',gambar='$file_name' where id_masakan='$id_masakan'");
//	header('location:Dashboard.php');
//}	

?>