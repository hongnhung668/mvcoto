<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/blog.php'; ?>
<?php
    $blog = new blog();
    $adminid = session::get('adminID');
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
       
        $insertBlog = $blog->insert_blog($_POST,$adminid);
    }
?>

<div class="grid_10">
	 <div class="box round first grid">
	 	<h2>Thêm blog</h2>
        <div class="block copyblock"> 
        	<?php
                    if(isset($insertBlog)){
                        echo $insertBlog;
                    }
                ?>
            <form action="blogadd.php" method="POST" enctype="multipart/form-data">
				<table>
					
					<tr>
						<td nowrap="nowrap">Tiêu đề bài viết :</td>
						<td><input type="text" name="title"></td>
					</tr>
					<tr>
						<td nowrap="nowrap">Nội dung :</td>
						<td><textarea name="content" rows="10" cols="60"></textarea></td>
					</tr>
					<tr>
						<td nowrap="nowrap">Upload Image :</td>
						<td><input type="file" name="image" /></td>
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
						<td colspan="2" align="center"><input type="submit" name="submit" value="Thêm bài viết"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<?php include "inc/footer.php" ?>