<?php include 'header.php'; 

include 'admin/operation/connect.php';
error_reporting(0);

$askMenu=$db->prepare("SELECT * FROM menu where menu_seourl=:sef");
$askMenu->execute(array(
   'sef'=>$_GET['sef']));
$getMenu=$askMenu->fetch(PDO::FETCH_ASSOC);


?>

	<div class="container">
		<div class="row">
		
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?php echo $getMenu['menu_name']; ?></div>
				</div>
			
				<div class="page-content">
					<p>
					<?php  echo $getMenu['menu_detail']; ?>
					</p>
					
				</div>
				
			</div>
			
           <!--  Sidebar-->

           <?php  include "sidebar.php"; ?>

		</div>
		<div class="spacer"></div>
	</div>
	 <?php include "footer.php"; ?>