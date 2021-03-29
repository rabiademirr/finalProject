<?php 


try {
	$db=new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8",'root');
	//echo "baglanti başarili";
	
} catch (PDOException $e) {
	echo $e->getMessage();
}











?>