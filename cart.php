
       
<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link href="./css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<title>Cart</title>
</head>
<body>		
	

	

	<body>
	<header>
		<?php
			include('header.php');
		?>
	</header>
	

<?php
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	if (!isset($_SESSION["cartshop"]) || count($_SESSION["cartshop"]) < 1) { 
		$_SESSION["cartshop"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		foreach ($_SESSION["cartshop"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  array_splice($_SESSION["cartshop"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  }
		      }
	       }
		   if ($wasFound == false) {
			   array_push($_SESSION["cartshop"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	
}
?>
<?php
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cartshop"]);
}
?>
<?php
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity);
	if ($quantity >= 11) { $quantity = 10; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cartshop"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  array_splice($_SESSION["cartshop"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  }
		      }
	}
}
?>
<?php
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cartshop"]) <= 1) {
		unset($_SESSION["cartshop"]);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		unset($_SESSION["cartshop"]["$key_to_remove"]);
		sort($_SESSION["cartshop"]);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
?>
    <div id="lowrbdy">
	  <div class="big-outer">
   		<p style="text-decoration:underline">Cart</p>
<table width="100%" border="0" style="border-collapse:collapse">
<?php
if(isset($_SESSION['cartshop'])==!NULL){
?>
 
<div class="container-fluid">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>

					</thead>
					
					<tbody>
<?php
}
?>
<?php 
$cartTotal = "";
if (!isset($_SESSION["cartshop"]) || count($_SESSION["cartshop"]) < 1) {
    echo '<div class="empty-cart"><h2 class="crta">Your Shopping Cart Is Empty</h2>';
	echo '<br><a href="index.php"><h2 class="alink">Continue Shopping</h2></a></div>';
} else {
$i = 0; 
    foreach ($_SESSION["cartshop"] as $each_item) { 
		$item_id = $each_item['item_id'];
		$sql = "SELECT * FROM product WHERE id='$item_id' LIMIT 1";
		$run=mysqli_query($link,$sql);
		while ($row = mysqli_fetch_array($run)) {
			$productname = $row["name"];
			$producttotalprice = $row["price"];
			$productcode = $row["id"];
			$pic=$row['img'];
			
			$pr=$row['price'];
		}
		$producttotalpricetotal = $producttotalprice * $each_item['quantity'];
		$cartTotal = $producttotalpricetotal + $cartTotal;?>


						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs">
										<?php echo'
										<img src="image/'.$pic.'"/>
										';?>
									</div>
									<div class="col-sm-10 ">
										<h3><?php echo $productname;?></h3>
										<p>High Quality Product.</p>
									</div>
								</div>
							</td>
							<td data-th="Price"><?php echo $producttotalprice;?></td>
			<form action="cart.php" method="post">
							<td data-th="Quantity">
								<?php echo'
								<input name="quantity" id="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" class="qnttxt"/></br>
								<input id="adjustBtn" name="adjustBtn' . $item_id . '" type="submit" value="Update" class="qntbtn"/>
								<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />';?>
		  
								
							</td>	
							</form>

							

							<td data-th="Subtotal" class="text-center"><?php echo number_format($producttotalprice*$each_item['quantity']);?></td>

							<td class="actions" data-th="">

			
<!--delelte-->
<?php echo'
<form action="cart.php" method="post">
			<input name="deleteBtn' . $item_id . '" type="submit" value="X" class="removebtn"/>
			<input name="index_to_remove" type="hidden" value="' . $i . '" />
        </form>';?>
        


													
							</td>
						</tr>
						<?php
							$i++;
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<td><a href="index.php" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong><?php echo number_format($cartTotal);?></strong></td>

							<form action="checkout.php" method="post">
							<td>
								<button type="submit" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button>
							</td>
							<input name="productname" type="hidden" value="<?php echo '$productname' ?>"/>
							<input name="cardTotal" type="hidden" value="<?php echo'$cardTotal'?>" />
						</form>


							<a href="clear.php"<button class="btn btn-danger">Delete All</button></a>							
						</tr>
					</tfoot>
				</table>
			
</div>
<?php }
		

		?>

	<?php include 'footer.php';?>

</body>
</html>