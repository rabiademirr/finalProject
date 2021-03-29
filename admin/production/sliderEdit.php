<?php include 'header.php'; 
error_reporting(0);

$askSlider=$db->prepare("SELECT * FROM slider where slider_id=:id");
$askSlider->execute(array(
   'id'=>$_GET['slider_id']));

$getSlider=$askSlider->fetch(PDO::FETCH_ASSOC);
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Slider Düzenle-><?php echo $getSlider['slider_name']; ?> <small>
                      <?php 
                      if($_GET['status']=="ok"){?>

                       <b style="color:green;">Güncelleme işlemi başarılı</b>
                   <?php }
                       elseif ($_GET['status']=="no") { ?>
                        <b style="color:red;">Güncelleme işlemi başarısız!!</b>
                        <?php }
                       

                       ?>



                    </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="../operation/operation.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mevcut Resim <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <img width="300" src="../../<?php echo $getSlider['slider_imgpath']; ?>">
                </div>
              </div>

              <div class="form-group" >
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name"  name="slider_imgpath"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Slider Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_name" value="<?php echo $getSlider['slider_name'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

  
   
             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Slider Link <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_link" value="<?php echo $getSlider['slider_link'] ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Slider Sıra <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="slider_order" value="<?php echo $getSlider['slider_order'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="slider_status" required>

                  <option value="1"   <?php echo $getSlider['slider_status'] == '1' ? 'selected=""' : ''; ?> >Aktif</option>



                  <option value="0"  <?php if ($getSlider['slider_status']==0) { echo 'selected=""'; } ?>>Pasif</option>


                 </select>
               </div>
             </div>
                  
             <input type="hidden" name="slider_id" value="<?php echo $getSlider['slider_id'];  ?>">

                       
        
                      <div class="ln_solid"></div>
                      <div   class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <a type="submit"  href="slider.php" class="btn btn-warning">Slider Listesine Geri Dön</a>
                          <button type="submit" name="sliderEdit" class="btn btn-success">Güncelle</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

<?php include 'footer.php';