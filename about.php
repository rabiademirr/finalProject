<?php include 'header.php'; 

include 'admin/operation/connect.php';
error_reporting(0);

$askAbout=$db->prepare("SELECT * FROM about where about_id=:id");
$askAbout->execute(array(
   'id'=>0));
$getAbout=$askAbout->fetch(PDO::FETCH_ASSOC);


?>

	<div  class="container">
		<div   class="row">
			<div  class="col-md-12">
				<div    class="page-title-wrap">
					<div  class="page-title-inner">
					<div class="row">
						<div  class="col-md-4">
							<div  class="bigtitle">Hakkımızda</div>
						</div>
						
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title">Tanıtım Videosu</div>
				</div>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php  echo $getAbout['about_video'];?>" frameborder="0"></iframe>
				<div class="title-bg">

					<div class="title"><?php echo $getAbout['about_title']; ?></div>
				</div>
				<div class="page-content">
					<p>
					<?php  echo $getAbout['about_description']; ?>
					</p>
					
				</div>
				<div class="page-content">
					<div class="title-bg">
					<div class="title">Misyonumuz</div>
				</div>
					<p>
					
					<?php  echo $getAbout['about_mission']; ?>
					</p>
					
				</div>
				<div class="page-content">
					<div class="title-bg">
					<div class="title">Vizyonumuz</div>
				</div>
					<p>
					
					<?php  echo $getAbout['about_vision']; ?>
					</p>
					
				</div>
			</div>
			
           <!--  Sidebar-->

           <?php  include "sidebar.php"; ?>

		</div>
		<div class="spacer"></div>
	</div>
	 <?php include "footer.php"; ?>