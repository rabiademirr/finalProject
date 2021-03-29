<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Siparişlerim</div>
							<p >Verilen siparişleri listeliyorsunuz</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="admin/operation/operation.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-12">
				<div class="title-bg">
					<div class="title">Sipariş Bilgileri</div>
				</div>

				<div class="table-responsive">
					<table  style="border: 1px solid green;"  class="table ">
						<thead style="background:#8BC34A;">
							<tr>
								
								<th>Sipariş No</th>
								<th>Tarih</th>
								<th>Tutar</th>
								<th>Ödeme Tip</th>
								<th>Durum</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>

							<?php 
							 $user_id=$getUser['user_id'];
							$askOrder=$db->prepare("SELECT * FROM orders where user_id=:id");
							$askOrder->execute(array(
								'id' => $user_id
								));

								while($getOrder=$askOrder->fetch(PDO::FETCH_ASSOC)) {?>
								<tr>

									<td><?php echo $getOrder['order_id']; ?></td>
									<td><?php echo $getOrder['order_time']; ?></td>
									<td><?php echo $getOrder['order_total']; ?></td>
									<td><?php echo $getOrder['order_type']; ?></td>
									<td>Sipariş alındı</td>

									<td><a href=""><button class="btn btn-primary btn-xs">Detay</button></a></td>
								</tr>

								<?php } ?>

							</tbody>
						</table>
					</div>











				</div>

			</div>
		</div>
	</form>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>