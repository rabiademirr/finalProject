

	<div class="main-slide">
			<div id="sync1" class="owl-carousel">

		<?php 

		$askSlider=$db->prepare("SELECT * FROM slider where slider_status=:status order by slider_order ASC limit 7");
		$askSlider->execute(array(
      'status' => 1
      ));



     


		while($getSlider=$askSlider->fetch(PDO::FETCH_ASSOC)) {

		 ?>
				<div class="item">
					<div class="slide-desc">
						<div class="inner">
							<h1><?php echo $getSlider['slider_name']; ?></h1>
							<p > <?php  echo $getSlider['slider_description']; ?> </p>
							<button class="btn btn-default btn-warning btn-lg">Sepete Ekle</button>
						</div>
					<!--	<div class="inner">
							<div class="pro-pricetag big-deal">
								<div class="inner">
										<span  class="oldprice">$314</span>
										<span>$199</span>
										<span class="ondeal">Fırsat Ürünü</span>
								</div>
							</div>
						</div>
					-->
					</div>
					<div class="slide-type-1">
					<a href="<?php echo $getSlider['slider_link'] ?>">	<img width="400" height="200" src="<?php echo $getSlider['slider_imgpath']; ?>" alt="" class="img-responsive"></a>
					</div>
				</div>
				
				

			
			<?php } ?>
		
				
			</div>
		</div>

	<!--	<div class="bar"></div>
		<div id="sync2" class="owl-carousel">
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Stylish Jacket</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Stylish Jacket</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Nike Airmax</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Unique smaragd ring</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Stylish Jacket</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Nike Airmax</h3>
					<p>Description here here here</p>
				</div>
			</div>
		</div>
		-->