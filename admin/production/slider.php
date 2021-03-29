<?php 
error_reporting(0);
include 'header.php'; 

$askSlider=$db->prepare("SELECT * FROM slider ");
$askSlider->execute(array());




?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider Ürün Listesi <small>

              <?php 

              if ($_GET['status']=="ok") {?>

              <b style="color:green;"> Slider Başarıyla Güncellendi...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">Slider Güncellenemedi!!</b>

              <?php }

              ?>


            </small></h2>
         
            <div class="clearfix"></div>
            <div align="right">  <a href="sliderAdd.php"><button class="btn btn-success btn-xm">Slider Ekle</button></a></div>

          </div>


          <div class="x_content">


            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Resim</th>
                  <th>Slider Ad</th>
                  
                  <th>Slider Sıra</th>
                  <th>Slider Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $no=0;

                while($getSlider=$askSlider->fetch(PDO::FETCH_ASSOC)) { $no++?>


                <tr>
                  <td width="5"><?php echo $no;; ?></td>
                     <td><img width="100" src="../../<?php echo $getSlider['slider_imgpath'] ?>"></td>
                  <td><?php echo $getSlider['slider_name'] ?></td>
               
                  <td><?php echo $getSlider['menu_order'] ?></td>
               
                <!-- <td><center><?php 

                  if ($getSlider['slider_status']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td> -->

              <td><center><?php 

                       if ($getSlider['slider_status']==0) {?>

                       <a href="../operation/operation.php?slider_id=<?php echo $getSlider['slider_id'] ?>&slider_forward=1&slider_status=ok"><button class="btn btn-success btn-xs">Öne Çıkar</button></a>


                       <?php } elseif ($getSlider['slider_status']==1) {?>


                       <a href="../operation/operation.php?slider_id=<?php echo $getSlider['slider_id'] ?>&slider_forward=0&slider_status=ok"><button class="btn btn-warning btn-xs">Öne Çıkarma</button></a>

                       <?php } ?>


                     </center></td>




                  <td><center>
                    <a href="sliderEdit.php?slider_id=<?php echo $getSlider['slider_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../operation/operation.php?slider_id=<?php echo $getSlider['slider_id']; ?>&sliderDelete=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                </tr>

         <?php  }

          ?>


              </tbody>
            </table>



          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
