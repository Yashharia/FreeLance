
<?php include 'connection.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Epparels</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link href="./css/style.css" rel="stylesheet">
	<title>Delete Product</title>
</head>
<body>	
<header>
		<?php
			include('header.php');
		?>
	</header>	
	
 	 <?php
      if(isset($_SESSION['username'])){
      
  

    		
                ?>
    

	<body>
	




 <div class="container-fluid">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:60%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Delete</th>
							
							
						</tr>

					</thead>
					<?php
    				 $productquery= "select * from product";
    				 $productrun=mysqli_query($link,$productquery);

    				while($productrow=mysqli_fetch_array($productrun)){
    				@$productid=$productrow["id"];
    				$productname = $productrow["name"];
					$producttotalprice = $productrow["price"];
					$discription = $productrow["discription"];
					 $pic=$productrow['img'];
					
    				?>

					<tbody>
							<tr>
							<td data-th="Product">
								<div class="row">
								
									<div class='img-wrap'> 
									

                                    <?php echo"<img src='product-img/$pic' class='sm-thumbnail'>";?>

								</div>
									<div class="col-sm-10 ">
									<a href='b.php?product=<?php echo $productid;?>'><h3><?php echo $productname;?></h3></a>
										<p><?php echo $discription?></p>
									</div>
								</div>
							</td>
							<td data-th="Price"><?php echo $producttotalprice;?></td>
			<form action="cart.php" method="post">
								
							</form>


							

							<td class="actions" data-th="">

								 <!-- delete-->

			<form action="deleteproductfromtable.php?del=<?php echo @$productid?>" method="post">
			<input name="deleteBtn" type="submit" value="X" class="removebtn" >
			
		</form>

			
      

							</td>
						</tr>

					</tbody>
					<?php }
				}
			
				else{
					echo '<script>window.location="adminlogin.php"</script>';
				}
				
					?>
				</table>
			</div>
		</body>
		</html>