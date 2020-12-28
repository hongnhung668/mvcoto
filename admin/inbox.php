<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/cart.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	$ct = new cart();
 	if(isset($_GET['shipid'])){
	    $id = $_GET['shipid'];
	    $time = $_GET['time'];
	    $price = $_GET['price'];
	    $shipped = $ct->shipped($id, $time, $price);

    }   
?>
<?php 
	$ct = new cart();
 	if(isset($_GET['delid'])){
	    $id = $_GET['delid'];
	    $time = $_GET['time'];
	    $price = $_GET['price'];
	    $delShipped = $ct->del_shipped($id, $time, $price);

    }   
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                
                <div class="block"> 
                <?php 
                if(isset($shipped)){
                	echo $shipped;
                }
                ?>  
                <?php 
                if(isset($delShipped)){
                	echo $delShipped;
                }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer ID</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$fm = new Format();
						$ct = new cart();
						$get_inbox_cart = $ct->get_inbox_cart();
						$i=0;
						if($get_inbox_cart){
							while($result = $get_inbox_cart->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $fm->formatDate($result['date_order']) ?></td>
							<td><?php echo $result['productName'] ?></td>
							<td><?php echo $result['quantity'] ?></td>
							<td><?php echo $result['price'].' VNĐ' ?></td>
							<td><?php echo $result['customerID'] ?></td>
							<td>
								<a href="customer.php?customerid=<?php echo $result['customerID'] ?>">Vew Customer</a>
							</td>
							<td>
								<?php
									if($result['status']=="0"){
								?>

									<a href="?shipid=<?php echo $result['ID'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Pending</a>

								<?php
									} 
									elseif($result['status']=="1"){		
										echo "Shipped";
									}
									else{
								?>
									<a href="?delid=<?php echo $result['ID'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Remove</a>

								<?php
									}
								?>
								
							</td>
						</tr>
						<?php 

							}
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
