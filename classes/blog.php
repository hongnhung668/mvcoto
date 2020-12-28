<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	  * 
	  */
	class blog
	{
		private $db;
	 	private $fm;
	 	
	 	public function __construct(){ 
	 	
	 		$this->db = new Database();
	 		$this->fm = new Format();
	 	}

		public function insert_blog($data,$adminid){
			$sid = session_id();
	 		$title = mysqli_real_escape_string($this->db->link, $data['title']);
	 		$content = mysqli_real_escape_string($this->db->link, $data['content']);
	 		$is_public = mysqli_real_escape_string($this->db->link, $data['is_public']);

	 		$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;

	 		if(empty($title) || empty($content) || empty($file_name)){
	 			$alert = "<span class='error'>Blog must be not empty</span>";
	 			return $alert;
	 		}
	 		else{
	 			$adminID = $adminid;
	 			move_uploaded_file($file_temp, $uploaded_image);
	 			$query = "INSERT into blogger(title, content, image, adminID, is_public, createdate, updatedate ) VALUES ( '$title', '$content', '$unique_image', '$adminID', '$is_public', now(), now())";
	 			$result = $this ->db->insert($query);
	 			if($result){
	 				$alert = "<span class='success'>Insert Blog Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = "<span class='error'>Insert Blog Not Success</span>";
	 				return $alert;
	 			}
	 		}
	 	}

	 	public function show_blog(){
	 		$query = "SELECT * FROM blogger order by ID desc";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function update_blog($data,$id){
	 		
	 		$title = mysqli_real_escape_string($this->db->link, $data['title']);
	 		$content = mysqli_real_escape_string($this->db->link, $data['content']);
	 		$id = mysqli_real_escape_string($this->db->link, $id);
	 		if(empty($title) || empty($content)){
	 			$alert = "<span class='error'>blog must be not empty</span>";
	 			return $alert;
	 		}
	 		else{
	 			$query = "UPDATE blogger set title = '$title', content = '$content' where ID = '$id'";
	 			$result = $this ->db->update($query);
	 			if($result){
	 				$alert = "<span class='success'>update blog Successfuly</span>";
	 				return $alert;
	 			}
	 			else{
	 				$alert = "<span class='error'>update blog Not Success</span>";
	 				return $alert;
	 			}
	 		}
	 	}

	 	public function getblogbyid($id){
	 		$query = "SELECT * FROM blogger where ID = '$id' ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	public function del_blog($id){
	 		$query = "DELETE from blogger where ID = '$id' ";
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

	 	public function update_public($id, $type){
	 		$type = mysqli_real_escape_string($this->db->link, $type);
	 		$query = "UPDATE blogger set is_public = '$type' where ID = '$id' ";
	 		$result = $this ->db->update($query);
	 		return $result;
	 	}

	 	public function getblog_new(){
	 		$sp_tungtrang = 5;
	 		if(!isset($_GET['trang'])){
	 			$trang=1;
	 		}
	 		else{
	 			$trang=$_GET['trang'];
	 		}
	 		$tungtrang = ($trang-1) * $sp_tungtrang;
	 		$query = "SELECT * FROM blogger where is_public = '1' order by ID desc limit $tungtrang,$sp_tungtrang  ";
	 		$result = $this ->db->select($query);
	 		return $result;
	 	}

	 	
	} 
?>