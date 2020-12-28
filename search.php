<?php 
	include 'inc/header.php';
	//include 'inc/slider.php';
?>


	<section>
 		<div class="container">
			<div class="row">
    			<?php 
					include 'inc/asideleft.php';
				?>
    	
    			<?php 
			    	if($_SERVER['REQUEST_METHOD'] === 'POST') {
			        	$tukhoa = $_POST['tukhoa'];
			        	$searchProduct = $product->search_product($tukhoa);
			    	}
				?>

    			<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
    	
	      				<?php
	      					if($searchProduct){
	      						while ( $result = $searchProduct->fetch_assoc()) {			
	      				?>

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
					 					<a href="details-3.php"><img src="admin/upload/<?php echo $result['image']; ?>" alt="" /></a>
					 					<h2><?php echo $result['productName']; ?></h2>
										<p><?php echo $fm->textShorten($result['product_desc'],50); ?></p>
					 					<p><span class="price"><?php echo $fm->format_currency($result['price'])." VNĐ"; ?></span></p>
				     					<div class="button"><span><a href="details.php?proID=<?php echo $result['productID'] ?>" class="details">Details</a></span></div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php 
							}
	      				} 
						?>		
					</div>
				</div>
    		</div>
 		</div>
	</section>

<?php 
	include 'inc/footer.php';
?>