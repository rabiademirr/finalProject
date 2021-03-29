<?php 

include 'header.php'; 



if (isset($_POST['search'])) {

	$searching=$_POST['searching'];
	$askProduct=$db->prepare("SELECT * FROM product where product_name LIKE ?");
	$askProduct->execute(array("%$searching%"));

	$count=$askProduct->rowCount();

} else {

	Header("Location:index.php?status=empty");

}




?>



<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">Ürünler</div>
				<div class="title-nav">
					<a href="javascripti:void(0);"><i class="fa fa-th-large"></i>grid</a>
					<a href="javascripti:void(0);"><i class="fa fa-bars"></i>List</a>
				</div>
			</div>
			<div class="row prdct"><!--Products-->


				<?php
				
				if ($count==0) {
					echo "Bu kategoride ürün bulunamadı";
				}


				while($getProduct=$askProduct->fetch(PDO::FETCH_ASSOC)) {
					?>

					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="product-<?=seo($getProduct["product_name"]).'-'.$getProduct["product_id"]?>"><img src="<?php echo $getProduct['product_imgpath']; ?>" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $getProduct['product_price']*1.90 ?> TL</span><?php echo $getProduct['product_price'] ?> TL</span></div></div>
							</div>
							<span class="smalltitle"><a href="product.htm"><?php echo $getProduct['product_name'] ?></a></span>
							<span class="smalldesc">Ürün Kodu.: <?php echo $getProduct['product_id'] ?></span>
						</div>
					</div>


					<?php } ?>





				</div><!--Products-->


			</div>

			<?php include 'sidebar.php' ?>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include 'footer.php'; ?>