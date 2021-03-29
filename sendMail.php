<?php
include 'admin/operation/connect.php';
require 'src/Exception.php'; //Mail gönderirken bir hata ortaya çıkarsa hata mesajlarını görebilmek için gerekli. Şart değil
require 'src/PHPMailer.php'; //Mail göndermek için gerekli.
require 'src/SMTP.php'; //SMTP ile mail göndermek için gerekli.

use PHPMailer\PHPMailer\PHPMailer; //Kullanılacak sınıfın (PHPMailer) yolu belirtiliyor ve projeye dahil ediliyor
//use PHPMailer\PHPMailer\Exception;

$askSetting=$db->prepare("SELECT * FROM setting where setting_id=:setting_id");
$askSetting->execute(array(
   'setting_id'=>setting_id));
$getSetting=$askSetting->fetch(PDO::FETCH_ASSOC);



$user_name=$_POST['user_name'];
$email=$_POST['email'];
$message=$_POST['message'];






$mail = new PHPMailer(); //PHPMailer sınıfı kuruluyor

$mail->Host = 'smtp.gmail.com'; //SMPT mail sunucusu. Ornek: smtp.yandex.com (YANDEX MAIL), smtp.gmail.com (GOOGLE/GMAIL), smtp.live.com (HOTMAIL), mail.ornekmailsunucusu.com (SITENIZE OZEL MAIL SUNUCU)
$mail->Username = $getSetting['setting_smtpuser']; //Tanımlanan web sunucusuna ait mail hesabı kullanıcı adı. Ornek: gonderenmailadresi@yandex.com, mail@domainadresi.com
$mail->Password =  $getSetting['setting_smtppassword'];//Mail hesabı şifre
$mail->Port =  $getSetting['setting_smtpport'];; //Mail sunucu mail gönderme portu. Ornek: 587, 465
$mail->SMTPSecure = 'tls'; //Veri gizliliği yöntemi. Örnek: tls, ssl

$mail->isSMTP(); //SMPT kullanarak mail gönderilecek
$mail->SMTPAuth = true; //SMPT kimlik doğrulanmasını etkinleştir

$mail->isHTML(true); //Mail içeriğinde HTML etiketlerinin algılanmasına izin vermek. False olarak seçilirse ve mail içeriğinde HTML içerikleri varsa etiketler algılanmaksızın normal düz yazı olarak içerikte belirecek

$mail->CharSet = "UTF-8"; //Mail başlık, konu ve içerikte türkçe karakter desteği mevcut
$mail->setLanguage('tr', 'language/'); //hata mesajlarını tr dili ile yazdır. 'language' isimli klasörden dil ayarları çekilir. Varsayılan olarak ingilizce seçilidir
$mail->SMTPDebug  = 2; //işlem sürecini göster. Hataları belirlemenizi kolaylaştırır

$mail->setFrom($email, $user_name); //Tanımlanan web sunucusuna ait bir gönderen mail adresi ve isim. Username kısmında belirtilen mail adresi ile aynı olmalı. Ornek: gonderenmailadresi@yandex.com, mail@domainadresi.com
//$mail->addReplyTo('gonderenmailadresi2@hotmail.com', 'Muhammed Yaman'); //Mailin gönderildiği kişi maili yanıtlamak isterse buradaki mail adresine mail gönderilmesi gerektiği belirtilir
$mail->addAddress($getSetting['setting_smtpuser'], $getSetting['setting_author']); //Gönderilecek mail adresi ve isim. İsim yazılmazsa gönderilen kişi kısmında gönderilen kişinin mail adresi yazar. Ornek: alanmailadresi@hotmail.com
//$mail->addCC('haberdarmailadresi@hotmail.com', 'Mert'); //Gönderilecek mail bu adrese de gidecek. Aynı zamanda bu adrese gittiği de mail mesajında belirtilecek.
//$mail->addBCC('haberdarmailadresi2@gmail.com', 'Ömer'); //Gönderilecek mail bu adrese de gidecek. Ancak bu adrese gittiği mail mesajında belirmeyecek.

$mail->Subject = 'Müşteri-İletişim'; //Mail konusu
$mail->Body = //Mail mesaj içeriği

	$message;
;
$mail->addAttachment('files/Dusk_on_the_Yangtze_River.jpg', 'resim_ismi.jpg'); //Mail içerisinde ek dosya gönderimi sağlar. Bu kodların çalıştığı klasör içerisindeki files dosyasındaki Dusk_on_the_Yangtze_River.jpg isimli dosyayı seç. Mail içerisinde bu dosyanın ismi 'resim_ismi.jpg' şeklinde gözüksün. İsim girilmezse dosyanın asıl ismi gözükecek
$mail->addAttachment('files/dosya.rar', 'dosya_ismi.rar');

$mail_gonder = $mail->send(); //Maili gönder ve sonucu değişkene aktar
if($mail_gonder){ //Mail gönderildi mi
	 Header("Location:contact.php?status=ok");
}else{
	 Header("Location:contact.php?status=no"); //Mail gönderilemezse sebebini belirten hata mesajını ekrana yazdır
}

?>