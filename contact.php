<?php include 'header.php' ?>

<script type="text/javascript">

  function checkForm(form)
  {
    ...

    if(!form.captcha.value.match(/^\d{5}$/)) {
      alert('Please enter the CAPTCHA digits in the box provided');
      form.captcha.focus();
      return false;
    }

    ...

    return true;
  }

</script>

<div class="container">
	
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		
	</div>

	
	<div class="title-bg">
		<div class="title">Bizimle İletişime Geçin...</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p class="page-content">
				Bize aşağıdaki bilgilerden ulaşabilirsiniz ya da  iletişim formunu doldurarak gönderebilirsiniz.
			</p>
			<ul class="contact-widget">
				<li class="fphone"><?php echo  $getSetting['setting_phone'] ?></li>
				<li class="fmobile"><?php echo  $getSetting['setting_gsm'] ?></li>
				<li class="fmail lastone"><?php echo  $getSetting['setting_mail'] ?></li>
			</ul>
		</div>
		<div class="col-md-7 col-md-offset-1">
			
			<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
			<div id="googlemaps" class="google-map google-map-footer">
				<iframe
				width="100%"
				height="100%"
				frameborder="0" style="border:0"
				src="https://www.google.com/maps/embed/v1/place?key=<?php echo $getSetting['setting_maps']; ?>
				&q=<?php echo $getSetting['setting_address']; ?>" allowfullscreen>
			</iframe>

		</div>
	</div>
</div>

<div class="title-bg">
	<div class="title">İletişim Formu</div>
</div>
<div class="col-md-4 mx-auto">

<div class="myform form">
	<form action="sendMail.php"  method="POST" onsubmit="return checkForm(this);">
		
		<div class="form-group">
			<label for="name">Ad Soyad<span>*</span></label>
			<input type="text" name="user_name" class="form-control" id="name">
		</div>
		<div class="form-group">
			<label for="email">Mail<span>*</span></label>
			<input type="email" name="email" class="form-control" id="email">
		</div>
		<div class="form-group">
			<label for="text">Mesajınız<span>*</span></label>
			<textarea name="message" class="form-control" id="text"></textarea>
		</div>
		<div class="form-group">
			<img src="captcha.php" width="120" height="30" border="1" alt="CAPTCHA"> 
			<input type="text" size="15" maxlength="5" name="captcha" value="">
		</div>
		


		<button type="submit" class="btn btn-default btn-success btn-md">Formu Gönder</button>

	</form>
</div>

</div>

<div class="spacer"></div>

</div>

<?php include 'footer.php' ?>