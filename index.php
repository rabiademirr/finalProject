<?php include "header.php"; ?>
	

	<div class="container">
	
		<div class="clearfix"></div>
		<div class="lines"></div>
	
	<?php include 'slider.php'; ?>
		
	</div>
	<div class="f-widget featpro">
		<div class="container">
			<div class="title-widget-bg">
				<div class="title-widget">Öne Çıkan Ürünler</div>

				<div class="carousel-nav">
					<a class="prev"></a>
					<a class="next"></a>
				</div>
			</div>
			<div id="product-carousel" class="owl-carousel owl-theme">

	<?php 
			$askProduct=$db->prepare("SELECT * FROM product where product_status=:product_status and product_standout=:product_standout limit 20");
			$askProduct->execute(array(
				'product_status' => 1,
				'product_standout' => 1
				));




              while($getProduct=$askProduct->fetch(PDO::FETCH_ASSOC)) {
                     	?>

				<div class="item">
					<div class="productwrap">
						<div class="pr-img">
							<div class="hot"></div>
							<a href="product-<?=seo($getProduct['product_name']).'-'.$getProduct["product_id"] ?>"><img src="<?php echo $getProduct['product_imgpath']; ?>" alt="" class="img-responsive"></a>
							<div class="pricetag blue"><div class="inner"><span><?php echo $getProduct['product_price']; ?> TL</span></div></div>
						</div>
							<span class="smalltitle"><a href="product.htm"></a><?php echo $getProduct['product_name']; ?></span>
							<span class="smalldesc">Ürün Kodu: <?php echo $getProduct['product_id']; ?></span>
					</div>
				</div>
			
			<?php } ?>
			
				
			</div>
		</div>
	</div>
	
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title">Hakkımızda</div>
				
				</div>
				<p class="ct"> 

             <?php 
					$askAbout=$db->prepare("SELECT * FROM about where about_id=:about_id");
					$askAbout->execute(array(
						'about_id' => 0
						));
					$getAbout=$askAbout->fetch(PDO::FETCH_ASSOC);

					echo substr($getAbout['about_description'],0,500) ?>



				</p>

			
				<a href="about" class="btn btn-default btn-success btn-sm">Devamını Oku...</a>
				
				<div class="title-bg">
					<div class="title">Son Eklenen Ürünler</div>
				</div>
				<div class="row prdct"><!--Products--> 
					<?php 
			$askProduct=$db->prepare("SELECT * FROM product order by product_time DESC limit 6");
			$askProduct->execute(array(
				'product_time' => product_time
				));




              while($getProduct=$askProduct->fetch(PDO::FETCH_ASSOC)) {
                     	?>



					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<a href="product-<?=seo($getProduct['product_name']).'-'.$getProduct["product_id"] ?>"><img width="200" src="<?php echo $getProduct['product_imgpath']; ?>"  class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $getProduct['product_price']*1.90 ?> TL</span></span><?php echo $getProduct['product_price']; ?>TL</span></div></div>
							</div>
							<span class="smalltitle"><a href="product.htm"> <?php echo $getProduct['product_name']; ?></a></span>
							<span class="smalldesc">Ürün id: <?php echo $getProduct['product_id']; ?></span>
						</div>
					</div>
				
				<?php } ?>
				


				</div><!--Products-->
				<div class="spacer"></div>
			</div><!--Main content-->
			<?php include 'sidebar.php'; ?>
		</div>
	</div>
	
	<?php include "footer.php"; ?>