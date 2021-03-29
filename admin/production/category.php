<?php 
error_reporting(0);
include 'header.php'; 

$askCategory=$db->prepare("SELECT * FROM category order by category_order ASC ");
$askCategory->execute(array());




?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategori Listesi <small>

              <?php 

              if ($_GET['status']=="ok") {?>

              <b style="color:green;"> Kategori Başarıyla Güncellendi...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">Kategori Güncellenemedi!!</b>

              <?php }

              ?>


            </small></h2>
         
            <div class="clearfix"></div>
            <div align="right">  <a href="categoryAdd"><button class="btn btn-success btn-xm">Kategori Ekle</button></a></div>

          </div>


          <div class="x_content">


            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Kategori Ad</th>
                  <th>Kategori Sıra</th>
                  <!--<th>Kategori Durum</th>-->
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $no=0;

                while($getCategory=$askCategory->fetch(PDO::FETCH_ASSOC)) { $no++?>


                <tr>
                  <td width="5"><?php echo $no;; ?></td>
                  <td><?php echo $getCategory['category_name'] ?></td>
                  <td><?php echo $getCategory['category_order'] ?></td>
               
             <!--    <td><center><?php 

                  if ($getCategory['category_status']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>-->

                  <td><center>
                    <a href="categoryEdit.php?category_id=<?php echo $getCategory['category_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../operation/operation.php?category_id=<?php echo $getCategory['category_id']; ?>&categoryDelete=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
