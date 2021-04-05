<?php include 'header.php';

$askProduct=$db->prepare("SELECT * from product where product_id=:product_id");
$askProduct->execute(array(
 'product_id'=>$_GET['product_id']

));
$getProduct=$askProduct->fetch(PDO::FETCH_ASSOC);

$count=$askProduct->rowCount();
if($count==0){
	header("Location:index.php?status=noproduct");
	exit;
}


 ?>

 <?php 

if ($_GET['status']=="ok") {?>

<script type="text/javascript">
	alert("Yorum Başarıyla Eklendi");
</script>

<?php }
if ($_GET['statusc']=="ok") {?>

<script type="text/javascript">
	alert("Ürün Başarıyla Sepete Eklendi");
</script>

<?php }
?>



	<div class="container">
	
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?php   echo $getProduct['product_name']; ?></div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="dt-img">
							<div class="detpricetag"><div class="inner"><?php echo $getProduct['product_price']." TL"; ?></div></div>
							<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $getProduct['product_imgpath'] ?>" alt="" class="img-responsive"></a>
						</div>
					
					
					</div>
					<div class="col-md-6 det-desc">
						<div class="productdata">
							<div class="infospan">Ürün Kodu:<span><?php echo  $getProduct['product_id']; ?></span></div>
						
						
						
							

						

							<hr>
							
							<div style="background:#F1F8E9;" class="sharing">
								<div class="share-bt">
									<div class="addthis_toolbox addthis_default_style ">
										<a class="addthis_counter addthis_pill_style"></a>
									</div>
									<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
									<div class="clearfix"></div>
								</div>
								<div  class="avatock"><span>
									
                                <?php
                                 if($getProduct['product_stock']>=1) {
                                 	echo "Stok Adedi:".$getProduct['product_stock'];
                                 }else {
                                 	echo "Stokta kalmamıştır!";
                                 }
                                  

                                 ?>




								</span></div>
							</div>
							<div class="clearfix"></div>
						<hr>


						<form action="admin/operation/operation.php" method="POST">

							<div class="form-group">
								<label for="qty" class="col-sm-2 control-label">Adet</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" value="1" name="product_piece">
								</div>
								<input type="hidden" name="user_id" value="<?php echo $getUser['user_id'] ?>">

								<input type="hidden" name="product_id" value="<?php echo $getProduct['product_id'] ?>">
								<div class="col-sm-4">

                                 <input type="hidden" name="available_urlc" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].":8080".$_SERVER['REQUEST_URI']; ?>">


									<button type="submit" name="addToCart" class="btn btn-default btn-success btn-sm"><span class="addchart">Sepete Ekle</span></button>
								</div>
								<div class="clearfix"></div>
							</div>

						</form>
							
						</div>
					</div>
				</div>

				<div class="tab-review">
					<ul id="myTab" class="nav nav-tabs shop-tab">
						<li  <?php if ($_GET['status']!="ok") {?>
						class="active"
						<?php } ?> ><a href="#desc" data-toggle="tab">Ürün Açıklaması</a></li>

						<li <?php if ($_GET['status']=="ok") {?>
						class="active"
					<?php } ?>
						<?php

                           $user_id=$getUser['user_id'];
                           $product_id=$getProduct['product_id'];

                        $askComment=$db->prepare("SELECT * FROM comments where product_id=:product_id and comment_confirmation=:comment_confirmation");
                     	$askComment->execute(array(
                     		'product_id' => $product_id,
                     		'comment_confirmation' => 1,

                     		));



						 ?>
						><a href="#rev" data-toggle="tab">Yorumlar(<?php  echo $askComment->rowCount(); ?>)</a></li>

						<li class=""><a href="#payment" data-toggle="tab">Ödeme Seçenekleri</a></li>
					</ul>
					<div id="myTabContent" class="tab-content shop-tab-ct">
						<div class="tab-pane fade <?php if ($_GET['status']!="ok") {?>
								active in
								<?php } ?>" id="desc">
							<p><?php  echo $getProduct['product_description']; ?></p>
						</div>
						<div class="tab-pane fade <?php if ($_GET['status']=="ok") {?>
								active in
								<?php } ?>" id="rev">
							<!-- Yorumlar-->
                      <?php

                  
                        
                         while ($getComment=$askComment->fetch(PDO::FETCH_ASSOC)) {

                         	$cuser_id=$getComment['user_id'];

									$caskUser=$db->prepare("SELECT * FROM user where user_id=:id");
									$caskUser->execute(array(
										'id' => $cuser_id
										));

									$cgetUser=$caskUser->fetch(PDO::FETCH_ASSOC);


									?>
								
                   
                         	<p class="dash">
										<span><?php echo  $cgetUser['user_name']; ?></span> (<?php echo $getComment['comment_time'] ?>)<br><br>
										<?php echo $getComment['comment_detail'] ?>
									</p>

									
									<?php } ?>

                       

							
							<h4>Yorum Yapın</h4>
							<?php  
                             if(isset($_SESSION['userUser_mail'])){ ?>
                                 	<form action="admin/operation/operation.php" method="POST" role="form">

							

										<div class="form-group">
											<textarea name="comment_detail" class="form-control" id="text"></textarea>
										</div>

										<input type="hidden" name="user_id" value="<?php echo $getUser['user_id'] ?>">

										<input type="hidden" name="product_id" value="<?php echo $getProduct['product_id'] ?>">
										<input type="hidden" name="available_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].":8080".$_SERVER['REQUEST_URI']; ?>">


										

										

										<button type="submit" name="saveComment" class="btn btn-default btn-success btn-sm">Yorumu Yap</button>

						</form>

                             	<?php } else { ?>


                             		 Yorum yapabilmek için lütfen  giriş  yapın! ya da <a href="register"> kayıt olun </a>
                         

                            <?php }    ?>

						
							
						</div>
						<div class="tab-pane fade" id="payment">
							<p></p>
						</div>
				

					</div>

				</div>
			
				<div id="title-bg">
					<div class="title">Benzer Ürünler</div>
				</div>
				<div class="row prdct"><!--Products-->
                 <?php 
                         $category_id=$getProduct['category_id'];
                     	$askRelatedProduct=$db->prepare("SELECT * FROM product where category_id=:category_id order by rand() limit 3 ");
                     	$askRelatedProduct->execute(array(
                     		'category_id' => $category_id
                     		));

                     	while ($getRelatedProduct=$askRelatedProduct->fetch(PDO::FETCH_ASSOC)) {?>
                     		
                     	
             

						<div class="col-md-4">
                     		<div class="productwrap">
                     			<div class="pr-img">
                     				<div class="hot"></div>
                     				<a href="product-<?=seo($getRelatedProduct['product_name']).'-'.$getRelatedProduct["product_id"] ?>"><img src="<?php echo $getRelatedProduct['product_imgpath']; ?>" alt="" class="img-responsive"></a>
                     				<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $getRelatedProduct['product_price']*1.90 ?> TL</span><?php echo $getRelatedProduct['product_price'] ?> TL</span></div></div>
                     			</div>
                     			<span class="smalltitle"><a href="product.htm"><?php echo $getRelatedProduct['product_name'] ?></a></span>
                     			<span class="smalldesc">Ürün Kodu.: <?php echo $getRelatedProduct['product_id'] ?></span>
                     		</div>
                     	</div>
					<?php } ?>
				
				</div><!--Products-->
				<div class="spacer"></div>
			</div><!--Main content-->

         <?php  include 'sidebar.php'; ?>

		</div>
	</div>
	
	<?php include 'footer.php'; ?>