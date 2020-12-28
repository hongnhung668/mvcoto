<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath. '/../lib/database.php');
	include_once ($filepath. '/../helpers/format.php');
?>

<?php
	/**
	  * 
	  */
	 class product
	 {
	 	private $db;
	 	private $fm;
	 	
	 	public function __construct(){
	 	
	 		$this->db = new Database();
	 		$this->fm = new Format();
	 	}

	 	public function search_product($tukhoa){
	 		$tukhoa = $this->fm->validation($tukhoa);
	 		$query = "SELECT * FROM product where productName like '%$tukhoa%' ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function insert_product($data,$files){

	 		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
	 		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
	 		$category = mysqli_real_escape_string($this->db->link, $data['category']);
	 		$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
	 		$price = mysqli_real_escape_string($this->db->link, $data['price']);
	 		$type = mysqli_real_escape_string($this->db->link, $data['type']);

			//kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

	 		if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name==""){
	 			$alert = "<span class='error'>fields must be not empty</span>";
	 			return $alert;
	 		}
	 		else{
	 			move_uploaded_file($file_temp, $uploaded_image);
	 			$query = "insert into product(productName,catID,brandID,product_desc,price,type,image) values('$productName','$category','$brand','$product_desc','$price','$type','$unique_image')";
	 			$result = $this ->db->insert($query);
	 			if($result){
	 				$alert = "<span class='success'>Insert product Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = "<span class='error'>Insert product Not Success</span>";
	 				return $alert;
	 			}
	 		}
	 	}

	 	public function insert_slider($data,$files){

	 		$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
	 		$type = mysqli_real_escape_string($this->db->link, $data['type']);

			//kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

	 		if($sliderName=="" || $type=="" || $file_name==""){
	 			$alert = "<span class='error'>fields must be not empty</span>";
	 			return $alert;
	 		}
	 		else{
	 				if(!empty($file_name)){
	 				//nếu người dùng chọn ảnh
		 				if($file_size > 2048000){
		 					$alert = "<span class='error'>Image size should be less then 2MB!</span>";
		 					return $alert;
		 				}
		 				elseif(in_array($file_ext, $permited) === False){
		 					$alert = "<span class='error'>You can upload only:-!".implode('.', $permited)."</span>";
		 					return $alert;
		 				}
			 			move_uploaded_file($file_temp, $uploaded_image);	
			 			$query = "insert into slider(sliderName,sliderImage,type) values('$sliderName', '$unique_image', '$type')";
			 			$result = $this ->db->insert($query);
			 			if($result){
				 			$alert = "<span class='success'>Slider added Successfuly</span>";
				 			return $alert;
			 			}
				 		else{
				 			$alert = "<span class='error'>Slider added Not Success</span>";
				 			return $alert;
				 		}
		 			}	
	 		}
	 	}

	 	public function show_slider(){
	 		$query = "SELECT * FROM slider where type = '1' order by sliderID desc";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function show_slider_list(){
	 		$query = "SELECT * FROM slider order by sliderID desc";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function del_slider($id){
	 		$query = "DELETE FROM slider where sliderID = '$id' ";
	 		$result = $this ->db->delete($query);
	 		if($result){
	 				$alert = "<span class='success'>Delete Slider Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = "<span class='error'>Delete Slider Not Success</span>";
	 				return $alert;
	 			}
	 	}

	 	public function show_product(){
	 		//$query = "SELECT p.*, c.catName, b.brandName 
	 		//FROM product as p, category as c, brand as b where p.catID = c.catID
	 		//and p.brandID = b.brandID
	 		//order by p.productID desc";

	 		$query = "SELECT product.*, category.catName, brand.brandName 
	 		FROM product INNER JOIN category ON product.catID = category.catID
	 		INNER JOIN brand ON product.brandID = brand.brandID
	 		order by product.productID desc";

	 		//$query = "select * from product order by productID desc";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function update_type_slider($id, $type){
	 		$type = mysqli_real_escape_string($this->db->link, $type);
	 		$query = "UPDATE slider set type = '$type' where sliderID = '$id' ";
	 		$result = $this ->db->update($query);
	 		return $result;
	 	}

	 	public function update_product($data,$files,$id){

	 		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
	 		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
	 		$category = mysqli_real_escape_string($this->db->link, $data['category']);
	 		$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
	 		$price = mysqli_real_escape_string($this->db->link, $data['price']);
	 		$type = mysqli_real_escape_string($this->db->link, $data['type']);

			//kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));//lấy sau dấu chấm
			//$file_current = strtolower(current($div));//lấy trước dấu chấm
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

	 		$id = mysqli_real_escape_string($this->db->link, $id);
	 		if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type==""){
	 			$alert = "<span class='error'>fields must be not empty</span>";
	 			return $alert;
	 		}
	 		else{
	 			if(!empty($file_name)){
	 				//nếu người dùng chọn ảnh
	 				if($file_size > 204800){
	 					$alert = "<span class='error'>Image size should be less then 2MB!</span>";
	 					return $alert;
	 				}
	 				elseif(in_array($file_ext, $permited) === False){
	 					$alert = "<span class='error'>You can upload only:-!".implode('.', $permited)."</span>";
	 					return $alert;
	 				}
	 				else{
	 				move_uploaded_file($file_temp, $uploaded_image);	
	 				$query = "UPDATE product 
	 				set productName = '$productName',
	 					catID = '$category', 
	 					brandID = '$brand', 
	 					type = '$type', 
	 					price = '$price', 
	 					image = '$unique_image', 
	 					product_desc = '$product_desc' 
	 				where productID = '$id'";
	 				
	 				}
	 			}

	 			else{
	 				//nếu người dùng không chọn hình ảnh
	 				$query = "UPDATE product 
	 				set productName = '$productName',
	 					catID = '$category', 
	 					brandID = '$brand', 
	 					type = '$type', 
	 					price = '$price', 
	 					product_desc = '$product_desc' 
	 				where productID = '$id'";
	 			}
	 			$result = $this ->db->update($query);
	 			if($result){
	 				$alert = "<span class='success'>update product Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = "<span class='error'>update product Not Success</span>";
	 				return $alert;
	 			}
	 		}
	 	}

	 	public function del_product($id){
	 		$query = "DELETE FROM product where productID = '$id' ";
	 		$result = $this ->db->delete($query);
	 		if($result){
	 				$alert = "<span class='success'>Delete product Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = "<span class='error'>Delete product Not Success</span>";
	 				return $alert;
	 			}
	 	}

	 	public function del_wlist($proID, $customer_id){
	 		$query = "DELETE FROM wishlist where productID = '$proID' and customerID = '$customer_id'  ";
	 		$result = $this ->db->delete($query);
	 		return $result;
	 	}

	 	public function getproductbyid($id){
	 		$query = "SELECT * FROM product where productID = '$id' ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	//END BACKEND
	 	public function getproduct_feathered(){
	 		$query = "SELECT * FROM product where type = '1' ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function getproduct_new(){
	 		$sp_tungtrang = 9;
	 		if(!isset($_GET['trang'])){
	 			$trang=1;
	 		}
	 		else{
	 			$trang=$_GET['trang'];
	 		}
	 		$tungtrang = ($trang-1) * $sp_tungtrang;
	 		$query = "SELECT * FROM product order by productID desc limit $tungtrang,$sp_tungtrang  ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function get_all_product(){
	 		$query = "SELECT * FROM product ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function get_details($id){
	 		$query = "SELECT product.*, category.catName, brand.brandName 
	 		FROM product INNER JOIN category ON product.catID = category.catID
	 		INNER JOIN brand ON product.brandID = brand.brandID
	 		where product.productID = '$id'";

	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function getLastestAudi(){
	 		$query = "SELECT * FROM product where brandID = '1' order by productID desc limit 3 ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function getLastestBMW(){
	 		$query = "SELECT * FROM product where brandID = '3' order by productID desc limit 3 ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function getLastestJaguar(){
	 		$query = "SELECT * FROM product where brandID = '19' order by productID desc limit 3 ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function getLastestMcLaren(){
	 		$query = "SELECT * FROM product where brandID = '24' order by productID desc limit 1 ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function get_compare($customer_id){
	 		$query = "SELECT * FROM compare where customerID = '$customer_id' order by ID desc ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function get_wlist($customer_id){
	 		$query = "SELECT * FROM wishlist where customerID = '$customer_id' order by ID desc ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function insertCompare($productID,$customer_id){

	 		$productID = mysqli_real_escape_string($this->db->link, $productID);
	 		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

	 		$query = "SELECT * FROM product where productID = '$productID'";
	 		$result = $this->db->select($query)->fetch_assoc();
	 		
	 		$image = $result['image'];
	 		$price = $result['price'];
	 		$productName = $result['productName'];

	 		$checkcompare = "SELECT * FROM compare where productID = '$productID' and customerID = '$customer_id'";
	 		$check_compare = $this->db->select($checkcompare);
	 		if($check_compare){
	 			$msg = '<span style = "color:red; font-size:20px">Product already added to compare</span>';
	 			return $msg;
	 		}
	 		else{
		 		$query_insert = "INSERT INTO compare(customerID, productID, productName, price, image) values('$customer_id','$productID','$productName','$price','$image')";
		 		$insert_compare = $this ->db->insert($query_insert);
		 		if($insert_compare){
	 				$alert = "<span class='success'>Added Compare Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = '<span style = "color:red; font-size:20px">Added Compare Not Success</span>';
	 				return $alert;
	 			}
		 	}
	 	}

	 	public function insertWlist($productID,$customer_id){
	 		$productID = mysqli_real_escape_string($this->db->link, $productID);
	 		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

	 		$query = "SELECT * FROM product where productID = '$productID'";
	 		$result = $this->db->select($query)->fetch_assoc();
	 		
	 		$image = $result['image'];
	 		$price = $result['price'];
	 		$productName = $result['productName'];

	 		$checkwlist = "SELECT * FROM wishlist where productID = '$productID' and customerID = '$customer_id'";
	 		$check_wlist = $this->db->select($checkwlist);
	 		if($check_wlist){
	 			$msg = '<span style = "color:red; font-size:20px">Product already added to wishlist</span>';
	 			return $msg;
	 		}
	 		else{
		 		$query_insert = "INSERT INTO wishlist(customerID, productID, productName, price, image) values('$customer_id','$productID','$productName','$price','$image')";
		 		$insert_wlist = $this ->db->insert($query_insert);
		 		if($insert_wlist){
	 				$alert = "<span class='success'>Added Wishlist Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = '<span style = "color:red; font-size:20px">Added Wishlist Not Success</span>';
	 				return $alert;
	 			}
		 	}
	 	}





	} 
?>