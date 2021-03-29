<?php 
error_reporting(0);
include 'header.php'; 

$askMenu=$db->prepare("SELECT * FROM menu order by menu_order ASC  ");
$askMenu->execute(array());




?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Menü Listesi <small>

              <?php 

              if ($_GET['status']=="ok") {?>

              <b style="color:green;"> Menü Başarıyla Güncellendi...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">Menü Güncellenemedi!!</b>

              <?php }

              ?>


            </small></h2>
         
            <div class="clearfix"></div>
            <div align="right">  <a href="menuAdd.php"><button class="btn btn-success btn-xm">Menü Ekle</button></a></div>

          </div>


          <div class="x_content">


            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Menü Ad</th>
                  <th>Menü Url</th>
                  <th>Menu Sıra</th>
                  <th>Menü Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $no=0;

                while($getMenu=$askMenu->fetch(PDO::FETCH_ASSOC)) { $no++?>


                <tr>
                  <td width="5"><?php echo $no;; ?></td>
                  <td><?php echo $getMenu['menu_name'] ?></td>
                  <td><?php echo $getMenu['menu_url'] ?></td>
                  <td><?php echo $getMenu['menu_order'] ?></td>
               
                 <td><center><?php 

                  if ($getMenu['menu_status']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>

                  <td><center>
                    <a href="menuEdit.php?menu_id=<?php echo $getMenu['menu_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../operation/operation.php?menu_id=<?php echo $getMenu['menu_id']; ?>&menuDelete=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
