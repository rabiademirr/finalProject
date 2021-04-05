<?php 
error_reporting(0);
include 'header.php'; 

$askBank=$db->prepare("SELECT * FROM bank order by bank_id ASC ");
$askBank->execute(array());




?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Banka Listesi <small>

              <?php 

              if ($_GET['status']=="ok") {?>

              <b style="color:green;"> Banka Listesi Başarıyla Güncellendi...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">Banka Listesi Güncellenemedi!!</b>

              <?php }

              ?>


            </small></h2>
         
            <div class="clearfix"></div>
            <div align="right">  <a href="bankAdd.php"><button class="btn btn-success btn-xm">Banka Ekle</button></a></div>

          </div>


          <div class="x_content">


            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Banka Ad</th>
                  <th>Banka IBAN</th>
                   <th>Banka Hesap Adı</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $no=0;

                while($getBank=$askBank->fetch(PDO::FETCH_ASSOC)) { $no++?>


                <tr>
                  <td width="5"><?php echo $no;; ?></td>
                  <td><?php echo $getBank['bank_name'] ?></td>
                   <td><?php echo $getBank['bank_iban'] ?></td>
                    <td><?php echo $getBank['bank_accountname'] ?></td>
               
              <!--   <td><center><?php 

                  if ($getBank['bank_status']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>-->

                  <td><center>
                    <a href="bankEdit.php?bank_id=<?php echo $getBank['bank_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../operation/operation.php?bank_id=<?php echo $getBank['bank_id']; ?>&bankDelete=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
