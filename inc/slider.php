<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					
				
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							
							<div class="item active">
						
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Các mẫu xe hơi mới nhất hiện nay trên thị trường. Cập nhật thông tin các mẫu xe ô tô mới và đã ra mắt trên thế giới và tại Việt Nam</p>
									<!-- <button type="button" class="btn btn-default get">Get it now</button> -->
								</div>
								<div class="col-sm-6">
								<?php 
						$get_slider = $product->show_slider();
						if($get_slider){
							while($result_slider = $get_slider->fetch_assoc()){

						?>
						<img src="admin/upload/<?php echo $result_slider['sliderImage'] ?>" alt="<?php echo $result_slider['sliderName'] ?>" style="width: 300px; height: 200px"/>
							
						<?php 
							}
						}
						?>	
								</div>
							
							</div>
				
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->