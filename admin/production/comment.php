<?php 

include 'header.php'; 
error_reporting(0);

$askComment=$db->prepare("SELECT * FROM comments order by comment_confirmation ASC");
$askComment->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yorum Listesi <small>,

              <?php 

              if ($_GET['status']=="ok") {?>

              <b style="color:green;">İşlem Başarıyla Gerçekleşti...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">İşlem Başarısız!</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            
          </div>
          <div class="x_content">


            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Y.No</th>
                  <th>Kullanıcı Adı</th>
                  <th>Yorum Detayı</th>
                  <th>Ürün</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>

                </tr>
              </thead>

              <tbody>

                <?php 

                $count=0;

                while($getComment=$askComment->fetch(PDO::FETCH_ASSOC)) { $count++?>


                <tr>
                 <td width="20"><?php echo $count ?></td>
             
                 <td><?php 

                   $user_id=$getComment['user_id'];

                   $askUser=$db->prepare("SELECT * FROM user where user_id=:id");
                   $askUser->execute(array(
                    'id' => $user_id
                    ));

                   $getUser=$askUser->fetch(PDO::FETCH_ASSOC);

                   echo $getUser['user_name'];



                   ?></td>
                       <td width="100"><?php echo $getComment['comment_detail'] ?></td>
                   <td width="50"><?php 

                     $product_id=$getComment['product_id'];

                     $askProduct=$db->prepare("SELECT * FROM product where product_id=:id");
                     $askProduct->execute(array(
                      'id' =>  $product_id
                      ));

                     $getProduct=$askProduct->fetch(PDO::FETCH_ASSOC);


                     echo $getProduct['product_name'];



                     ?></td>
                     <td><center><?php 

                       if ($getComment['comment_confirmation']==0) {?>

                       <a href="../operation/operation.php?comment_id=<?php echo $getComment['comment_id'] ?>&comment_forward=1&comment_confirmation=ok"><button class="btn btn-success btn-xs">Onayla</button></a>


                       <?php } elseif ($getComment['comment_confirmation']==1) {?>


                       <a href="../operation/operation.php?comment_id=<?php echo $getComment['comment_id'] ?>&comment_forward=0&comment_confirmation=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>

                       <?php } ?>


                     </center></td>


                     


           
            <td><center><a href="../operation/operation.php?comment_id=<?php echo $getComment['comment_id']; ?>&deleteComment=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
