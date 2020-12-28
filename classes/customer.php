<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	  * 
	  */
	 class customer
	{
	 	private $db;
	 	private $fm;
	 	
	 	public function __construct(){
	 	
	 		$this->db = new Database();
	 		$this->fm = new Format();
	 	}
	 	public function insert_binhluan(){
	 		$productID = $_POST['product_id_binhluan'];
	 		$tenbinhluan = $_POST['tennguoibinhluan'];
	 		$binhluan = $_POST['binhluan'];
	 		if($tenbinhluan =="" || $binhluan ==""){
	 			$alert = '<span style="font-size:18px; color:red">fields must be not empty</span>';
	 			return $alert;
	 		}
	 		else{
	 				$query = "INSERT INTO comment(tenbinhluan, binhluan, productID) 
	 					values('$tenbinhluan','$binhluan','$productID')";
	 				$result = $this ->db->insert($query);
	 				if($result){
	 				$alert = "<span style='font-size:18px; color:green'>Bình luận sẽ được admin kiểm duyệt</span>";
	 				return $alert;
		 			}
		 			else{
		 				$alert = '<span style="font-size:18px; color:red">Bình luận không thành công</span>';
		 				return $alert;
		 			}
	 			}
	 	}
	 	public function insert_customer($data){
	 		$name= mysqli_real_escape_string($this->db->link, $data['Name']);
	 		$city= mysqli_real_escape_string($this->db->link, $data['City']);
	 		$zipcode= mysqli_real_escape_string($this->db->link, $data['Zipcode']);
	 		$email= mysqli_real_escape_string($this->db->link, $data['Email']);
	 		$address= mysqli_real_escape_string($this->db->link, $data['Address']);
	 		$phone= mysqli_real_escape_string($this->db->link, $data['Phone']);
	 		$password= mysqli_real_escape_string($this->db->link, md5($data['Password']));
	 		if($name=="" || $city=="" || $zipcode=="" || $email=="" || $address=="" || $phone=="" || $password==""){
	 			$alert = '<span style="font-size:18px; color:red">fields must be not empty</span>';
	 			return $alert;
	 		}
	 		else{
	 			$check_email = "SELECT * FROM customer where Email = '$email' limit 1 ";
	 			$result_check = $this->db->select($check_email);
	 			if($result_check){
	 				$alert ='<span style="font-size:18px; color:red">Email Already Existed ! Please Enter Another Email</span>';
	 				return $alert;
	 			}
	 			else{
	 				$query = "INSERT INTO customer(Name, City, Zipcode, Email, Address,  Phone, Password) 
	 					values('$name','$city','$zipcode','$email','$address','$phone','$password')";
	 				$result = $this ->db->insert($query);
	 				if($result){
	 				$alert = "<span style='font-size:18px; color:green'>Customer Created Successfuly</span>";
	 				return $alert;
		 			}
		 			else{
		 				$alert = '<span style="font-size:18px; color:red">Customer Created Not Success</span>';
		 				return $alert;
		 			}
	 			}
	 		}
	 	}
	 	public function login_customer($data){
	 		$email= mysqli_real_escape_string($this->db->link, $data['Email']);
	 		$password= mysqli_real_escape_string($this->db->link, md5($data['Password']));
	 		if($email=="" || $password==""){
	 			$alert = '<span style="font-size:18px; color:red">Email and Password must be not empty</span>';
	 			return $alert;
	 		}
	 		else{
	 			$check_login = "SELECT * FROM customer where Email = '$email' and Password = '$password' ";
	 			$result_login = $this->db->select($check_login);
	 			if($result_login){
	 				$value = $result_login->fetch_assoc();
	 				session::set('customer_login',true);
	 				session::set('customer_id',$value['ID']);
	 				session::set('customer_name',$value['Name']);
	 				$alert = '<span style="font-size:18px; color:green">Login Successfuly</span>';
	 				return $alert;
	 			}
	 			else{
	 				$alert = '<span style="font-size:18px; color:red">Email and Password doesnt match</span>';
	 				return $alert;
		 		
	 			}
	 		}
	 	}
	 	public function show_customer($id){
	 		$query = "SELECT * FROM customer where ID = '$id' ";
	 		$result = $this->db->select($query);
	 		return $result;
	 	}
	 	public function update_customer($data,$id){
	 		$name= mysqli_real_escape_string($this->db->link, $data['Name']);
	 		$city= mysqli_real_escape_string($this->db->link, $data['City']);
	 		$zipcode= mysqli_real_escape_string($this->db->link, $data['Zipcode']);
	 		$email= mysqli_real_escape_string($this->db->link, $data['Email']);
	 		$address= mysqli_real_escape_string($this->db->link, $data['Address']);
	 		$country= mysqli_real_escape_string($this->db->link, $data['Country']);
	 		$phone= mysqli_real_escape_string($this->db->link, $data['Phone']);
	 		if($name=="" || $city=="" || $zipcode=="" || $email=="" || $address=="" || $country=="" || $phone=="" ){
	 			$alert = '<span style="font-size:18px; color:red">fields must be not empty</span>';
	 			return $alert;
	 		}
	 		else{
	 			$query = "UPDATE customer set Name='$name', City='$city', Zipcode='$zipcode', Email='$email', Address='$address', Country='$country', Phone='$phone' ";
	 			$result = $this ->db->update($query);
	 			if($result){
	 				$alert = "<span style='font-size:18px; color:green'>Customer Update Successfuly</span>";
	 				return $alert;
		 		}
		 		else{
		 				$alert = '<span style="font-size:18px; color:red">Customer Update Not Success</span>';
		 				return $alert;
		 		}
	 		}
	 	}

	 	
	 	
	}