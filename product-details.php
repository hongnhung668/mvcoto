<?php 
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
	 if(!isset($_GET['proID']) || $_GET['proID'] == NULL){
        //echo "<scrip>window.location = '404.php'</scrip>";
      
    }
    else{
        $id = $_GET['proID'];
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        
    	$quantity = $_POST['quantity'];
        $addtocart = $ct->add_to_cart($quantity,$id);
    }
    $customer_id = session::get('customer_id');
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist'])) {
        
    	$productID = $_POST['productID'];
        $insertWlist = $product->insertWlist($productID,$customer_id);
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compare'])) {
        
    	$productID = $_POST['productID'];
        $insertCompare = $product->insertCompare($productID,$customer_id);
    }
    if(isset($_POST['binhluan_submit'])){
    	$binhluan = $cs->insert_binhluan();
    }
?>
	<section>
		<div class="container">
			<div class="row">
				<?php 
					include 'inc/asideleft.php';
				?>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<?php
    						$get_product_details = $product->get_details($id);
    						if($get_product_details){
    							while ($result_details = $get_product_details->fetch_assoc()) {
    					?>
						<div class="col-sm-5">
							<div class="view-product" >
								<img src="admin/upload/<?php echo $result_details['image']; ?>" alt="" style="height: 250px" />
								<h3>ZOOM</h3>
							</div>
							<div class="choose">
								<form method="POST">
									<ul class="nav nav-pills nav-justified">
										<li>
											<input type="hidden" class="buysubmit" name="productID" value="<?php echo $result_details['productID'] ?>"/>
								
											<?php 
								   				$login_check = session::get('customer_login');
								   				if($login_check==false){
								   					echo '';
								   				}
								   				else{
								   					echo '<input type="submit" class="buysubmit" name="compare" value="Save to compare"/>';
								   				}
												?>	
										</li>

										<li>
											<input type="hidden" class="buysubmit" name="productID" value="<?php echo $result_details['productID'] ?>"/>
								
											<?php 
								   				$login_check = session::get('customer_login');
								   				if($login_check==false){
								   					echo '';
								   				}
								   				else{
								   					echo '<input type="submit" class="buysubmit" name="wishlist" value="Save to wishlist"/>';
								   				}
											?>
										</li>
										<p>
								<?php 
					    			if(isset($insertCompare)){
					    			echo $insertCompare;
					    			}
					    		?>
					    	</p>
					    	<p>
					    		<?php 
					    			if(isset($insertWlist)){
					    			echo $insertWlist;
					    			}
					    		?>
					    	</p>
									</ul>
								</form>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										<?php 
											$getLastestAudi = $product->getLastestAudi();
											if($getLastestAudi){
												while ($resultaudi = $getLastestAudi->fetch_assoc()) {
										?>		
										<img src="admin/upload/<?php echo $resultaudi['image']; ?>" style="width: 83px; height: 84px" />	 
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
										<img src="admin/upload/<?php echo $resultbmw['image']; ?>" style="width: 83px; height: 84px" />
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
										<img src="admin/upload/<?php echo $resultJaguar['image']; ?>" style="width: 83px; height: 84px" />
										<?php 
			   									}
											}
			   							?>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $result_details['productName']; ?></h2>
								<p><b>ID:</b> <?php echo $result_details['productID']; ?></p>
								<p><img src="images/product-details/rating.png" alt="" /></p>
								<span>
									<span><?php echo $fm->format_currency($result_details['price'])." VNĐ"; ?></span>
									
									<form action="" method="post">
								<input type="number" class="buyfield" name="quantity" value="1" min="1" />
								<input type="submit" class="buysubmit" name="submit" value="Buy Now" style="width: 100px" /><br>
								<?php
								if(isset($addtocart)){
									echo '<span style = "color:red; font-size:20px">Product already added</span>';
								}
								?>
							</form>		
								</span>
								<p><b>Category:</b> <?php echo $result_details['catName']; ?></p>
								<p><b>Brand:</b> <?php echo $result_details['brandName']; ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
						<?php
			  		}
	    		}
	    	?>
					</div><!--/product-details-->


					
					
					
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
					
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-9">
								<h2>Leave a replay</h2>
								<?php
 					if(isset($binhluan)) {
 						echo $binhluan;
 					}
 					?>
								<form method="POST">
									<p><input type="hidden" name="product_id_binhluan" value="<?php echo $id ?>"></p>
									<div class="blank-arrow">
										<label>Your Name</label>

									</div>
									<span>*</span>

									<input type="text" name="tennguoibinhluan" placeholder="write your name...">
									
									<div class="blank-arrow">
										<label>Comment</label>
									</div>
									<span>*</span>
									<textarea name="binhluan" rows="11" placeholder="Bình luận"></textarea>
									<input type="submit" class="btn btn-primary" name="binhluan_submit" value="POST COMMENT"/>
								
								</form>
							</div>
							
						</div>
					</div><!--/Repaly Box-->


				</div>
			</div>
		</div>
	</section>
	
<?php 
	include 'inc/footer.php';
?>