<?php include 'connection.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<meta charset="utf-8">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link href="./css/style.css" rel="stylesheet">
	
	
	
	<link href="./css/style.css" rel="stylesheet">

	<title></title>
</head>
<body>
	<?php include 'header.php';?>
	


	<!--Image Slider-->
	
	<div id="slides" class="carousel slide" data-ride=carousel>
		<ul class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
			<li data-target="#slides" data-slide-to="2"></li>
		</ul>
		
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="./images/clothes2.jpg">

				<div class="carousel-caption">
					<h1 class="display-2">Epparels</h1>
					<h3>Trending</h3>
					<button type="button" class="btn btn-primary btn-lg">Buy Now</button>
				</div>
			</div>
			<div class="carousel-item">
				<img src="./images/clothes2.jpg">
			</div>
			<div class="carousel-item">
				<img src="./images/clothes2.jpg">
			</div>
		</div>
	</div>



<!--JumboTron
<div class="container-fluid">
	<div class="row-jumbotron">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
			<p class="lead">this is a jumbo tron just trying out bootstrap</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
			<a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">Log in</button></a>
		</div>
	</div>
</div>-->



<!--Content-->
<div class="Epparels-content">
	<div class="container-fluid">
		<div class="row">
			
		





				<div class="col-lg">
					<div class="row">

						<?php 

							$q="select * from product where cat='Job'";
							$run=mysqli_query($link,$q);
							while($row=mysqli_fetch_array($run))
							{
								$id=$row['id'];
								$name=$row['name'];
								$img=$row['img'];
								$price=$row['price'];

							

						?>
						<div class="col-md-3"><?php
							echo "<figure class='card card-product'>
								<div class='img-wrap'> 
									<img src='product-img/$img'>
									
								</div>";?>
								<figcaption class='info-wrap'>
									<?php echo"<h6 class='title text-dots'><a href='#'>$name</a></h6>";?>
									<div class='action-wrap'>
										<a href='b.php?product=<?php echo $id;?>' class='btn btn-primary btn-sm float-right'> Order </a>
										<div class='price-wrap h6'>
											<?php echo"<span class='price-new'>$price</span>";?>
											<!--<del class='price-old'>$1980</del>-->
										</div> <!-- price-wrap.// -->
									</div> <!-- action-wrap -->
								</figcaption>
							</figure> <!-- card // -->
						</div> <!-- col // -->
					<?php
				}

				?>	
</div> 
					
				</div>
			</div>
		
	</div>
</div><!--Epparels-conternt close-->
<!--Welcome -->



<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Clothes</h1>
		</div>
		<hr>
		<div class="col-12"><p class="lead">Welcome to my website</p></div>
	</div>
</div>

<?php include 'footer.php';?>

</body>
</html>