<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/blog.php'; ?>
<?php
    if(!isset($_GET['blogID']) || $_GET['blogID'] == NULL){
        echo "<scrip>window.location = 'bloglist.php'</scrip>";
    }
    else{
        $id = $_GET['blogID'];
    }
    $blog = new blog();
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
     
        $updateBlog = $blog->update_blog($_POST,$id);
    }
?>

<div class="grid_10">
	 <div class="box round first grid">
	 	<h2>Sửa blog</h2>
        <div class="block copyblock"> 
        	 <?php
                    if(isset($updateBlog)){
                        echo $updateBlog;
                    }
                ?>
                <?php
                    $get_blog = $blog->getblogbyid($id);
                    if($get_blog){
                        while ($result = $get_blog->fetch_assoc()) {
                   
                ?>
            <form  method="POST" enctype="multipart/form-data">
				<table>
					
					<tr>
						<td nowrap="nowrap">Tiêu đề bài viết :</td>
						<td><input type="text" name="title" value="<?php echo $result['title']; ?>"></td>
					</tr>
					<tr>
						<td nowrap="nowrap">Nội dung :</td>
						<td><textarea name="content" rows="10" cols="60"><?php echo $result['content']; ?></textarea></td>
					</tr>
					<tr>
						<td nowrap="nowrap">Upload Image :</td>
						<td><input type="file" name="image"/></td>
					</tr>
					<tr>
						<td nowrap="nowrap">Public bài viết ? :</td>
						<td>
						<select name="is_public">
                            <option value="1">On</option>
                            <option value="0">Off</option>
                        </select>
                        </td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="submit" value="Update"></td>
					</tr>
				</table>
			</form>
			<?php 
                        }
                    }
                ?>
		</div>
	</div>
</div>
<?php include "inc/footer.php" ?>