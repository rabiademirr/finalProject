<div   class="col-md-3"><!--sidebar-->
				<div class="title-bg">
					<div  class="title">Kategoriler</div>
				</div>
			
				<div style="background: #C8E6C9" class="categorybox">
					<ul>
					<?php	
                    $askCategory=$db->prepare("SELECT * FROM category order by category_order ASC  ");
                  $askCategory->execute(array());


					 while($getCategory=$askCategory->fetch(PDO::FETCH_ASSOC)) { ?>
						<li><a href="categories-<?=seo($getCategory['category_name']) ?>"><?php echo $getCategory['category_name']; ?></a></li>
					 <?php  } ?>
					</ul>
				</div>
				
			<!--	<div class="ads">
					<a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
				</div> -->
				
			<!--	<div class="title-bg">
					<div class="title">Best Seller</div>
				</div>
				<div class="best-seller">
					<ul>
						<li class="clearfix">
							<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
							<div class="mini-meta">
								<a href="#" class="smalltitle2">Panasonic M3</a>
								<p class="smallprice2">Price : $122</p>
							</div>
						</li>
						<li class="clearfix">
							<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
							<div class="mini-meta">
								<a href="#" class="smalltitle2">Panasonic M3</a>
								<p class="smallprice2">Price : $122</p>
							</div>
						</li>
						<li class="clearfix">
							<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
							<div class="mini-meta">
								<a href="#" class="smalltitle2">Panasonic M3</a>
								<p class="smallprice2">Price : $122</p>
							</div>
						</li>
					</ul>
				</div> -->
				
			</div><!--sidebar-->