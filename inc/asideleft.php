
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
					
							<div class="panel panel-default">
								<div class="panel-heading">
									<?php 
										$getall_category = $cat->show_category_fontend();
										if($getall_category){
											while ($result_allcat = $getall_category->fetch_assoc()) {
									?>
					
				      				<li><a href="productbycat.php?catID=<?php echo $result_allcat['catID']; ?>"><?php echo $result_allcat['catName']; ?></a></li>
    				
    								<?php
    										}
										} 
    								?>
								</div>
							</div>
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php 
										$getall_brand = $brand->show_brand_fontend();
										if($getall_brand){
											while ($result_allbrand = $getall_brand->fetch_assoc()) {
									?>
					
				      				<li><a href="productbycat.php?brandID=<?php echo $result_allbrand['brandID']; ?>"><?php echo $result_allbrand['brandName']; ?>
				      				</a></li>
    				
    								<?php
    										}
										} 
    								?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
					
					</div>
				</div>