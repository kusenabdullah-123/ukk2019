<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="">
</head>
<body>

<?php 
// Start the session
session_start();
require '../koneksi.php';
$id_order=$_GET['id_order'];

?>
						

					<!-- start: page -->

							<form method="POST">
								<table class="table table-bordered table-striped mb-none" id="datatable-default" width="50%">
									<tr>
										<td colspan="6" align="center"><h2>Resto</h2></td>
									</tr>
									<tr>
										<td colspan="6" align="center">Smk Al-Azhar</td>
									</tr>
									
									<tr>
										<td colspan="6" align="center">=================================================</td>
									</tr>


										<tr>
											<th>NO</th>
											<th>Tanggal</th>
											<th>Jumlah</th>
											<th>Nama Masakan</th>
											<th>Harga</th>
											<th>Total</th>
	 										
   <tr>
   	<?php 
$no = 0;
$sql = "SELECT `order`.id_order,`order`.tanggal,`order`.keterangan, masakan.nama_masakan, `order`.total,detail_order.qty,masakan.harga,(masakan.harga*detail_order.qty) as total_bayar FROM `order` INNER join detail_order on `order`.id_order=detail_order.id_order INNER JOIN masakan on masakan.id_masakan=detail_order.id_masakan WHERE `order`.id_order = ".$_GET['id_order'];
$result = mysqli_query($koneksi, $sql);
 while($product = mysqli_fetch_object($result)) {
			$no++;
 ?>

    	
   		<td><?php echo $no;?></td>
		<td> <?php echo $product->tanggal; ?> </td>
		<td> <?php echo $product->qty; ?> </td>
		<td> <?php echo $product->nama_masakan; ?> </td>
		<td><?php echo $product->harga; ?></td>
		<td><?php echo $product->total; ?></td>
		
		
   </tr>
 	<?php } ?>
 	</tr>

 	<tr>
 		<td></td>
 	</tr>
 		<tr>
										<td colspan="6" align="center">Terima Kasih</td>
									</tr>
										<tr>
										<td colspan="6" align="center">=================================================</td>
									</tr>
							</table>
							</form>
							

<br>					
    
		
<script type="text/javascript">
	window.print();
</script>
	</body>
</html>
