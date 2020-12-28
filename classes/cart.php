<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	  * 
	  */
	class cart
	{
	 	private $db;
	 	private $fm;
	 	
	 	public function __construct(){
	 	
	 		$this->db = new Database();
	 		$this->fm = new Format();
	 	}
	 	public function add_to_cart($quantity,$id){
	 		$quantity = $this->fm->validation($quantity);
	 		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
	 		$id = mysqli_real_escape_string($this->db->link, $id);
	 		$sid = session_id();

	 		$query = "SELECT * FROM product where productID = '$id'";
	 		$result = $this->db->select($query)->fetch_assoc();
	 		
	 		$image = $result['image'];
	 		$price = $result['price'];
	 		$productName = $result['productName'];

	 		$checkcart = "SELECT * FROM cart where productID = '$id' and sID = '$sid'";
	 		$check_cart = $this->db->select($checkcart);
	 		if($check_cart){
	 			$msg = '<span style = "color:red; font-size:20px">Product already added</span>';
	 			return $msg;
	 		}
	 		else{
		 		$query_insert = "INSERT INTO cart(productID,sID,productName,price,quantity,image) values('$id','$sid','$productName','$price','$quantity','$image')";
		 		$insert_cart = $this ->db->insert($query_insert);
		 		if($insert_cart){
		 		//	header('location: cart.php');
		 			echo '<span style = "color:green; font-size:20px">Add cart susuccessfully</span>';
		 		}
		 		else{
		 			header('location: 404.php');
		 		}
		 	}
	 	}
	 	public function get_product_cart(){
	 		$sid = session_id();
	 		$query = "SELECT * FROM cart where sID = '$sid'";
	 		$result = $this->db->select($query);
	 		return $result;
	 	}
	 	public function update_quantity_cart($quantity,$cartID){
	 		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
	 		$cartID = mysqli_real_escape_string($this->db->link, $cartID);
	 		$query = "UPDATE cart
	 				set quantity = '$quantity'
	 				where cartID = '$cartID' ";
	 		$result = $this->db->update($query);
	 		if($result){
	 			$msg = '<span style = "color:green; font-size:20px"> Product quantity updated successfully</span>';
	 			return $msg;
	 		}
	 		else{
	 			$msg = '<span style = "color:red; font-size:20px"> Product quantity updated not success</span>';
	 			return $msg;
	 		}
	 	}
	 	public function del_product_cart($cartid){
	 		$cartid = mysqli_real_escape_string($this->db->link, $cartid);
	 		$query = "DELETE FROM cart where cartID = '$cartid'";
	 		$result = $this->db->delete($query);
	 		if($result){
	 		//header('location:cart.php');
	 		}
	 		else{
	 			$msg = '<span style = "color:red; font-size:20px"> Product quantity updated not success</span>';
	 			return $msg;
	 		}
	 	}
	 	public function check_cart(){
	 		$sid = session_id();
	 		$query = "SELECT * FROM cart where sID = '$sid'";
	 		$result = $this->db->select($query);
	 		return $result;
	 	}
	 	public function check_order($customer_id){
	 		$sid = session_id();
	 		$query = "SELECT * FROM tb_order where customerID = '$customer_id'";
	 		$result = $this->db->select($query);
	 		return $result;
	 	}
	 	public function del_all_data_cart(){
	 		$sid = session_id();
	 		$query = "DELETE FROM cart where sID = '$sid'";
	 		$result = $this->db->select($query);
	 		return $result;
	 	}
	 	public function del_all_data_compare($customer_id){
	 		$sid = session_id();
	 		$query = "DELETE FROM compare where customerID = '$customer_id'";
	 		$result = $this->db->delete($query);
	 		return $result;
	 	}
	 	public function insertOrder($customer_id){
	 		$sid = session_id();
	 		$query = "SELECT * FROM cart where sID = '$sid'";
	 		$get_product = $this->db->select($query);
	 		if($get_product){
	 			while ($result = $get_product->fetch_assoc()) {
	 			
	 			$productID = $result['productID'];
	 			$productName = $result['productName'];
	 			$customerID = $customer_id;
	 			$quantity = $result['quantity'];
	 			$price = $result['price'] * $quantity;
	 			$image = $result['image'];
	 			$query_order = "INSERT INTO tb_order(productID, productName, customerID, quantity, price, image) values('$productID','$productName','$customerID','$quantity','$price','$image')";
		 		$insert_order = $this ->db->insert($query_order);		 			
	 			}
	 		}
	 	}
	 	public function getAmountPrice($customer_id){
	 		$query = "SELECT * FROM tb_order where customerID = '$customer_id' ";
	 		$get_price = $this->db->select($query);
	 		return $get_price;
	 	}
	 	public function get_cart_ordered($customer_id){
	 		$query = "SELECT * FROM tb_order where customerID = '$customer_id' ";
	 		$get_cart_ordered = $this->db->select($query);
	 		return $get_cart_ordered;
	 	}
	 	public function get_inbox_cart(){
	 		$query = "SELECT * FROM tb_order order by date_order ";
	 		$get_inbox_cart = $this->db->select($query);
	 		return $get_inbox_cart;
	 	}
	 	public function shipped($id, $time, $price){
	 		$id = mysqli_real_escape_string($this->db->link, $id);
	 		$time = mysqli_real_escape_string($this->db->link, $time);
	 		$price = mysqli_real_escape_string($this->db->link, $price);
	 		$query = "UPDATE tb_order
	 				set status = '1'
	 				where ID = '$id' and date_order = '$time' and price = '$price' ";
	 		$result = $this->db->update($query);
	 		if($result){
	 			$msg = '<span style = "color:green; font-size:20px"> updated order successfully</span>';
	 			return $msg;
	 		}
	 		else{
	 			$msg = '<span style = "color:red; font-size:20px"> updated order not success</span>';
	 			return $msg;
	 		}
	 	}
	 	public function del_shipped($id, $time, $price){
	 		$id = mysqli_real_escape_string($this->db->link, $id);
	 		$time = mysqli_real_escape_string($this->db->link, $time);
	 		$price = mysqli_real_escape_string($this->db->link, $price);
	 		$query = "DELETE FROM tb_order where ID = '$id' and date_order = '$time' and price = '$price' ";
	 		$result = $this->db->delete($query);
	 		if($result){
	 			$msg = '<span style = "color:green; font-size:20px"> delete order successfully</span>';
	 			return $msg;
	 		}
	 		else{
	 			$msg = '<span style = "color:red; font-size:20px"> delete order not success</span>';
	 			return $msg;
	 		}
	 	}
	 	public function shipped_confirm($id, $time, $price){
	 		$id = mysqli_real_escape_string($this->db->link, $id);
	 		$time = mysqli_real_escape_string($this->db->link, $time);
	 		$price = mysqli_real_escape_string($this->db->link, $price);
	 		$query = "UPDATE tb_order
	 				set status = '2'
	 				where customerID = '$id' and date_order = '$time' and price = '$price' ";
	 		$result = $this->db->update($query);
	 		return $result;
	 	}
	}
?>