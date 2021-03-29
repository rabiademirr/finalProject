<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesap Bilgilerim</div>
							<p >Bilgilerinizi aşağıdan düzenleyebilirsiniz...</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="admin/operation/operation.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div align="left" class="title-bg">
					<div   class="title">Kayıt Bilgileri</div>
				</div>

				<?php 

				if ($_GET['status']=="diffpassword") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
				</div>

				<?php } elseif ($_GET['status']=="misspassword") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
				</div>

				<?php } elseif ($_GET['status']=="currentrecord") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
				</div>

				<?php } elseif ($_GET['status']=="unsuccesfull") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Başvrunuz.
				</div>

				<?php }
				?>


				


				<div class="form-group dob">
					<div class="col-sm-12">

						<input type="text" class="form-control"  required="" name="user_name" placeholder="Adınızı Giriniz" value="<?php echo $getUser['user_name'] ?>">
					</div>
					
				</div>

				
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" class="form-control" name="user_province" placeholder="Şehir giriniz"   value="<?php echo $getUser['user_province'] ?>">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="user_district"  placeholder="İlçe giriniz" value="<?php echo $getUser['user_district'] ?>">
					</div>
				</div>
					
				

						<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" class="form-control" name="user_gsm" placeholder="Telefon numarası giriniz"   value="<?php echo $getUser['user_gsm'] ?>">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="user_address" placeholder="Adresinizi giriniz"  value="<?php echo $get['user_address'] ?>">
					</div>
				</div>
					<button type="submit" name="userİnformationUpdate" class="btn btn-default btn-success">Bilgilerimi Güncelle</button>

				</div>


				<input type="hidden" name="user_id" value="<?php echo $getUser['user_id'] ?>">

					<div class="col-md-4">
				<div   class="title-bg">
					<div class="title"> Şifremi Güncelle</div>
				</div>


				<center><a href="updatePassword.php"><img width="300" src="dimg/updatepassword.jpg"></a></center>
			</div>


         


			</div>
				
			</div>
			
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>