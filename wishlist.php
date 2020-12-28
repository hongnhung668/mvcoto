<?php 
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php 
if(isset($_GET['proID'])){
	$customer_id = session::get('customer_id');
   	$proID = $_GET['proID'];
    $delWlist = $product->del_wlist($proID, $customer_id);
}
//if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
//       $cartID = $_POST['cartID'];
//    	$quantity = $_POST['quantity'];
//        $update_quantity_cart = $ct->update_quantity_cart($quantity,$cartID);
//        if($quantity <= 0){
//        	$delCart = $ct->del_product_cart($cartID);
//        }
//    }
 ?>
 <?php 
// 	if(!isset($_GET['id'])){
//		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
// 	}
 ?>
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Wishlist Product</li>
			</ol>
		</div>

		<div class="table-responsive cart_info">
			<table class="table table-condensed">		
				<tr class="cart_menu">
					<td>ID Wishlist</td>
					<td class="image">Item</td>
					<td class="description">Product Name</td>
					<td class="price">Price</td>
					<td>Action</td>
				</tr>

				<?php
					$customer_id = session::get('customer_id');
					$get_wlist = $product->get_wlist($customer_id);
					if($get_wlist){
						$i=0;
						while ($result = $get_wlist->fetch_assoc()) {
							$i++;
				?>

				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><img src="admin/upload/<?php echo $result['image']; ?>" alt="" style="width: 250px; height: 150px"/></td>
					<td><?php echo $fm->format_currency($result['price'])." VNĐ"; ?></td>			
					<td>
						<a href="?proID=<?php echo $result['productID']; ?>">Remove</a> ||
						<a href="product-details.php?proID=<?php echo $result['productID']; ?>">Buy Now</a>
					</td>
				</tr>
							
				<?php

						}
					}
				?>
								
			</table>
  
		</div>

		<div class="shopping">
			<div class="shopleft">
				<a href="index.php"> <img src="images/shop.png" alt="" /></a>
			</div>
		</div>

    </div>  	     
</section>

<?php 
	include 'inc/footer.php';
?>