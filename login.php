<?php  ob_flush(); ?>
<?php 
	include 'inc/header.php';
?>
<?php 
	$login_check = session::get('customer_login');
	if($login_check){
		header('location:index.php');
	}
		   
?>

<?php
    
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        

        $insertCustomer = $cs->insert_customer($_POST);
    }
?>
<?php
    
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        

        $loginCustomer = $cs->login_customer($_POST);
    }
?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<?php 
    						if(isset($loginCustomer)){
    							echo $loginCustomer;
    						}
    					?>
						<form method="POST" >
							<input name="Email" type="text" class="field" placeholder="Email">
                    		<input name="Password" type="password" class="field" placeholder="Password">
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							
							<button type="submit" name="login" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<?php 
    						if(isset($insertCustomer)){
    							echo $insertCustomer;
    						}
    					?>
						<form method="POST" action="#">
							<input type="text" name="Name" placeholder="Name" >
							<input type="text" name="City" placeholder="City">
							<input type="text" name="Zipcode" placeholder="Zip-Code">
							<input type="text" name="Email" placeholder="E-Mail">
							<input type="text" name="Address" placeholder="Address">
							<input type="text" name="Phone" placeholder="Phone">
							<input type="text" name="Password" placeholder="Password">
							<button type="submit" name="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php 
	include 'inc/footer.php';
?>
<?php  ob_flush(); ?>