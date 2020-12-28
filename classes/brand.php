<?php
  	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	  * 
	  */
	 class brand 
	 {
	 	private $db;
	 	private $fm;
	 	
	 	public function __construct(){
	 	
	 		$this->db = new Database();
	 		$this->fm = new Format();
	 	}
	 	public function insert_brand($brandName){
	 		$brandName = $this->fm->validation($brandName);

	 		$brandName = mysqli_real_escape_string($this->db->link, $brandName);

	 		if(empty($brandName)){
	 			$alert = "<span class='error'>brand must be not empty</span>";
	 			return $alert;
	 		}
	 		else{
	 			$query = "INSERT INTO brand(brandName) VALUES('$brandName')";
	 			$result = $this ->db->insert($query);
	 			if($result){
	 				$alert = "<span class='success'>Insert brand Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = "<span class='error'>Insert brand Not Success</span>";
	 				return $alert;
	 			}
	 		}
	 	}
	 	public function show_brand(){
	 		$query = "SELECT * FROM brand order by brandID desc";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}
	 	public function update_brand($brandName,$id){

	 		$brandName = $this->fm->validation($brandName);
	 		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
	 		$id = mysqli_real_escape_string($this->db->link, $id);
	 		if(empty($brandName)){
	 			$alert = "<span class='error'>brand must be not empty</span>";
	 			return $alert;
	 		}
	 		else{
	 			$query = "UPDATE brand set brandName = '$brandName' where brandID = '$id'";
	 			$result = $this ->db->update($query);
	 			if($result){
	 				$alert = "<span class='success'>update brand Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = "<span class='error'>update brand Not Success</span>";
	 				return $alert;
	 			}
	 		}
	 	}
	 	public function del_brand($id){
	 		$query = "DELETE from brand where brandID = '$id' ";
	 		$result = $this ->db->delete($query);
	 		if($result){
	 				$alert = "<span class='success'>Delete brand Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = "<span class='error'>Delete brand Not Success</span>";
	 				return $alert;
	 			}
	 	}
	 	public function getbrandbyid($id){
	 		$query = "SELECT * FROM brand where brandID = '$id' ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}
	 	public function show_brand_fontend(){
	 		$query = "SELECT * FROM brand order by brandID desc";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}
	 	public function get_product_by_brand($id){
	 		$query = "SELECT * FROM product where brandID = '$id' order by brandID desc limit 8";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}
	 	public function get_name_by_brand($id){
	 		$query = "SELECT product.*, brand.brandName, brand.brandID FROM product, brand where product.brandID = brand.brandID AND product.brandID = '$id' limit 1 ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}
	} 
?>