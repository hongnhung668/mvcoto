<?php 
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php 
	$login_check = session::get('customer_login');
	if($login_check==false){
		//header('location:login.php');
		echo '<a href="login.php"></a>';
	}
?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Company Name">
									<input type="text" placeholder="Email*">
									<input type="text" placeholder="Title">
									<input type="text" placeholder="First Name *">
									<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="password" placeholder="Confirm password">
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							
						</tr>
					</thead>
					<tbody>
						<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while ($result = $get_product_cart->fetch_assoc()) {
									
							?>
						<tr>
							<td class="cart_product">
								<img src="admin/upload/<?php echo $result['image']; ?>" alt="" style="width: 250px; height: 150px"/>
							</td>
							<td class="cart_description">
								<?php echo $result['productName']; ?>
							</td>
							<td class="cart_price">
								<?php echo $fm->format_currency($result['price'])." VNĐ"; ?>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="" method="post">
										<input type="hidden" name="cartID" value="<?php echo $result['cartID']; ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']; ?>" style="width: 50px"/>	
									</form>
								</div>
							</td>
							<td class="cart_total">
								<?php
									$total = $result['price'] * $result['quantity'];
									echo $fm->format_currency($total)." VNĐ";
								?>
							</td>
							
						</tr>
						<?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];

								}
							}
							?>

						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<?php
									$check_cart = $ct->check_cart();
									if($check_cart){
										
									?>
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td><?php 
									echo $fm->format_currency($subtotal)." VNĐ";
									session::set("sum",$subtotal);
									session::set("qty",$qty);
								 	?></td>
									</tr>
									<tr>
										<td>VAT</td>
										<td>10%</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span><?php 
									$vat = $subtotal * 0.1;
									$gtotal = $subtotal + $vat;
									echo $fm->format_currency($gtotal)." VNĐ";
									?></span></td>
									</tr>
								</table>
								<?php 
					}
					else{
						echo "<span style = 'color:red; font-size:20px'>you cart is empty! please shopping now</span>";
					}
					   ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div> 
	</section> <!--/#cart_items-->

	

<?php 
	include 'inc/footer.php';
?>