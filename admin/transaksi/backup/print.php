<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="">
</head>
<body>

<?php 
// Start the session
session_start();
require '../koneksi.php';
require 'item.php';

if(isset($_GET['id_masakan']) && !isset($_POST['update']))  { 
	$sql = "SELECT * FROM masakan WHERE id_masakan=".$_GET['id_masakan'];
	$result = mysqli_query($koneksi, $sql);
	$product = mysqli_fetch_object($result); 
	$item = new Item();
	$item->id_masakan = $product->id_masakan;
	$item->nama_masakan = $product->nama_masakan;
	$item->harga = $product->harga;
    $iteminstock = $product->quantity;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id_masakan == $_GET['id_masakan']){
			$index = $i;
			break;
		}
		if($index == -1) 
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {
			
			if (($cart[$index]->quantity) < $iteminstock)
				 $cart[$index]->quantity ++;
			     $_SESSION['cart'] = $cart;
		}
}
// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Update quantity in cart
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
?>
						

					<!-- start: page -->

							<form method="POST">
								<table class="table table-bordered table-striped mb-none" id="datatable-default" width="50%">
									<tr>
										<td colspan="3" align="center"><h2>Resto</h2></td>
									</tr>
									<tr>
										<td colspan="3" align="center">Smk Al-Azhar</td>
									</tr>
									<tr>
										<td colspan="3" align="center">============================================</td>
									</tr>

										<tr>
											<th align="left">Nama Masakan</th>
											<th align="left">Harga</th>
											<th align="left">Jumlah</th>
											<th align="left">Total</th>
	 										<?php 
     $cart = unserialize(serialize($_SESSION['cart']));
 	 $s = 0;
 	 $index = 0;
 	for($i=0; $i<count($cart); $i++){
 		$s += $cart[$i]->harga * $cart[$i]->quantity;
 ?>	
   <tr>
    	
   		<td> <?php echo $cart[$i]->nama_masakan; ?> </td>
   		<td>Rp. <?php echo $cart[$i]->harga; ?></td> 
   		<td><?php echo $cart[$i]->quantity; ?></td>
   		 <td> Rp.<?php echo $cart[$i]->harga * $cart[$i]->quantity; ?> </td> 
   </tr>
 	<?php 
	 	$index++;
 	} ?>
 	</tr>

 	<tr>
 		<td colspan="3" style="text-align:left; font-weight:bold">
         Total Bayar
 		</td>
 		<td> Rp.<?php echo $s; ?> </td>
 	</tr>
 		<tr>
										<td colspan="3" align="center">Makanan Dilarang Dikembalikan</td>
									</tr>
										<tr>
										<td colspan="3" align="center">============================================</td>
									</tr>
							</table>
							</form>
							

<br>					
    
		
<script type="text/javascript">
	window.print();
</script>
	</body>
</html>
