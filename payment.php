<?php include 'header.php'; ?>
	
	<div class="container">
		
		<div class="clearfix"></div>
		<div class="lines"></div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="title-bg">
			<div class="title">Ödeme İşlemleri</div>
		</div>
		
		<div  class="table-responsive">
			<table  style="border: 1px solid green;" class="table  ">
				<thead  style="background:#8BC34A;">
					<tr>
					
					<th></th>
					<th>Ürün ad</th>
					<th>Ürün Kodu</th>
					<th>Adet</th>
					<th>Toplam Fiyat</th>
					</tr>
				</thead>
				<form action="admin/operation/operation.php" method="POST">
				<tbody>
					<?php 
				$user_id=$getUser['user_id'];
				$askCart=$db->prepare("SELECT * FROM cart where user_id=:id");
				$askCart->execute(array(
					'id' => $user_id
					));

				while($getCart=$askCart->fetch(PDO::FETCH_ASSOC)) {

					$product_id=$getCart['product_id'];
					$askProduct=$db->prepare("SELECT * FROM product where product_id=:product_id");
					$askProduct->execute(array(
						'product_id' => $product_id
						));

					$getProduct=$askProduct->fetch(PDO::FETCH_ASSOC);
					// $total_price +=$getProduct['product_price']*$getCart['product_piece'];

					
					?>


						<tr>
						<td><img src="<?php echo $getProduct['product_imgpath']; ?>" width="100" alt=""></td>
						<td><?php echo $getProduct['product_name'] ?></td>
						<td><?php echo $getProduct['product_id'] ?></td>
						<td><?php echo $getCart['product_piece'] ?></td>
						<td><?php echo $getProduct['product_price'] ?></td>
					</tr>
					   <?php } ?>
				
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-6">
			
				
			</div>
			<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">
				<div class="total">Toplam Fiyat : <span class="bigprice"><?php echo $total_price ?> TL</span></div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>

			<div class="tab-review">

			<ul id="myTab" class="nav nav-tabs shop-tab">

				<li class="active"><a href="#desc" data-toggle="tab">Kredi Kartı</a></li>
				 <li><a href="#rev" data-toggle="tab"> Havale-EFT </a>




				</li>
			</ul>



			<div id="myTabContent" class="tab-content shop-tab-ct">
				

				<div class="tab-pane fade active in" id="desc">
					<div class="alert alert-danger" role="alert">
                Kredi kartı tanımlanamadı!!
                     </div>

			
				</div>


				<div  style="color: #B71C1C;"  class="tab-pane fade " id="rev">

                           

					<p>Ödeme yapacağınız banka hesap numarasını seçerek işleminizi tamamlayınız.</p>


					<?php 

					$askBank=$db->prepare("SELECT * FROM bank order by bank_id ASC");
					$askBank->execute();

					while($getBank=$askBank->fetch(PDO::FETCH_ASSOC)) { ?>

					
				   <div  class="card-body p-5">
                        <ul class="list-group">
                            <li class="list-group-item rounded-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="radio" name="order_bank" value="<?php echo $getBank['bank_name'] ?>">
                    <?php echo $getBank['bank_name']; echo " ";?> - <?php echo $getBank['bank_iban']; ?><br>
                                   
                                </div>
                            </li>
                           
                     
                          
                        </ul>
                    </div>


					

					<?php } ?>

					<input type="hidden" name="user_id" value="<?php echo $getUser['user_id'] ?>">
					<input type="hidden" name="order_total" value="<?php echo $total_price ?>">
					<hr>
					<button class="btn btn-success" type="submit" name="orderAdd">Sipariş Ver</button>

				</form>

			</div>


		</div>
	</div>


		<div class="spacer"></div>
	</div>
	<?php include 'footer.php'; ?>