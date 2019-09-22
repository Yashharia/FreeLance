<?php include'connection.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Product</title>
</head>
<?php include 'header.php';?>

	<body id="LoginForm">
		
           
 </form>
	
		
 	 <?php
      if(isset($_SESSION['username'])){
      $q="select * from users";
    	$run=mysqli_query($link,$q);
    	while($row=mysqli_fetch_array($run)){
    # code...
      echo $u=$row['id'];
  

    		if ($_SESSION['username']==$u ) {?>
		
	
	<div class="container padding">
        
        	<div class="panel text-center">
        		<div class="panel-heading">
        			<h3> Insert Product</h3>
			 			</div>
			 			
			 			
			    		<form action="" role="form" method="post" enctype="multipart/form-data">
			    				
			    					<h6>Name:</h6>
									<div class="form-group">
			                			<input type="text" name="name"  placeholder="Name" required="required">

			                						<input type="file" name="file_img" vaue="file_img"/>
			    					
			    				</div>

								<h6>Category</h6>
								

			    			
			    					<div class="form-group">

			    						<select name="cat" placeholder="cat" required="required">
			    							<option name="Mens">Freelancer</option>
			    							<option name="Womens">Job</option>
			    						</select>

			    					</div>
			    						<div class="form-group">	
			    							

			    							<select name="category"  placeholder="Category" required="required">
			    					
			    							<option>developer</option>
			    						
			    							<option>editor</option>
			    							<option>writer</option>
			    							<option>logo designer</option>
			    							<option>artist</option>
			    							<option>videographer</option>
			    						</select>
									
										
			    					</div>
			    		

									<h6>Discription:</h6>
									<div class="form-group">
			                			<input type="text" name="discription"  placeholder="discription" required="required">
			    					
			    				</div>
			    				
			    					
			    			
			    				
			    				
			    					<div class="form-group"><h6>Price</h6>
			    						<input type="text" name="price" placeholder="Price" required="required">
			    					
			    				</div>
			    				
			    		
			    			
			    			<input type="submit" name="submit-product" value="Submit" class="btn btn-info btn-block">
			    		
                        </form>
                        <a href="deleteproduct.php" type="submit" value="Delete Products" class="btn btn-danger">Delete Products</a></button>

                        <?php 
					}
				}
}

                        else{
							echo'
        <script>
			window.location="login.php";
        </script>
';
                        	echo "invalid username/password";
                        }
                    
                        ?>


                            <?php
							if (isset($_POST['submit-product'])) {
									$name=$_POST['name'];
									$category=$_POST['category'];
									$cat=$_POST['cat'];
									$price=$_POST['price'];
									$discription=$_POST['discription'];
									
									
									
									$image_tmp=$_FILES['file_img']['tmp_name'];
									$image=$_FILES['file_img']['name'];
									$filetype=$_FILES["file_img"]["type"];
									$imagepath="product-img/".$image;
									move_uploaded_file($image_tmp,$imagepath);

									if(mysqli_query($link,"insert into product(name,category,img,price,cat,discription) value('$name','$category','$image','$price','$cat','$discription')"))
									{
										echo "<script>alert('Data saved')</script>";
									}   
									else 
									{
									    echo "<script>alert('Data not saved')</script>";                          	# code...
									}                              
								    }                         
							?>                     
</div>
                 </div>

</div>
         </div>
              </div>

              <?php include 'footer.php';?>
                  

</body>
</html>