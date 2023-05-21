<?php

session_start();
ob_start();

try{
	$db = new PDO("mysql:host=localhost; dbname=ist32ealsoftcom_test1; charset=utf8","ist32ealsoftcom_test1","halit123456789789");
} catch(PDOException $error) {
	echo "<center><b style='color:red;'>Veritabanı Bağlanılmadı!</b></center>"; $error->getMessage();
}
?>