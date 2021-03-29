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
			<div class="title">Sepetim</div>
		</div>
		
		<div  class="table-responsive">
			<table  style="border: 1px solid green;" class="table  ">
				<thead  style="background:#8BC34A;">
					<tr>
					<th>Remove</th>
					<th></th>
					<th>Ürün ad</th>
					<th>Ürün Kodu</th>
					<th>Adet</th>
					<th>Toplam Fiyat</th>
					<th></th>
					</tr>
				</thead>
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
					 //$total_price +=$getProduct['product_price']*$getCart['product_piece'];


					
					?>


						<tr>
						<td><form><input type="checkbox"></form></td>
						<td><img src="<?php echo $getProduct['product_imgpath']; ?>" width="100" alt=""></td>
						<td><?php echo $getProduct['product_name'] ?></td>
						<td><?php echo $getProduct['product_id'] ?></td>
						<td><form><input type="text" class="form-control quantity" value="<?php echo $getCart['product_piece'] ?>"></form></td>
						<td><?php echo $getProduct['product_price'] ?></td>

						    <td><center><a href="admin/operation/operation.php?cart_id=<?php echo $getCart['cart_id']; ?>&productCartDelete=ok"><button class="btn btn-danger btn-xs">X</button></a></center></td>
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

				 <a type="submit"  href="index.php" class="btn btn-warning">Alışverişe Devam Et</a><br><br>
                        
				<a href="payment" class="btn btn-default btn-success">Sepeti Onayla</a> 
			</div>
			<div class="clearfix"></div>
			</div>
		</div>
		<div class="spacer"></div>
	</div>
	<?php include 'footer.php'; ?>