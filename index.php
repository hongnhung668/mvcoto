<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<?php 
	if(!isset($_GET['catID']) || $_GET['catID'] == NULL){
        //echo "<scrip>window.location = '404.php'</scrip>";
       
    }
    else{
        $id = $_GET['catID'];
    }
    //if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //    $catName = $_POST['catName'];
    //    $updateCat = $cat->update_category($catName,$id);
    //}
    
?>
	<section>
		<div class="container">
			<div class="row">
				<?php 
					include 'inc/asideleft.php';
				?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php
	      					$product_new = $product->getproduct_new();
	      					if($product_new){
	      						while ($result_new = $product_new->fetch_assoc()) {	
	      				?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="admin/upload/<?php echo $result_new['image']; ?>" alt=""/>
											<h2><?php echo $fm->format_currency($result_new['price'])." VNĐ"; ?></h2>
											<p><?php echo $result_new['productName']; ?> </p>
											 <div class="button"><span><a href="product-details.php?proID=<?php echo $result_new['productID'] ?>" class="btn btn-default add-to-cart">Details</a></span></div>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo $fm->format_currency($result_new['price'])." VNĐ"; ?></h2>
												<p><?php echo $result_new['productName']; ?> </p>
												 <div class="button"><span><a href="product-details.php?proID=<?php echo $result_new['productID'] ?>" class="btn btn-default add-to-cart">Details</a></span></div>
											</div>
										</div>
								</div>
								
							</div>
						</div>
						<?php
							}
	      				}
						?>	
					</div><!--features_items-->
				
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								<?php 
									$getLastestAudi = $product->getLastestAudi();
									if($getLastestAudi){
										while ($resultaudi = $getLastestAudi->fetch_assoc()) {
								?>	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/upload/<?php echo $resultaudi['image']; ?>" />
													<h2><?php echo $fm->format_currency($resultaudi['price'])." VNĐ"; ?></h2>
													<p><?php echo $resultaudi['productName']; ?></p>
													<a href="product-details.php?proID=<?php echo $resultaudi['productID'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>	
											</div>
										</div>
									</div>
								<?php 
			   							}
									}
			   					?>
								</div>


								<div class="item">	
								<?php 
									$getLastestBMW = $product->getLastestBMW();
									if($getLastestBMW){
										while ($resultbmw = $getLastestBMW->fetch_assoc()) {		
								?>	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/upload/<?php echo $resultbmw['image']; ?>" />
													<h2><?php echo $fm->format_currency($resultbmw['price'])." VNĐ"; ?></h2>
													<p><?php echo $resultbmw['productName']; ?></p>
													<a href="product-details.php?proID=<?php echo $resultbmw['productID'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								<?php 
			   							}
									}
			   					?>
								</div>

								<div class="item">	
								<?php 
									$getLastestJaguar = $product->getLastestJaguar();
									if($getLastestJaguar){
										while ($resultJaguar = $getLastestJaguar->fetch_assoc()) {
								?>	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="admin/upload/<?php echo $resultJaguar['image']; ?>" />
													<h2><?php echo $fm->format_currency($resultJaguar['price'])." VNĐ"; ?></h2>
													<p><?php echo $resultJaguar['productName']; ?></p>
													<a href="product-details.php?proID=<?php echo $resultJaguar['productID'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								<?php 
			   							}
									}
			  					?>
								</div>

							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php 
	include 'inc/footer.php';
?>