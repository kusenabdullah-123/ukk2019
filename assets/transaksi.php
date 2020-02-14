<?php
require'../koneksi.php';
$sql= "INSERT INTO transaksi(id_order,tanggal,total_bayar)VALUES('11','2019-04-04','20000')";
mysqli_query($koneksi,$sql);
?>