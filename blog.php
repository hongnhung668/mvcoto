<?php 
	include 'inc/header.php';
	//include 'inc/slider.php';
?>

	<section>
		<div class="container">
			<div class="row">
				<?php 
					include 'inc/asideleft.php';
				?>
				
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<?php
							$blog = new blog();
	      					$blog_new = $blog->getblog_new();
	      					if($blog_new){
	      						while ($result_new = $blog_new->fetch_assoc()) {	
	      				?>
						<div class="single-blog-post">
							<h3><?php echo $result_new['title']; ?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i><?php echo $result_new['adminID']; ?></li>
									<li><i class="fa fa-calendar"></i><?php echo $result_new['updatedate'];?></li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="admin/upload/<?php echo $result_new['image']; ?>" alt=""/>
							</a>
							<p><?php echo $result_new['content']; ?></p>
							<a  class="btn btn-primary" href="">Read More</a>
						</div>
						<?php
							}
	      				}
						?>	
						<div class="pagination-area">
							<ul class="pagination">
								<?php
		      		$blog_all = $blog->getblog_new();
		      		$blog_count = mysqli_num_rows($blog_all);
		      		$blog_button = ceil($blog_count/5);
		      		$i = 1;
		      		echo "<p>Trang: </p>";
		      		for($i=1; $i<=$blog_button; $i++){
		      			echo '<li><a href="blog.php?trang='.$i.'">'.$i.'</a></li>';
		      			
		      		}				
		      	?>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php 
	include 'inc/footer.php';
?>