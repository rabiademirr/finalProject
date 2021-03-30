<?php 
error_reporting(0);
include 'header.php'; 





?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Sipariş Listesi <small>

            


            </small></h2>
         
            <div class="clearfix"></div>
           
          </div>


          <div class="x_content">


            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Sipariş Zaman</th>
                   <th>Sipariş ID</th>
                  <th>Kullanıcı ID</th>
                   <th>Sipariş Toplam Fiyat</th>
                  <th>Sipariş Tip</th>
                   <th>Sipariş Banka</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                
                 $askOrder=$db->prepare("SELECT * FROM orders where order_id ");
                 $askOrder->execute(array());

                $no=0;

                while($getOrder=$askOrder->fetch(PDO::FETCH_ASSOC)) { $no++?>


                <tr>
                  <td width="5"><?php echo $no;; ?></td>
                  <td><?php echo $getOrder['order_time'] ?></td>
                   <td> <?php echo $getOrder['order_id'] ?></td>
                  <td> <?php echo $getOrder['user_id'] ?></td>
                   <td><?php echo $getOrder['order_total'] ?></td>
                    <td><?php echo $getOrder['order_type'] ?></td>
                      <td><?php echo $getOrder['order_bank'] ?></td>
               
          

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
