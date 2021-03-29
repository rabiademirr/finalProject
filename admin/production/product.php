<?php 
error_reporting(0);
include 'header.php'; 

$askProduct=$db->prepare("SELECT * FROM product order by product_id DESC  ");
$askProduct->execute(array());




?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Listesi <small>

              <?php 

              if ($_GET['status']=="ok") {?>

              <b style="color:green;"> Ürün Listesi Başarıyla Güncellendi...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">Ürün Listesi Güncellenemedi!!</b>

              <?php }

              ?>


            </small></h2>
         
            <div class="clearfix"></div>
            <div align="right">  <a href="productAdd.php"><button class="btn btn-success btn-xm">Ürün Ekle</button></a></div>

          </div>


          <div class="x_content">


            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Resim</th>
                  <th>Ürün Ad</th>
                  <th>Ürün Stok</th>
                  <th>Ürün Fiyat</th>
                  <th>Ürün Durum</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

                 <tbody>

                <?php 

                $count=0;

                while($getProduct=$askProduct->fetch(PDO::FETCH_ASSOC)) { $count++?>


                <tr>
                 <td width="20"><?php echo $count; ?></td>
                  <td><img width="50" src="../../<?php echo $getProduct['product_imgpath']; ?>"></td>
                 <td><?php echo $getProduct['product_name'] ?></td>
                 <td><?php echo $getProduct['product_stock'] ?></td>
                 <td><?php echo $getProduct['product_price'] ?></td>
               

                 <td><center><?php 

                  if ($getProduct['product_status']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>


                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>


            <td><center><a href="productEdit.php?product_id=<?php echo $getProduct['product_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
            <td><center><a href="../operation/operation.php?product_id=<?php echo $getProduct['product_id']; ?>&productDelete=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
