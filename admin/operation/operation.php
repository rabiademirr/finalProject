<?php
ob_start();
session_start();
include 'connect.php';
include '../production/function.php';



if(isset($_POST['adminLogin'])) {

   $user_mail=$_POST['user_mail'];
   $user_password=md5($_POST['user_password']);
$askUser=$db->prepare("SELECT * FROM user where user_mail=:mail and user_password=:password and
  user_authority=:authority");
$askUser->execute(array(
   'mail'=> $user_mail,
    'password'=>$user_password,
    'authority'=>1
 ));
 $count=$askUser->rowCount();

  if($count==1){
    $_SESSION['user_mail']=$user_mail;
     header("Location:../production/index.php");
    exit();

  } else {
    header("Location:../production/login.php?status=no");
    exit();
  }

}




if (isset($_POST['userLogin'])) {


  
   $user_mail=htmlspecialchars($_POST['user_mail']); 
   $user_password=md5($_POST['user_password']); 



  $askUser=$db->prepare("SELECT * FROM user WHERE user_mail=:mail and user_authority=:authority and user_password=:password and user_status=:status");
  $askUser->execute(array(
    'mail' => $user_mail,
    'authority' => 2,
    'password' => $user_password,
    'status' => 1
    ));


  $count=$askUser->rowCount();



  if ($count==1) {

     $_SESSION['userUser_mail']=$user_mail;

    header("Location:../../");

   

    exit;
    




  } else {
              header("Location:../../?status=unsuccessfullLogin");   

}
}






if (isset($_POST['userSave'])) {

  
  echo $user_name=htmlspecialchars($_POST['user_name']); echo "<br>";//htmlspecialchars gönderilen posttaki zararlı kodları ve scriptleri temizler
  echo $user_mail=htmlspecialchars($_POST['user_mail']); echo "<br>";

  echo $user_passwordone=trim($_POST['user_passwordone']); echo "<br>";
  echo $user_passwordtwo=trim($_POST['user_passwordtwo']); echo "<br>";



  if ($user_passwordone==$user_passwordtwo) {


    if (strlen($user_passwordone)>=6) {


      $askUser=$db->prepare("select * from user where user_mail=:mail");
      $askUser->execute(array(
        'mail' => $user_mail
        ));

    
      $count=$askUser->rowCount();



      if ($count==0) {

        $password=md5($user_passwordone);

        $user_authority=2;
        $user_status=1;

        $userSave=$db->prepare("INSERT INTO user SET
          user_name=:user_name,
          user_mail=:user_mail,
           user_status=:user_status,
          user_password=:user_password,
          user_authority=:user_authority
          ");
        $insert=$userSave->execute(array(
          'user_name' => $user_name,
          'user_mail' => $user_mail,
          'user_status' => $user_status,
          'user_password' => $password,
          'user_authority' => $user_authority

          ));

        if ($insert) {


          header("Location:../../register.php?status=successfullrecord");


        } else {


          header("Location:../../register.php?status=unsuccesfull");
        }

      } else {

        header("Location:../../register.php?status=currentrecord");



      }



    } else {


      header("Location:../../register.php?status=misspassword");


    }



  } else {



    header("Location:../../register.php?status=diffpassword");
  }
  


}


if(isset($_POST['userEdit']))  {

$user_id=$_POST['user_id'];

$userEdit=$db->prepare("UPDATE user SET 

    user_tc=:user_tc,
    user_name=:user_name,
    user_mail=:user_mail,
    user_gsm=:user_gsm,
    user_status=:user_status
     WHERE user_id=$user_id");
   
   $update=$userEdit->execute(array(
      'user_tc' =>$_POST['user_tc'],
      'user_name' =>$_POST['user_name'],
      'user_mail' =>$_POST['user_mail'],
      'user_gsm' =>$_POST['user_gsm'],
       'user_status' =>$_POST['user_status']

   ));

//eğer güncelleme işlemi başarılıyla durum değişkeni ok, değilse no
 if($update)  {
  header("Location:../production/userEdit.php?user_id=$user_id&status=ok");
 }else {
    header("Location:../production/user.php?user_id=$user_id&status=no");


}
}



if(isset($_POST['generalSettingSave']))  {

$saveSetting=$db->prepare("UPDATE setting SET 

    setting_title=:setting_title,
    setting_description=:setting_description,
    setting_keywords=:setting_keywords,
    setting_author=:setting_author WHERE setting_id=0");
   
   $update=$saveSetting->execute(array(
      'setting_title' =>$_POST['setting_title'],
      'setting_description' =>$_POST['setting_description'],
      'setting_keywords' =>$_POST['setting_keywords'],
      'setting_author' =>$_POST['setting_author']
   ));

//eğer güncelleme işlemi başarılıyla durum değişkeni ok, değilse no
 if($update)  {
 	header("Location:../production/generalSetting.php?status=ok");
 }else {
 	 	header("Location:../production/generalSetting.php?status=no");


}
}


if(isset($_POST['contactSettingSave']))  {

$saveSetting=$db->prepare("UPDATE setting SET 

    setting_phone=:setting_phone,
    setting_gsm=:setting_gsm,
    setting_fax=:setting_fax,
    setting_mail=:setting_mail ,
    setting_district=:setting_district,
    setting_province=:setting_province,
    setting_address=:setting_address,
    setting_shift=:setting_shift 

    WHERE setting_id=0");
   
   $update=$saveSetting->execute(array(
      'setting_phone' =>$_POST['setting_phone'],
      'setting_gsm' =>$_POST['setting_gsm'],
      'setting_fax' =>$_POST['setting_fax'],
      'setting_mail' =>$_POST['setting_mail'],
       'setting_district' =>$_POST['setting_district'],
      'setting_province' =>$_POST['setting_province'],
      'setting_address' =>$_POST['setting_address'],
      'setting_shift' =>$_POST['setting_shift'],
   ));

//eğer güncelleme işlemi başarılıyla durum değişkeni ok, değilse no
 if($update)  {
 	header("Location:../production/contactSetting.php?status=ok");
 }else {
 	 	header("Location:../production/contactSetting.php?status=no");


}
}

if(isset($_POST['apiSettingSave']))  {

$saveSetting=$db->prepare("UPDATE setting SET 

    setting_analystic=:setting_analystic,
    setting_maps=:setting_maps,
    setting_zopim=:setting_zopim WHERE setting_id=0");
   
   $update=$saveSetting->execute(array(
      'setting_analystic' =>$_POST['setting_analystic'],
      'setting_maps' =>$_POST['setting_maps'],
      'setting_zopim' =>$_POST['setting_zopim']
   ));

//eğer güncelleme işlemi başarılıyla durum değişkeni ok, değilse no
 if($update)  {
 	header("Location:../production/apiSetting.php?status=ok");
 }else {
 	 	header("Location:../production/apiSetting.php?status=no");


}
}

if(isset($_POST['socialSettingSave']))  {

$saveSetting=$db->prepare("UPDATE setting SET 

    setting_facebook=:setting_facebook,
    setting_twitter=:setting_twitter,
    setting_youtube=:setting_youtube,
    setting_google=:setting_google WHERE setting_id=0");
   
   $update=$saveSetting->execute(array(
      'setting_facebook' =>$_POST['setting_facebook'],
      'setting_twitter' =>$_POST['setting_twitter'],
      'setting_youtube' =>$_POST['setting_youtube'],
      'setting_google' =>$_POST['setting_google']
   ));

//eğer güncelleme işlemi başarılıyla durum değişkeni ok, değilse no
 if($update)  {
 	header("Location:../production/socialSetting.php?status=ok");
 }else {
 	 	header("Location:../production/socialSetting.php?status=no");


}
}

if(isset($_POST['mailSettingSave']))  {

$saveSetting=$db->prepare("UPDATE setting SET 

    setting_smtpuser=:setting_smtpuser,
    setting_smtppassword=:setting_smtppassword,
    setting_smtphost=:setting_smtphost,
    setting_smtpport=:setting_smtpport WHERE setting_id=0");
   
   $update=$saveSetting->execute(array(
      'setting_smtpuser' =>$_POST['setting_smtpuser'],
      'setting_smtppassword' =>$_POST['setting_smtppassword'],
      'setting_smtphost' =>$_POST['setting_smtphost'],
      'setting_smtpport' =>$_POST['setting_smtpport']
   ));

//eğer güncelleme işlemi başarılıyla durum değişkeni ok, değilse no
 if($update)  {
 	header("Location:../production/mailSetting.php?status=ok");
 }else {
 	 	header("Location:../production/mailSetting.php?status=no");


}
}

if(isset($_POST['aboutUsSave']))  {

$saveAbout=$db->prepare("UPDATE about SET 

    about_title=:about_title,
    about_description=:about_description,
    about_video=:about_video,
    about_mission=:about_mission,
     about_vision=:about_vision
    WHERE about_id=0");
   
   $update=$saveAbout->execute(array(
      'about_title' =>$_POST['about_title'],
      'about_description' =>$_POST['about_description'],
      'about_video' =>$_POST['about_video'],
      'about_mission' =>$_POST['about_mission'],
      'about_vision' =>$_POST['about_vision']
   ));

//eğer güncelleme işlemi başarılıyla durum değişkeni ok, değilse no
 if($update)  {
 	header("Location:../production/aboutUsSetting.php?status=ok");
 }else {
 	 	header("Location:../production/aboutUsSetting.php?status=no");


}
}

if($_GET['userDelete']=="ok"){
$delete=$db->prepare("DELETE FROM user WHERE user_id=:id ");
$check=$delete->execute(array(
 'id'=>$_GET['user_id']));

if($check) {
header("Location:../production/user.php?delete=ok");

}else {
  header("Location:../production/user.php?delete=no");

}



}

if(isset($_POST['menuEdit']))  {

$menu_id=$_POST['menu_id'];
$menu_seourl=seo($_POST['menu_name']);

$menuEdit=$db->prepare("UPDATE menu SET 

    menu_name=:menu_name,
    menu_detail=:menu_detail,
    menu_url=:menu_url,
    menu_order=:menu_order,
    menu_seourl=:menu_seourl,
    menu_status=:menu_status
     WHERE menu_id={$_POST['menu_id']}");
   
   $update=$menuEdit->execute(array(
      'menu_name' =>$_POST['menu_name'],
      'menu_detail' =>$_POST['menu_detail'],
      'menu_url' =>$_POST['menu_url'],
      'menu_order' =>$_POST['menu_order'],
       'menu_seourl' =>$menu_seourl,
       'menu_status' =>$_POST['menu_status'],

   ));

 if($update)  {
  header("Location:../production/menuEdit.php?menu_id=$menu_id&status=ok");
 }else {
    header("Location:../production/menu.php?menu_id=$menu_id&status=no");


}
}

if($_GET['menuDelete']=="ok"){
$delete=$db->prepare("DELETE FROM menu WHERE menu_id=:id ");
$check=$delete->execute(array(
 'id'=>$_GET['menu_id']));

if($check) {
header("Location:../production/menu.php?delete=ok");

}else {
  header("Location:../production/menu.php?delete=no");

}



}


if (isset($_POST['menuAdd'])) {


  $menu_seourl=seo($_POST['menu_name']);


  $menuAdd=$db->prepare("INSERT INTO menu SET
    menu_name=:menu_name,
    menu_detail=:menu_detail,
    menu_url=:menu_url,
    menu_order=:menu_order,
    menu_seourl=:menu_seourl,
    menu_status=:menu_status
    ");

  $insert=$menuAdd->execute(array(
    'menu_name' => $_POST['menu_name'],
    'menu_detail' => $_POST['menu_detail'],
    'menu_url' => $_POST['menu_url'],
    'menu_order' => $_POST['menu_order'],
    'menu_seourl' => $menu_seourl,
    'menu_status' => $_POST['menu_status']
    ));


  if ($insert) {

    Header("Location:../production/menu.php?status=ok");

  } else {

    Header("Location:../production/menu.php?status=no");
  }

}



if (isset($_POST['editLogo'])) {

  

  $uploads_dir = '../../dimg';

  @$tmp_name = $_FILES['setting_logo']["tmp_name"];
  @$name = $_FILES['setting_logo']["name"];

  $randnumber=rand(20000,32000);
  $refimgpath=substr($uploads_dir, 6)."/".$randnumber.$name;//aynı dosyayı ikinci kez yüklediğimizde dosya isimlerinin çakışmaması için

  @move_uploaded_file($tmp_name, "$uploads_dir/$randnumber$name");

  
  $edit=$db->prepare("UPDATE setting SET
    setting_logo=:logo
    WHERE setting_id=0");
  $update=$edit->execute(array(
    'logo' => $refimgpath
    ));



  if ($update) {

    $deleteImgUnlink=$_POST['oldPath'];//aynı dosyayı ikinci kez yüklediğimizde yenisini yüklerken eskisini silmesi için
    unlink("../../$deleteImgUnlink");

    Header("Location:../production/generalSetting.php?status=ok");

  } else {

    Header("Location:../production/generalSetting.php?status=no");
  }

}


if (isset($_POST['sliderAdd'])) {


  $uploads_dir = '../../dimg/slider';
  @$tmp_name = $_FILES['slider_imgpath']["tmp_name"];
  @$name = $_FILES['slider_imgpath']["name"];
  
  $randnumber1=rand(20000,32000);
  $randnumber2=rand(20000,32000);
  $randnumber3=rand(20000,32000);
  $randnumber4=rand(20000,32000);  
  $randname=$randnumber1.$randnumber2.$randnumber3.$randnumber4;
  $refimgpath=substr($uploads_dir, 6)."/".$randname.$name;
  @move_uploaded_file($tmp_name, "$uploads_dir/$randname$name");
  


  $save=$db->prepare("INSERT INTO slider SET
    slider_name=:slider_name,
    slider_order=:slider_order,
    slider_link=:slider_link,
    slider_imgpath=:slider_imgpath,
    slider_description=:slider_description
    ");
  $insert=$save->execute(array(
    'slider_name' => $_POST['slider_name'],
    'slider_order' => $_POST['slider_order'],
    'slider_link' => $_POST['slider_link'],
    'slider_imgpath' => $refimgpath,
    'slider_description'=>$_POST['slider_description']
    ));

  if ($insert) {

    Header("Location:../production/slider.php?status=ok");

  } else {

    Header("Location:../production/slider.php?status=no");
  }




}




if (isset($_POST['sliderEdit'])) {

  
  if($_FILES['slider_imgpath']["size"] > 0)  { 


    $uploads_dir = '../../dimg/slider';
    @$tmp_name = $_FILES['slider_imgpath']["tmp_name"];
    @$name = $_FILES['slider_imgpath']["name"];
    $randnumber1=rand(20000,32000);
    $randnumber2=rand(20000,32000);
    $randnumber3=rand(20000,32000);
    $randnumber4=rand(20000,32000);
    $randname=$randnumber1.$randnumber2.$randnumber3.$randnumber4;
    $refimgpath=substr($uploads_dir, 6)."/".$randname.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$randname$name");

    $edit=$db->prepare("UPDATE slider SET
      slider_name=:name,
      slider_link=:link,
      slider_order=:order,
      slider_status=:status,
      slider_imgpath=:imgpath 
      WHERE slider_id={$_POST['slider_id']}");
    $update=$edit->execute(array(
      'name' => $_POST['slider_name'],
      'link' => $_POST['slider_link'],
      'order' => $_POST['slider_order'],
      'status' => $_POST['slider_status'],
      'imgpath' => $refimgpath

      ));
    

    $slider_id=$_POST['slider_id'];

    if ($update) {

      $imgdeleteunlink=$_POST['slider_imgpath'];
      unlink("../../$imgdeleteunlink");

      Header("Location:../production/sliderEdit.php?slider_id=$slider_id&status=ok");

    } else {

      Header("Location:../production/sliderEdit.php?status=no");
    }



  } else {

    $edit=$db->prepare("UPDATE slider SET
     slider_name=:name,
      slider_link=:link,
      slider_order=:order,
      slider_status=:status,
      slider_imgpath=:imgpath 
      WHERE slider_id={$_POST['slider_id']}");
    $update=$edit->execute(array(
       'name' => $_POST['slider_name'],
      'link' => $_POST['slider_link'],
      'order' => $_POST['slider_order'],
      'status' => $_POST['slider_status'],
      'imgpath' => $refimgpath,
      ));

    $slider_id=$_POST['slider_id'];

    if ($update) {

      Header("Location:../production/sliderEdit.php?slider_id=$slider_id&status=ok");

    } else {

      Header("Location:../production/sliderEdit.php?status=no");
    }
  }

}

if ($_GET['sliderDelete']=="ok") {
  
  $delete=$db->prepare("DELETE from slider where slider_id=:slider_id");
  $check=$delete->execute(array(
    'slider_id' => $_GET['slider_id']
    ));

  if ($check) {

    $imgDeleteunlink=$_GET['slider_imgpath'];
    unlink("../../$imgdeleteunlink");

    Header("Location:../production/slider.php?status=ok");

  } else {

    Header("Location:../production/slider.php?status=no");
  }

}

if(isset($_POST['categoryEdit']))  {

$category_id=$_POST['category_id'];
$category_seourl=seo($_POST['category_name']);

$categoryEdit=$db->prepare("UPDATE category SET 

    category_name=:name,
    category_seourl=:seourl,
    category_order=:category_order
     WHERE category_id={$_POST['category_id']}");
   
   $update=$categoryEdit->execute(array(
      'name' =>$_POST['category_name'],
      'seourl' =>$category_seourl,
      'category_order' =>$_POST['category_order']
   ));

 if($update)  {
  header("Location:../production/categoryEdit.php?category_id=$category_id&status=ok");
 }else {
    header("Location:../production/category.php?category_id=$category_id&status=no");


}
}

if($_GET['categoryDelete']=="ok"){
$delete=$db->prepare("DELETE FROM category WHERE category_id=:id ");
$check=$delete->execute(array(
 'id'=>$_GET['category_id']));

if($check) {
header("Location:../production/category.php?delete=ok");

}else {
  header("Location:../production/category.php?delete=no");

}



}

if (isset($_POST['categoryAdd'])) {

  $category_seourl=seo($_POST['category_name']);

  $save=$db->prepare("INSERT INTO category SET
    category_name=:name,
    category_seourl=:seourl,
    category_order=:order
     
    ");
  $insert=$save->execute(array(
    'name' => $_POST['category_name'],
    'seourl' => $category_seourl,
    'order' => $_POST['category_order']
      
    ));

  if ($insert) {

    Header("Location:../production/category.php?status=ok");

  } else {

    Header("Location:../production/category.php?status=no");
  }

}


if ($_GET['categoryDelete']=="ok") {
  
  $delete=$db->prepare("DELETE from category where category_id=:category_id");
  $check=$delete->execute(array(
    'category_id' => $_GET['category_id']
    ));

  if ($kontrol) {

    Header("Location:../production/category.php?durum=ok");

  } else {

    Header("Location:../production/category.php?durum=no");
  }

}

if ($_GET['productDelete']=="ok") {
  
  $delete=$db->prepare("DELETE from product where product_id=:product_id");
  $check=$delete->execute(array(
    'product_id' => $_GET['product_id']
    ));

  if ($check) {

    Header("Location:../production/product.php?status=ok");

  } else {

    Header("Location:../production/product.php?status=no");
  }

}

if (isset($_POST['productEdit'])) {

  $product_id=$_POST['product_id'];
  $product_seourl=seo($_POST['product_name']);

  

  $save=$db->prepare("UPDATE product SET
    category_id=:category_id,
    product_name=:product_name,
    product_description=:product_description,
    product_price=:product_price,
    product_standout=:product_standout,
    product_keywords=:product_keywords,
    product_status=:product_status,
    product_stock=:product_stock, 
    product_seourl=:seourl   
    WHERE product_id={$_POST['product_id']}");
  $update=$save->execute(array(
    'category_id' => $_POST['category_id'],
    'product_name' => $_POST['product_name'],
    'product_description' => $_POST['product_description'],
    'product_price' => $_POST['product_price'],
    'product_standout' => $_POST['product_standout'],
    'product_keywords' => $_POST['product_keywords'],
    'product_status' => $_POST['product_status'],
    'product_stock' => $_POST['product_stock'],
    'seourl' => $product_seourl

    ));

  if ($update) {

    Header("Location:../production/productEdit.php?status=ok&product_id=$product_id");

  } else {

    Header("Location:../production/productEdit.php?status=no&product_id=$product_id");
  }

}

/*if (isset($_POST['productEdit'])) {


  
  if($_FILES['product_imgpath']["size"] > 0)  { 

    $product_id=$_POST['product_id'];
  $product_seourl=seo($_POST['product_name']);



    $uploads_dir = '../../dimg/product';
    @$tmp_name = $_FILES['product_imgpath']["tmp_name"];
    @$name = $_FILES['product_imgpath']["name"];
    $randnumber1=rand(20000,32000);
    $randnumber2=rand(20000,32000);
    $randnumber3=rand(20000,32000);
    $randnumber4=rand(20000,32000);
    $randname=$randnumber1.$randnumber2.$randnumber3.$randnumber4;
    $refimgpath=substr($uploads_dir, 6)."/".$randname.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$randname$name");
 
 
  $save=$db->prepare("UPDATE product SET
    category_id=:category_id,
    product_name=:product_name,
    product_description=:product_description,
    product_price=:product_price,
    product_standout=:product_standout,
    product_keywords=:product_keywords,
    product_status=:product_status,
    product_stock=:product_stock, 
    product_seourl=:seourl,
    product_imgpath=:product_imgpath    
    WHERE product_id={$_POST['product_id']}");
  $update=$save->execute(array(
    'category_id' => $_POST['category_id'],
    'product_name' => $_POST['product_name'],
    'product_description' => $_POST['product_description'],
    'product_price' => $_POST['product_price'],
    'product_standout' => $_POST['product_standout'],
    'product_keywords' => $_POST['product_keywords'],
    'product_status' => $_POST['product_status'],
    'product_stock' => $_POST['product_stock'],
    'seourl' => $product_seourl,
     'product_imgpath' => $refimgpath,

    ));


    $product_id=$_POST['product_id'];

    if ($update) {

      $imgdeleteunlink=$_POST['product_imgpath'];
      unlink("../../$imgdeleteunlink");

      Header("Location:../production/productEdit.php?product_id=$product_id&status=ok");

    } else {

      Header("Location:../production/productEdit.php?status=no");
    }



  } else {

      
  $save=$db->prepare("UPDATE product SET
    category_id=:category_id,
    product_name=:product_name,
    product_description=:product_description,
    product_price=:product_price,
    product_standout=:product_standout,
    product_keywords=:product_keywords,
    product_status=:product_status,
    product_stock=:product_stock, 
    product_seourl=:seourl,
    product_imgpath=:product_imgpath     
    WHERE product_id={$_POST['product_id']}");
  $update=$save->execute(array(
    'category_id' => $_POST['category_id'],
    'product_name' => $_POST['product_name'],
    'product_description' => $_POST['product_description'],
    'product_price' => $_POST['product_price'],
    'product_standout' => $_POST['product_standout'],
    'product_keywords' => $_POST['product_keywords'],
    'product_status' => $_POST['product_status'],
    'product_stock' => $_POST['product_stock'],
    'seourl' => $product_seourl,
     'product_imgpath' => $refimgpath,

    ));

    $product_id=$_POST['product_id'];

    if ($update) {

      Header("Location:../production/productEdit.php?product_id=$product_id&status=ok");

    } else {

      Header("Location:../production/productEdit.php?status=no");
    }
  }

}


*/



if (isset($_POST['productAdd'])) {
  $uploads_dir = '../../dimg/product';
  @$tmp_name = $_FILES['product_imgpath']["tmp_name"];
  @$name = $_FILES['product_imgpath']["name"];
  
  $randnumber1=rand(20000,32000);
  $randnumber2=rand(20000,32000);
  $randnumber3=rand(20000,32000);
  $randnumber4=rand(20000,32000);  
  $randname=$randnumber1.$randnumber2.$randnumber3.$randnumber4;
  $refimgpath=substr($uploads_dir, 6)."/".$randname.$name;
  @move_uploaded_file($tmp_name, "$uploads_dir/$randname$name");
  

  $product_seourl=seo($_POST['product_name']);

  $save=$db->prepare("INSERT INTO product SET
    category_id=:category_id,
    product_name=:product_name,
    product_description=:product_description,
    product_price=:product_price,
    product_keywords=:product_keywords,
    product_status=:product_status,
    product_stock=:product_stock, 
    product_seourl=:seourl,
      product_imgpath=:product_imgpath,
      product_standout=:product_standout
    ");
  $insert=$save->execute(array(
    'category_id' => $_POST['category_id'],
    'product_name' => $_POST['product_name'],
    'product_description' => $_POST['product_description'],
    'product_price' => $_POST['product_price'],
    'product_keywords' => $_POST['product_keywords'],
    'product_status' => $_POST['product_status'],
    'product_stock' => $_POST['product_stock'],
    'seourl' => $product_seourl,
     'product_imgpath' => $refimgpath,
      'product_standout' => 1

    ));

  if ($insert) {

    Header("Location:../production/product.php?status=ok");

  } else {

    Header("Location:../production/product.php?status=no");
  }

}



if (isset($_POST['saveComment'])) {

  $available_url=$_POST['available_url'];

  $addComment=$db->prepare("INSERT INTO comments SET
    comment_detail=:comment_detail,
    user_id=:user_id,
    product_id=:product_id

    ");

  $insert=$addComment->execute(array(
    'comment_detail' => $_POST['comment_detail'],
    'user_id' => $_POST['user_id'],
    'product_id' => $_POST['product_id']
    
    ));


  if ($insert) {

    Header("Location:$available_url?status=ok");

  } else {

    Header("Location:$available_url?status=no");
  }

}

if ($_GET['comment_confirmation']=="ok") {

  
  $edit=$db->prepare("UPDATE comments SET
    
    comment_confirmation=:comment_confirmation
    
    WHERE comment_id={$_GET['comment_id']}");
  
  $update=$edit->execute(array(

    'comment_confirmation' => $_GET['comment_forward']
    ));



  if ($update) {

    

    Header("Location:../production/comment.php?status=ok");

  } else {

    Header("Location:../production/comment.php?status=no");
  }

}

if ($_GET['deleteComment']=="ok") {
  
  $delete=$db->prepare("DELETE from comments where comment_id=:comment_id");
  $check=$delete->execute(array(
    'comment_id' => $_GET['comment_id']
    ));

  if ($check) {

    
    Header("Location:../production/comment.php?status=ok");

  } else {

    Header("Location:../production/comment.php?status=no");
  }

}

if (isset($_POST['addToCart'])) {

    $available_urlc=$_POST['available_urlc'];


  $addCart=$db->prepare("INSERT INTO cart SET
    product_piece=:product_piece,
    user_id=:user_id,
    product_id=:product_id  
    
    ");

  $insert=$addCart->execute(array(
    'product_piece' => $_POST['product_piece'],
    'user_id' => $_POST['user_id'],
    'product_id' => $_POST['product_id']
    
    ));


  if ($insert) {

    Header("Location:$available_urlc?statusc=ok");

  } else {

    Header("Location:$available_urlc?statusc=no");
  }

}



if (isset($_POST['bankAdd'])) {

  $add=$db->prepare("INSERT INTO bank SET
    bank_name=:bank_name,
    bank_status=:bank_status, 
    bank_accountname=:bank_accountname,
    bank_iban=:bank_iban
    ");
  $insert=$add->execute(array(
    'bank_name' => $_POST['bank_name'],
    'bank_status' => $_POST['bank_status'],
    'bank_accountname' => $_POST['bank_accountname'],
    'bank_iban' => $_POST['bank_iban']    
    ));

  if ($insert) {

    Header("Location:../production/bank.php?status=ok");

  } else {

    Header("Location:../production/bank.php?status=no");
  }

}
if (isset($_POST['bankEdit'])) {

  $bank_id=$_POST['bank_id'];

  $edit=$db->prepare("UPDATE bank SET

    bank_name=:bank_name,
     bank_iban=:bank_iban,
      bank_accountname=:bank_accountname,
    bank_status=:bank_status
    WHERE bank_id={$_POST['bank_id']}");
  $update=$edit->execute(array(
    'bank_name' => $_POST['bank_name'],
     'bank_iban' => $_POST['bank_iban'],
   'bank_accountname' => $_POST['bank_accountname'],
    'bank_status' => $_POST['bank_status']
 
       
    ));

  if ($update) {

    Header("Location:../production/bankEdit.php?bank_id=$bank_id&status=ok");

  } else {

    Header("Location:../production/bankEdit.php?bank_id=$bank_id&status=no");
  }


  

}

if ($_GET['bankDelete']=="ok") {
  
  $delete=$db->prepare("DELETE from bank where bank_id=:bank_id");
  $check=$delete->execute(array(
    'bank_id' => $_GET['bank_id']
    ));

  if ($check) {

    
    Header("Location:../production/bank.php?status=ok");

  } else {

    Header("Location:../production/bank.php?status=no");
  }

}


if (isset($_POST['userİnformationUpdate'])) {

  $user_id=$_POST['user_id'];

  $save=$db->prepare("UPDATE user SET
      user_name=:user_name,
    user_province=:user_province,
    user_district=:user_district,
    user_gsm=:user_gsm,
     user_address=:user_address
    WHERE user_id={$_POST['user_id']}");

  $update=$save->execute(array(

    'user_name' => $_POST['user_name'],
    'user_province' => $_POST['user_province'],
    'user_district' => $_POST['user_district'],
      'user_gsm' => $_POST['user_gsm'],
      'user_address' => $_POST['user_address']
    ));


  if ($update) {

    Header("Location:../../myAccount.php?user_id=$user_id&status=ok");

  } else {

    Header("Location:../../myAccount.php?user_id=$user_id&status=no");
  }

}




if (isset($_POST['updateUserPassword'])) {

  echo $user_oldpassword=trim($_POST['user_oldpassword']); echo "<br>";
  echo $user_passwordone=trim($_POST['user_passwordone']); echo "<br>";
  echo $user_passwordtwo=trim($_POST['user_passwordtwo']); echo "<br>";

  $user_password=md5($user_oldpassword);


  $askUser=$db->prepare("select * from user where user_password=:password");
  $askUser->execute(array(
    'password' => $user_password
    ));

  $count=$askUser->rowCount();



  if ($count==0) {

    header("Location:../../updatePassword?status=oldpassworderror");



  } else {



    if ($user_passwordone==$user_passwordtwo) {


      if (strlen($user_passwordone)>=6) {


        
        $password=md5($user_passwordone);

        $user_authority=2;

        $saveUser=$db->prepare("UPDATE user SET
          user_password=:user_password
          WHERE user_id={$_POST['user_id']}");

        
        $insert=$saveUser->execute(array(
          'user_password' => $password
          ));

        if ($insert) {


          header("Location:../../updatePassword.php?status=changepassword");
 

        } else {


          header("Location:../../updatePassword.php?status=no");
        }


      } else {


        header("Location:../../updatePassword.php?status=oldpassword");


      }

    } else {

      header("Location:../../updatePassword?status=notmatchpassword");

      exit;


    }


  }

  exit;

  if ($update) {

    header("Location:../../updatePassword?status=ok");

  } else {

    header("Location:../../updatePassword?status=no");
  }

}


if (isset($_POST['orderAdd'])) {

  $order_type="Banka EFT-Havale";



  $save=$db->prepare("INSERT INTO orders SET
    user_id=:user_id,
    order_type=:order_type, 
    order_bank=:order_bank,
    order_total=:order_total
    ");
  $insert=$save->execute(array(
    'user_id' => $_POST['user_id'],
    'order_type' => $order_type,
    'order_bank' => $_POST['order_bank'],
    'order_total' => $_POST['order_total']    
    ));

 
  if ($insert) {

    //Sipariş  başarıyla kadedilmişse;

    echo $order_id = $db->lastInsertId();

    echo "<hr>";


    $user_id=$_POST['user_id'];
    $askCart=$db->prepare("SELECT * FROM cart where user_id=:id");
    $askCart->execute(array(
      'id' => $user_id
      ));

    while($getCart=$askCart->fetch(PDO::FETCH_ASSOC)) {

      $product_id=$getCart['product_id']; 
      $product_piece=$getCart['product_piece'];

      $askProduct=$db->prepare("SELECT * FROM product where product_id=:id");
      $askProduct->execute(array(
        'id' => $product_id
        ));

      $getProduct=$askProduct->fetch(PDO::FETCH_ASSOC);
      
      echo $product_price=$getProduct['product_price'];


      
      $save=$db->prepare("INSERT INTO order_detail SET
        
        order_id=:order_id,
        product_id=:product_id, 
        product_price=:product_price,
        product_piece=:product_piece
        ");
      $insert=$save->execute(array(
        'order_id' => $order_id,
        'product_id' => $product_id,
        'product_price' => $product_price,
        'product_piece' => $product_piece

        ));


    }

    if ($insert) {

      // sipariş detay tablosuna insert işlemi yapıldı ise ürünleri cart tan sil

      $delete=$db->prepare("DELETE from cart where user_id=:user_id");
      $check=$delete->execute(array(
        'user_id' => $user_id
        ));

      
      Header("Location:../../myOrders?status=ok");
      exit;


    }


  } else {

    echo "başarısız";

    //Header("Location:../production/order.php?status=no");
  }


}

if ($_GET['slider_status']=="ok") {

  
  $edit=$db->prepare("UPDATE slider SET
    
    slider_status=:slider_status
    
    WHERE slider_id={$_GET['slider_id']}");
  
  $update=$edit->execute(array(

    'slider_status' => $_GET['slider_forward']
    ));



  if ($update) {

    

    Header("Location:../production/slider.php?status=ok");

  } else {

    Header("Location:../production/slider.php?status=no");
  }

}

if ($_GET['productCartDelete']=="ok") {


  
  
  $delete=$db->prepare("DELETE from cart where cart_id=:cart_id");
  $check=$delete->execute(array(
    'cart_id' => $_GET['cart_id']
    ));

  if ($check) {

    Header("Location:../../cart.php?status=ok");

  } else {

    Header("Location:../../cart.php?status=no");
  }

}

if ($_GET['product_standout']=="ok") {

  
  $edit=$db->prepare("UPDATE product SET
    
    product_standout=:product_standout
    
    WHERE product_id={$_GET['product_id']}");
  
  $update=$edit->execute(array(

    'product_standout' => $_GET['product_forward']
    ));



  if ($update) {

    

    Header("Location:../production/product.php?status=ok");

  } else {

    Header("Location:../production/product.php?status=no");
  }

}




  

 ?>