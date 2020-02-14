<!DOCTYPE html>
<head>
	<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="../../http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="../../assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="../../assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="../../assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="../../../assets/vendor/modernizr/modernizr.js"></script>
</head>
<body>
	

<?php 
// Start the session
session_start();
require '../../koneksi.php';
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
<section class="panel">
						<div class="panel-body">
							<div class="invoice">
								<div class="table-responsive">
									<form method="POST">
										<h2> Items in your cart: </h2>
									<table class="table invoice-items">
										<thead>
											<tr>
										<th>Option</th>
										<th>Id Masakan</th>
										<th>Nama</th>
										<th>Harga</th>
										<th>Jumlah</th>
	 
										<th>Total</th>
</tr>
										</thead>
										<?php 
     $cart = unserialize(serialize($_SESSION['cart']));
 	 $s = 0;
 	 $index = 0;
 	for($i=0; $i<count($cart); $i++){
 		$s += $cart[$i]->harga * $cart[$i]->quantity;
 ?>	
										<tbody>
											<tr>
    	<td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
   		<td> <?php echo $cart[$i]->id_masakan; ?> </td>
   		<td> <?php echo $cart[$i]->nama_masakan; ?> </td>
   		<td>Rp. <?php echo $cart[$i]->harga; ?> </td>
        <td> <input type="number" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]"> </td>  
        <td> Rp.<?php echo $cart[$i]->harga * $cart[$i]->quantity; ?> </td> 
   </tr>
   <?php 
	 	$index++;
 	} ?>
 	<tr>
 		<td colspan="5" style="text-align:right; font-weight:bold">Jumlah 
         <input id="saveimg" type="image" style="width: 20px; height: 20px;" src="images/save.png" name="update" alt="Save Button">
         <input type="hidden" name="update">
 		</td>
 		<td> Rp.<?php echo $s; ?> </td>
 	</tr>
										</tbody>
									</table>
								</div>
							
								<div class="invoice-summary">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table h5 text-dark">
												<tbody>
													<tr class="b-top-none">
														<td colspan="1">total</td>
														<td class="text-left">Rp.<?php echo $s; ?></td> 
													
													</tr>
											</table>
											<?php 
if(isset($_GET["id_masakan"]) || isset($_GET["index"])){
 header('Location: cart.php');
} 
?>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="text-right mr-lg">
								<a href="index.php" class="btn btn-default">Continue Shop</a>
								<a href="checkout.php" class="btn btn-default">Submit Invoice</a>
								<a href="" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
							</div>
						</div>
					</section>
<!-- Vendor -->
		<script src="../../assets/vendor/jquery/jquery.js"></script>
		<script src="../../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../../assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../../assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../../assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../../assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../../assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../../assets/javascripts/theme.init.js"></script>
</body>
 </html>
