
<?php 
	include 'inc/header.php';
	//include 'inc/slider.php';
?>

<?php 
if(isset($_GET['cartid'])){
    $cartid = $_GET['cartid'];
    $delCart = $ct->del_product_cart($cartid);
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $cartID = $_POST['cartID'];
    	$quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->update_quantity_cart($quantity,$cartID);
        if($quantity <= 0){
        	$delCart = $ct->del_product_cart($cartID);
        }
    }
 ?>
 <?php 
 	if(!isset($_GET['id'])){
 		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
 	}
 ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
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
						<td class="image">Item</td>
						<td class="description">Name</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>

							<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while ($result = $get_product_cart->fetch_assoc()) {
									
							?>

							<tr>
								<td><img src="admin/upload/<?php echo $result['image']; ?>" alt="" style="width: 250px; height: 150px"/></td>
								<td><?php echo $result['productName']; ?></td>
								
								<td><?php echo $fm->format_currency($result['price'])." VNĐ"; ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartID" value="<?php echo $result['cartID']; ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']; ?>" style="width: 50px"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
									<?php
									$total = $result['price'] * $result['quantity'];
									echo $fm->format_currency($total)." VNĐ";
									?>
								</td>
								<td><a href="?cartid=<?php echo $result['cartID']; ?>">Xóa</a></td>
							</tr>
							
							<?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];

								}
							}
							?>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<?php
									$check_cart = $ct->check_cart();
									if($check_cart){
										
									?>
						<ul>
							<li>Cart Sub Total <span><?php 
									echo $fm->format_currency($subtotal)." VNĐ";
									session::set("sum",$subtotal);
									session::set("qty",$qty);
								 	?></span></li>
							<li>VAT <span>10%</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span><?php 
									$vat = $subtotal * 0.1;
									$gtotal = $subtotal + $vat;
									echo $fm->format_currency($gtotal)." VNĐ";
									?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
							<?php 
					}
					else{
						echo "<span style = 'color:red; font-size:20px'>you cart is empty! please shopping now</span>";
					}
					   ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

<?php 
	include 'inc/footer.php';
?>
