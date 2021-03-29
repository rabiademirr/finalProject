<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Şifremi Güncelle</div>
							<p >Şifrenizi aşağıdan güncelleyebilirsiniz!</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="admin/operation/operation.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-8">
				<div class="title-bg">
					<div class="title-bg">

					<div class="title"></div>
				</div>
				</div>
               <div class="title-bg">
					<div class="title-bg">

					<div class="title"></div>
				</div>
				</div>
				<?php 

				if ($_GET['status']=="farklisifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
				</div>

				<?php } elseif ($_GET['status']=="eksiksifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
				</div>

				<?php } elseif ($_GET['status']=="mukerrerkayit") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
				</div>

				<?php } elseif ($_GET['status']=="sifredegisti") {?>

				<div class="alert alert-success">
					<strong>Başarılı!</strong> Şifreniz başarıyla değişti
				</div>

				<?php }
				?>


				


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="password" class="form-control"  required="" name="user_oldpassword" placeholder="Lütfen Eski Şifrenizi Giriniz">
					</div>
					
				</div>

				
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" name="user_passwordone"    placeholder="Yeni Şifrenizi Giriniz">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="user_passwordtwo"   placeholder="Yeni Şifrenizi Tekrar Giriniz">
					</div>
				</div>

				<input type="hidden" name="user_id" value="<?php echo $getUser['user_id'] ?>">



				<button type="submit" name="updateUserPassword" class="btn btn-default btn-warning">Şifremi Değiştir</button>
			</div>
			
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>