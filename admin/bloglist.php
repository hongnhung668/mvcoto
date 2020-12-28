<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/blog.php'; ?>

<?php
	$blog = new blog();
	if(isset($_GET['ID']) && isset($_GET['is_public'])){
	$id = $_GET['ID'];
	$type = $_GET['is_public'];
	$update_public = $blog->update_public($id, $type);
	}

	if(isset($_GET['delID'])){
        $id = $_GET['delID'];
        $delBlog = $blog->del_blog($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">
                <?php
                    if(isset($delBlog)){
                        echo $delBlog;
                    }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Title</th>
							<th>Content</th>
							<th>Image</th>
							<th>Public</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_blog = $blog->show_blog();
							$i = 0;
							if($show_blog){
								while($result = $show_blog->fetch_assoc()){
									$i++;
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['title']; ?></td>
							<td><?php echo $result['content']; ?></td>
							<td><img src="upload/<?php echo $result['image'] ?>" height="40px" width="60px"/></td>
							<td>
								<?php 
									if($result['is_public'] == 1){
								?>
									<a href="?ID=<?php echo $result['ID']?>&is_public=0 " >Off</a> 

								<?php 
									}
									else{
								?>
									<a href="?ID=<?php echo $result['ID']?>&is_public=1 " >On</a> 
								<?php 
									}
								?>
							</td>
							<td><a href="blogedit.php?blogID=<?php echo $result['ID'] ?>">Edit</a> || <a onclick="return confirm('Are you want to delete?')" href="?delID=<?php echo $result['ID'] ?>">Delete</a></td>
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

