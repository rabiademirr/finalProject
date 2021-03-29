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
                    <h2> Ürün Ekle-> <small>
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
                    <form action="../operation/operation.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                           <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="product_imgpath"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>



              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

                  $product_id=$getProduct['category_id']; 

                  $askCategory=$db->prepare("SELECT * from category where category_top=:category_top order by category_order");
                  $askCategory->execute(array(
                    'category_top' => 0
                    ));

                    ?>
                    <select class="select2_multiple form-control" required="" name="category_id" >


                     <?php 

                     while($getCategory=$askCategory->fetch(PDO::FETCH_ASSOC)) {

                       $category_id=$getCategory['category_id'];

                       ?>

                       <option  value="<?php echo $getCategory['category_id']; ?>"><?php echo $getCategory['category_name']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Ürün Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="product_name" placeholder="Ürün adını giriniz" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

  
   <!--CK Editör -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="product_description"></textarea>
                </div>
              </div>

              <script type="text/javascript">

               CKEDITOR.replace( 'editor1',

               {

                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                forcePasteAsPlainText: true

              } 

              );

            </script>
            <!--CK Editör  end -->


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Ürün Fiyat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="product_price" placeholder="Ürün fiyatını giriniz"  required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Ürün Keywords <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="product_keywords" placeholder="Ürün keywordlerini giriniz" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                          <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Ürün Stok <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="product_stock" placeholder="Ürün stok adedini giriniz" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      


  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Öne Çıkar<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="product_status" required>

                  <option value="1" >Öne Çıkar</option>



                  <option value="0" >Öne Çıkarma</option>


                 </select>
               </div>
             </div>
                  

  <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="product_status" required>

                  <option value="1" >Aktif</option>



                  <option value="0" >Pasif</option>


                 </select>
               </div>
             </div>
                  

                       
        
                      <div class="ln_solid"></div>
                      <div   class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <a type="submit"  href="product.php" class="btn btn-warning">Ürün Listesine Geri Dön</a>
                          <button type="submit"  name="productAdd" class="btn btn-success">Ekle</button>
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