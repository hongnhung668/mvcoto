<?php 
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php 
//if(isset($_GET['cartid'])){
//    $cartid = $_GET['cartid'];
//    $delCart = $ct->del_product_cart($cartid);
//}
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
				<li class="active">Compare Product</li>
			</ol>
		</div>

		<?php 
			if(isset($update_quantity_cart)){
			    echo $update_quantity_cart;
			}
		?>
		<?php 
			if(isset($delCart)){
			    echo $delCart;
			}
		?>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">		
				<tr class="cart_menu">
					<td>ID Compare</td>
					<td class="image">Item</td>
					<td class="description">Product Name</td>
					<td class="price">Price</td>
					<td>Action</td>
				</tr>

				<?php
					$customer_id = session::get('customer_id');
					$get_compare = $product->get_compare($customer_id);
					if($get_compare){
						$i=0;
						while ($result = $get_compare->fetch_assoc()) {
							$i++;
				?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><img src="admin/upload/<?php echo $result['image']; ?>" alt="" style="width: 250px; height: 150px"/></td>
					<td><?php echo $fm->format_currency($result['price']); ?></td>
					<td><a href="product-details.php?proID=<?php echo $result['productID']; ?>">View</a></td>
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