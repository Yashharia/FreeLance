<!DOCTYPE html>
<html>
<head>
	<title>Eppareles</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Epparels</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link href="./css/style.css" rel="stylesheet">

	<title></title>
</head>
<body>
	<?php include 'header.php';?>

	<!--Image Slider-->
	<div class="container">

	<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/clothes2.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="./images/clothes3.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="./images/clothes2.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

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

				<div class="col-sm-1">
				</div>
<!--gird--><!--Right side-->
				<figure>
				<div class="col-sm-5">
					<a href="lookforjobs.php"><img class="center img-responsive" src="./images/mens.jpg"></a>
					<div class="carousel-caption">
					<h6 class="display-2">Freelancers</h6>
				</div>
				</div>
			</figure>
					<figure>
				<div class="col-sm-6">
					<a href="insert-product.php"><img class="center img-responsive" src="./images/womens.jpg" ></a>
					<div class="carousel-caption">
					<h6 class="display-2">Post offers</h6>
				</div>
			</div>
		</figure>
						
						
		</div>				
</div> 
					
				
			
		
	
</div><!--Epparels-conternt close-->
<!--Welcome -->



<!--div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Epparel</h1>
		</div>
		<hr>
		<div class="col-12"><p class="lead">Clothing Ecommerce</p></div>
	</div>
</div-->

<?php include 'footer.php';?>

</body>
</html>