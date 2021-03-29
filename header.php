<?php 
include 'admin/operation/connect.php';
include 'admin/production/function.php';
error_reporting(0);
ob_start();
session_start();

$askSetting=$db->prepare("SELECT * FROM setting where setting_id=:id");
$askSetting->execute(array(
   'id'=>0));
$getSetting=$askSetting->fetch(PDO::FETCH_ASSOC);




$askUser=$db->prepare("SELECT * FROM user where user_mail=:mail ");
$askUser->execute(array(
  'mail' => $_SESSION['userUser_mail']
  ));
$count=$askUser->rowCount();
$getUser=$askUser->fetch(PDO::FETCH_ASSOC);



 ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <meta charset="UTF-8">
  <meta name="description" content="<?php echo $getSetting['setting_description'] ?>">
  <meta name="keywords" content="<?php echo $getSetting['setting_keywords'] ?>">
  <meta name="author" content="<?php echo $getSetting['setting_author'] ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $getSetting['setting_title'] ?></title>

    <!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	
	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	
	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">
	<link rel="stylesheet" href="css\owl.carousel.min.js">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

	
</script>

  </head>
  <body>
  <div id="wrapper">
	<div style="background:green; "  class="header"><!--Header -->
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-4 main-logo">
					<a  href="index.php"><img  src="<?php  echo $getSetting['setting_logo']; ?>" alt="logo" class="logo img-responsive" style= "border-radius: 10px;"></a>
				</div>
				<div    class="col-md-8">
					<div class="pushright">
						<div  class="top">
				<?php 

             if (!isset($_SESSION['userUser_mail'])) {?>

             <a href="#" id="reg" class="btn btn-default btn-success">Giriş Yap<span>-- yada --</span>Kayıt Ol</a>

             <?php } else { ?>

             <a  class="btn btn-default btn-success">Hoşgeldin<span>--</span><?php echo $getUser['user_name'] ?></a>

             <?php } ?>

							<div style="background: #C8E6C9" class="regwrap">
								<div class="row">
									<div class="col-md-6 regform">
										<div class="title-widget-bg">
											<div class="title-widget">Giriş Yap</div>
										</div>
										
										<form action="admin/operation/operation.php" method="POST" role="form">
											<div class="form-group">
												<input type="text" class="form-control" id="username" name="user_mail"  placeholder="kullanıcı adı">
											</div>
											<div class="form-group">
												<input type="password" name="user_password" class="form-control" id="password" placeholder="parola">
											</div>
											<div class="form-group">
												<button type="submit" name="userLogin" class="btn btn-default btn-success btn-sm">Giriş Yap</button>
												<a href="forgotPassword" class="btn btn-default btn-warning btn-sm">Şifreni mi Unuttun ?</a>
											</div>
										</form>
									</div>
									<div class="col-md-6">
										<div class="title-widget-bg">
											<div class="title-widget">Üye Değil misiniz?</div>
										</div>
										<p>
											Bir hesap oluşturarak daha hızlı alışveriş yapabilir, bir siparişin durumu hakkında güncel bilgi sahibi olabilirsiniz ....
										</p>
									<a href="register">	<button class="btn btn-default btn-primary">Üye Ol</button></a>
									</div>
								</div>
							</div>
							<div  class="srch-wrap">
								<a href="#" id="srch" class="btn btn-default btn-search "><i class="fa fa-search"></i></a>
							</div>
							<div   class="srchwrap">
								<div class="row">
									<div class="col-md-12">
										<form action="search" method="POST" class="form-horizontal" role="form">
										  <div class="form-group">
            
                                          <button name="search" class="btn btn-default   ">Ara</button>    
                                          <div class="col-sm-10">
                                          <input type="text" name="searching" minlength="3" class="form-control" id="search">
                                           </div>
                                           </div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dashed"></div>
	</div><!--Header -->
	<div class="main-nav"><!--end main-nav -->
		<div class="navbar navbar-default navbar-static-top">
  <div class="container">
   <div class="row">
    <div class="col-md-10">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
   </div>




		<div  class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
     <li><a href="index.php"  class="active">Anasayfa</a><div class="curve"></div></li>


     <?php 

     $askMenu=$db->prepare("SELECT * FROM menu where menu_status=:status order by menu_order ASC limit 5");
     $askMenu->execute(array(
      'status' => 1
      ));

     while($getMenu=$askMenu->fetch(PDO::FETCH_ASSOC)) {
       ?>


       <li><a href="

        <?php 

        if (!empty($getMenu['menu_url'])) {

          echo $getMenu['menu_url'];

        } else {


          echo "page-".seo($getMenu['menu_name']);

        }
        ?>


        "><?php echo $getMenu['menu_name'] ?></a></li>

        <?php } ?>

      </ul>
    </div>
</div>
<div class="col-md-2 machart">
						<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Sepetim</span>|<span class="allprice"><?php  echo $total_price; ?> TL</span></button>
						<div class="popcart">
							<table class="table table-condensed popcart-inner">
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
					 $total_price +=$getProduct['product_price']*$getCart['product_piece'];

					
					?>

									<tr>
										<td>
										<a href="product.htm"><img src="<?php echo $getProduct['product_imgpath']; ?>" alt="" class="img-responsive"></a>
										</td>
										<td><a href="product.htm"><?php echo $getProduct['product_name']; ?></a><br><span>Color: green</span></td>
										<td><?php echo $getCart['product_piece']; ?>X</td>
										<td><?php echo $getProduct['product_price']; ?> TL</td>
									<!--	<td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>-->
									  <td><center><a href="admin/operation/operation.php?cart_id=<?php echo $getCart['cart_id']; ?>&productCartDelete=ok"><button class="btn btn-danger btn-xs">X</button></a></center></td>
									</tr>
								<?php } ?>
									
								</tbody>
							</table>
							
							<br>
							<div class="btn-popcart">
								<a href="cart.php" class="btn btn-default btn-warning btn-sm">Sepete Git</a>
								
							</div>
							<div class="popcart-tot">
								<p>
									Toplam Tutar:<br>
									<span><?php  echo $total_price; ?> TL</span>
								</p>
							</div>
							<div class="clearfix"></div>
			</div>

						</div>



			<?php 

if (isset($_SESSION['userUser_mail'])) {?>

<ul style="background:#C8E6C9 " class="small-menu">
  <li><a href="myAccount" class="myacc">Hesap Bilgilerim</a></li>
  <li><a  href="myOrders" class="myshop">Siparişlerim</a></li>
  <li><a href="logout.php" class="mycheck">Güvenli Çıkış</a></li>
</ul>

<?php }

?>
</div>
</div>
</div>

