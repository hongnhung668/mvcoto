<?php 
	include 'inc/header.php';
	//include 'inc/slider.php';
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
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
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
										<img src="admin/upload/<?php echo $result_new['image']; ?>" alt="" />
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
						
						<div>
						<ul class="pagination">
							<?php
		      		$product_all = $product->get_all_product();
		      		$product_count = mysqli_num_rows($product_all);
		      		$product_button = ceil($product_count/9);
		      		$i = 1;
		      		echo "<p>Trang: </p>";
		      		for($i=1; $i<=$product_button; $i++){
		      			echo '<li><a href="shop.php?trang='.$i.'">'.$i.'</a></li>';
		      			
		      		}				
		      	?>
							<li><a href="">&raquo;</a></li>
						</ul>
						</div>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
<?php 
	include 'inc/footer.php';
?>