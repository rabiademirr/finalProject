<?php include 'header.php'; 
error_reporting(0);


?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Banka Ekle <small>
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
                    <form action="../operation/operation.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Banka Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="bank_name" placeholder="Banka adını giriniz"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Banka IBAN <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="bank_iban" placeholder="Banka iban numarasını giriniz"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Banka Hesap Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="bank_accountname" placeholder="Banka hesap adını giriniz"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                    
  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banka Durum <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="bank_status" required>

                  <option value="1" >Aktif</option>



                  <option value="0" >Pasif</option>


                 </select>
               </div>
             </div>
                  
             <input type="hidden" name="bank_id" value="<?php echo $getBank['bank_id'];  ?>">

                       
        
                      <div class="ln_solid"></div>
                      <div   class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <a type="submit"  href="bank.php" class="btn btn-warning">Banka Listesine Geri Dön</a>
                          <button type="submit" name="bankAdd" class="btn btn-success">Ekle</button>
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