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
<?php
	if(!isset($_GET['brandID']) || $_GET['brandID'] == NULL){
        //echo "<scrip>window.location = '404.php'</scrip>";
        
    }
    else{
        $id = $_GET['brandID'];
    } 
?>

<section>
 	<div class="container">
		<div class="row">
			<?php 
				include 'inc/asideleft.php';
			?>
				
			<div class="col-sm-9 padding-right">
				<div class="content_top">

    			<?php
	      			$namecat = $cat->get_name_by_cat($id);
	      			if($namecat){
	      				while ( $result_name = $namecat->fetch_assoc()) {			
	      		?>
    			<div class="heading">
    				<h3>Category: <?php echo $result_name['catName']; ?></h3>
    			</div>

    			<?php 
						}
	      			} 
	      			else{
	      				echo '<span style="color:red" >Category Not Avalable</span>';
	      			}
				?>	
	

		
				<?php
	      			$namebrand = $brand->get_name_by_brand($id);
	      			if($namebrand){
	      				while ( $result_namebr = $namebrand->fetch_assoc()) {		
	      		?>
    			<div class="heading">
    				<h3>Brand: <?php echo $result_namebr['brandName']; ?></h3>
    			</div>
    			<?php 
						}
	      			} 
	      			else{
	      			echo '<span style="color:red" >Brand Not Avalable</span>';
	      			}
				?>		

    			<div class="clear"></div>
    			</div>

	      		<div class="section group">
	      			<?php
	      				$productbycat = $cat->get_product_by_cat($id);
	      				if($productbycat){
	      					while ( $result = $productbycat->fetch_assoc()) {		  	
	      			?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
					 			<a href="details-3.php"><img src="admin/upload/<?php echo $result['image']; ?>" alt="" /></a>
					 			<h2><?php echo $result['productName']; ?></h2>
					 			<p><?php echo $fm->textShorten($result['product_desc'],50); ?></p>
					 			<p><span class="price"><?php echo $fm->format_currency($result['price'])." VNĐ"; ?></span></p>
				     			<div class="button"><span><a href="product-details.php?proID=<?php echo $result['productID'] ?>" class="details">Details</a></span></div>
							</div>
						</div>
					</div>
				</div>	
				<?php 
						}
	      			} 
				?>		
				
			
					<?php
	      				$productbybrand = $brand->get_product_by_brand($id);
	      				if($productbybrand){
	      					while ( $result_br = $productbybrand->fetch_assoc()) {		
	      			?>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
					 			<a href="details-3.php"><img src="admin/upload/<?php echo $result_br['image']; ?>" alt="" /></a>
					 			<h2><?php echo $result_br['productName']; ?></h2>
					 			<p><?php echo $fm->textShorten($result_br['product_desc'],50); ?></p>
					 			<p><span class="price"><?php echo $fm->format_currency($result_br['price'])." VNĐ"; ?></span></p>
				     			<div class="button"><span><a href="product-details.php?proID=<?php echo $result_br['productID'] ?>" class="details">Details</a></span></div>
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
		</div>
	</div>
</section>

<?php 
	include 'inc/footer.php';
?>