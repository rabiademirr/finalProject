<?php 

include 'header.php'; 



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
			<div class="row prdct">
                            <!--Products-->


				<?php

                     $onThePage = 8; // sayfada gösterilecek ürün sayısı
                     $query=$db->prepare("SELECT * from category");
                     $query->execute();
                     $totalContent=$query->rowCount();
                     $totalPage = ceil($totalContent / $onThePage);
                  	// eğer sayfa girilmemişse 1 varsayalım.
                     $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
          			// eğer 1'den küçük bir sayfa sayısı girildiyse  page=1
                     if($page < 1) $page = 1; 
        				// toplam sayfa sayımızdan fazla yazılırsa en son sayfa
                     if($page > $totalPage) $page = $totalPage; 
                     $limit = ($page - 1) * $onThePage;

                     if (isset($_GET['sef'])) {


                     	$askCategory=$db->prepare("SELECT * FROM category where category_seourl=:seourl");
                     	$askCategory->execute(array(
                     		'seourl' => $_GET['sef']
                     		));

                     	$getCategory=$askCategory->fetch(PDO::FETCH_ASSOC);

                     	$category_id=$getCategory['category_id'];


                     	$askProduct=$db->prepare("SELECT * FROM product where category_id=:category_id order by product_id DESC limit $limit,$onThePage");
                     	$askProduct->execute(array(
                     		'category_id' => $category_id
                     		));

                     	$totalContent=$askProduct->rowCount();

                     } else {

                     	$askProduct=$db->prepare("SELECT * FROM product order by product_id DESC limit $limit,$onThePage");
                     	$askProduct->execute();

                     }






                     if ($totalContent==0) {
                     	echo "Bu kategoride ürün bulunamadı";
                     }


                     while($getProduct=$askProduct->fetch(PDO::FETCH_ASSOC)) {
                     	?>

                     	<div style="width:300px;"   class="col-md-4">
                     		<div class="productwrap">
                     			<div  class="pr-img">
                     				<div class="hot"></div>
                     				<a href="product-<?=seo($getProduct['product_name']).'-'.$getProduct["product_id"] ?>"><img  src="<?php echo $getProduct['product_imgpath']; ?>" alt="" class="img-responsive"></a>
                     				<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $getProduct['product_price']*1.90 ?> TL</span><?php echo $getProduct['product_price'] ?> TL</span></div></div>
                     			</div>
                     			<span class="smalltitle"><a href="product.htm"><?php echo $getProduct['product_name'] ?></a></span>
                     			<span class="smalldesc">Ürün Kodu.: <?php echo $getProduct['product_id'] ?></span>
                     		</div>
                     	</div>


                     	<?php } ?>

                     	<div align="right" class="col-md-12">
                     		<ul class="pagination">

                     			<?php

                     			$r=0;

                     			while ($r < $totalPage) {

                     				$r++; ?>

                     				<?php 

                     				if ($r==$page) {?>

                     				<li class="active">

                     					<a href="categories?page=<?php echo $r; ?>"><?php echo $r; ?></a>

                     				</li>

                     				<?php } else {?>


                     				<li>

                     					<a href="categories?page=<?php echo $r; ?>"><?php echo $r; ?></a>

                     				</li>

                     				<?php   }

                     			}

                     			?>

                     		</ul>
                     	</div>





                     </div>
			</div>

			<?php include 'sidebar.php' ?>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include 'footer.php'; ?>