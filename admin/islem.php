<?php include "baglan.php"; 

if(isset($_POST['genelguncelle'])){

	$ayarlar_id = $_GET['ayarlar_id'];

	$ayarlar_title 	= $_POST['ayarlar_title'];
	$ayarlar_keyw = $_POST['ayarlar_keyw'];
	$ayarlar_desc = $_POST['ayarlar_desc'];
	$ayarlar_siteurl = $_POST['ayarlar_siteurl'];
	$ayarlar_adres = $_POST['ayarlar_adres'];
	$ayarlar_telefon = $_POST['ayarlar_telefon'];
	$ayarlar_mail = $_POST['ayarlar_mail'];
	$ayarlar_instagram = $_POST['ayarlar_instagram'];
	$ayarlar_facebook = $_POST['ayarlar_facebook'];

	$ayarlar = $db->prepare('UPDATE ayarlar SET ayarlar_title=?, ayarlar_keyw=?, ayarlar_desc=?, ayarlar_siteurl=?, ayarlar_adres=?, ayarlar_telefon=?, ayarlar_mail=?, ayarlar_instagram=?, ayarlar_facebook=?   WHERE ayarlar_id=?');
	$update = $ayarlar->execute(array($ayarlar_title,$ayarlar_keyw,$ayarlar_desc,$ayarlar_siteurl,$ayarlar_adres,$ayarlar_telefon,$ayarlar_mail,$ayarlar_instagram,$ayarlar_facebook,$ayarlar_id));

	if($update){
		header("Location: genel-ayarlar.php?durum=yes");
	}else{
		header("Location: genel-ayarlar.php?durum=no");
	}

}
	// Slayt Ekle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
		if (isset($sliderekle)) {
			$kaynak= @$_FILES["slider_resim"]["tmp_name"];
			$isim= @$_FILES["slider_resim"]["name"];
			$boyut= @$_FILES["slider_resim"]["size"];
			$turu= @$_FILES["slider_resim"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: slider.php?slide-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {
						header("Location: slider.php?slide-ekle=boyutbuyuk");
					}else{
					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("INSERT INTO slider SET slider_baslik=?, slider_yazi=?,slider_buton=?,slider_resim=?");
						$insert = $query->execute (array($slider_baslik,$slider_yazi,$slider_buton,$resimAd));
						if ($insert) {
						header("Location: slider.php?durum=yes");
						}else{
					header("Location:  slider.php?durum=no");

					}
					
				}
			}

		}

		}	



// Slayt Güncelle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
				if (isset($sliderduzenle)) {
					$slider_id = $_GET["slider_id"];

			if ($_FILES["slider_resim"]["size"]> 0) { 
			$kaynak= @$_FILES["slider_resim"]["tmp_name"];
			$isim= @$_FILES["slider_resim"]["name"];
			$boyut= @$_FILES["slider_resim"]["size"];
			$turu= @$_FILES["slider_resim"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: slider.php?slide-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {	
						header("Location: slider.php?slide-ekle=boyutbuyuk");
					}else{

						// Önceki Resmi Silelim
						$sil =$db->prepare("SELECT *  FROM  slider WHERE slider_id=?");
						$sil->execute (array($slider_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["slider_resim"];

						unlink("../assets/img/hero-carousel/".$eski_resim["slider_resim"]);





					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("UPDATE  slider  SET slider_baslik=?, slider_yazi=?,slider_buton=?, slider_resim=? WHERE slider_id=?");
						$update = $query->execute (array($slider_baslik,$slider_yazi,$slider_buton,$resimAd,$slider_id));
						if ($update) {
						header("Location:slider.php?durum=yes");
						}else{
					header("Location:  slider.php?durum=no");

				}
					}
					
				}
			}
	}else{
		$query = $db->prepare("UPDATE  slider  SET slider_baslik=?,slider_yazi=?, slider_buton=? WHERE slider_id=?");
						$update = $query->execute (array($slider_baslik,$slider_yazi,$slider_buton,$slider_id));
						if ($update) {	
						header("Location: slider.php?durum=yess");
						}else{
					header("Location:  slider.php?durum=no");

						}
					}
					
				}


				// Slayt Silme İşlemi
		extract($_GET);
		if(isset($slidersil_id)){

			$sil =$db->prepare("SELECT *  FROM slider WHERE slider_id=?");
						$sil->execute (array($slidersil_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["slider_resim"];

						unlink("../assets/img/".$eski_resim["slider_resim"]);

						$query = $db->prepare("DELETE FROM slider WHERE slider_id=?");
						$delete = $query->execute (array($slidersil_id));
						if ($delete) {
						header("Location:slider.php?durum=yess");
						}else{
					header("Location: slider.php?durum=no");

				}

		}

	
		// Biz Ne Yaparız Ekle İşlem
		if(isset($_POST['bizneyapiyoruzekle'])){
	$urun_logo 	= $_POST['urun_logo'];
	$urun_baslik 	= $_POST['urun_baslik'];
	$urun_kisayazi 	= $_POST['urun_kisayazi'];

	$urunler = $db->prepare('INSERT INTO urunler SET urun_logo=?,urun_baslik=?,urun_kisayazi=?');
	$insert = $urunler->execute(array($urun_logo,$urun_baslik,$urun_kisayazi));

	if($insert){
		header("Location: bizneyapiyoruz.php?bizneyapiyoruz-ekle=yes");
	}else{
		header("Location: bizneyapiyoruz.php?bizneyapiyoruz-ekle=no");
	}

}


		// Biz Ne Yapıyoruz Güncelle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
				if (isset($bizneyapiyoruzduzenle)) {
					$urun_id = $_GET["urun_id"];

			if ($_FILES["urun_resim"]["size"]> 0) { 
			$kaynak= @$_FILES["urun_resim"]["tmp_name"];
			$isim= @$_FILES["urun_resim"]["name"];
			$boyut= @$_FILES["urun_resim"]["size"];
			$turu= @$_FILES["urun_resim"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/neyapiyoruz/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: bizneyapiyoruz.php?slide-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {	
						header("Location: bizneyapiyoruz.php?slide-ekle=boyutbuyuk");
					}else{

						// Önceki Resmi Silelim
						$sil =$db->prepare("SELECT *  FROM  urunler WHERE urun_id=?");
						$sil->execute (array($urun_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["urun_resim"];

						unlink("../assets/img/neyapiyoruz/".$eski_resim["urun_resim"]);





					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("UPDATE  urunler  SET urun_logo=?, urun_baslik=?,urun_kisayazi=?, urun_yazi=? , urun_resim=? WHERE urun_id=?");
						$update = $query->execute (array($urun_logo,$urun_baslik,$urun_kisayazi,$urun_yazi,$resimAd,$urun_id));
						if ($update) {
						header("Location:bizneyapiyoruz.php?durum=yes");
						}else{
					header("Location:  bizneyapiyoruz.php?durum=no");

				}
					}
					
				}
			}
	}else{
		$query = $db->prepare("UPDATE  urunler  SET urun_logo=?,urun_baslik=?, urun_kisayazi=?, urun_yazi=?  WHERE urun_id=?");
						$update = $query->execute (array($urun_logo,$urun_baslik,$urun_kisayazi,$urun_yazi,$urun_id));
						if ($update) {	
						header("Location: bizneyapiyoruz.php?durum=yess");
						}else{
					header("Location:  bizneyapiyoruz.php?durum=no");

						}
					}
					
				}


				// Biz Ne Yapıyoruz Silme İşlemi
		extract($_GET);
		if(isset($urunsil_id)){

			$sil =$db->prepare("SELECT *  FROM urunler WHERE urun_id=?");
						$sil->execute (array($urunsil_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["urun_resim"];

						unlink("../assets/img/".$eski_resim["urun_resim"]);

						$query = $db->prepare("DELETE FROM urunler WHERE urun_id=?");
						$delete = $query->execute (array($urunsil_id));
						if ($delete) {
						header("Location:bizneyapiyoruz.php?durum=yess");
						}else{
					header("Location: bizneyapiyoruz.php?durum=no");

				}

		}


		// Blog Ekle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
		if (isset($blogekle)) {
			$kaynak= @$_FILES["yazi_foto"]["tmp_name"];
			$isim= @$_FILES["yazi_foto"]["name"];
			$boyut= @$_FILES["yazi_foto"]["size"];
			$turu= @$_FILES["yazi_foto"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/blog/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: bloglar.php?bloglar-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {
						header("Location: bloglar.php?bloglar-ekle=boyutbuyuk");
					}else{
					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("INSERT INTO yazilar SET yazi_title=?, yazi_icerik=?,yazi_kategori_id=?,yazi_foto=?");
						$insert = $query->execute (array($yazi_title,$yazi_icerik,$yazi_kategori_id,$resimAd));
						if ($insert) {
						header("Location: bloglar.php?durum-ekle=yes");
						}else{
					header("Location:  bloglar.php?durum-ekle=no");

					}
					
				}
			}

		}

		}	


		// Blog Güncelle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
				if (isset($blogduzenle)) {
					$yazi_id = $_GET["yazi_id"];

			if ($_FILES["yazi_foto"]["size"]> 0) { 
			$kaynak= @$_FILES["yazi_foto"]["tmp_name"];
			$isim= @$_FILES["yazi_foto"]["name"];
			$boyut= @$_FILES["yazi_foto"]["size"];
			$turu= @$_FILES["yazi_foto"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/blog/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: bloglar.php?blog=gecersizuzanti");
					}else if ($boyut > 1024 * 648 * 5) {	
						header("Location: bloglar.php?blog=boyutbuyuk");
					}else{

						// Önceki Resmi Silelim
						$sil =$db->prepare("SELECT *  FROM  yazilar WHERE yazi_id=?");
						$sil->execute (array($yazi_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["yazi_foto"];

						unlink("../assets/img/blog/".$eski_resim["yazi_foto"]);





					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("UPDATE  yazilar  SET yazi_title=?, yazi_icerik=?,yazi_kategori_id=?, yazi_foto=? WHERE yazi_id=?");
						$update = $query->execute (array($yazi_title,$yazi_icerik,$yazi_kategori_id,$resimAd,$yazi_id));
						if ($update) {
						header("Location:bloglar.php?durum=yes");
						}else{
					header("Location:  bloglar.php?durum=no");

				}
					}
					
				}
			}
	}else{
		$query = $db->prepare("UPDATE  yazilar  SET yazi_title=?,yazi_icerik=?, yazi_kategori_id=?  WHERE yazi_id=?");
						$update = $query->execute (array($yazi_title,$yazi_icerik,$yazi_kategori_id,$yazi_id));
						if ($update) {	
						header("Location: bloglar.php?durum=yess");
						}else{
					header("Location:  bloglar.php?durum=no");

						}
					}
					
				}

				// Blog Silme İşlemi
		extract($_GET);
		if(isset($blogsil_id)){

			$sil =$db->prepare("SELECT *  FROM yazilar WHERE yazi_id=?");
						$sil->execute (array($blogsil_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["yazi_foto"];

						unlink("../assets/img/blog/".$eski_resim["yazi_foto"]);

						$query = $db->prepare("DELETE FROM yazilar WHERE yazi_id=?");
						$delete = $query->execute (array($blogsil_id));
						if ($delete) {
						header("Location:bloglar.php?durum=yess");
						}else{
					header("Location: bloglar.php?durum=no");

				}

		}


//Mesaj // İletişim
if(isset($_POST['mesajgonder'])){
    $iletisim=$db->prepare("INSERT INTO iletisim SET iletisim_isim=:iletisim_isim,iletisim_mail=:iletisim_mail,iletisim_tel=:iletisim_tel,iletisim_konu=:iletisim_konu,iletisim_mesaj=:iletisim_mesaj");
    $insert=$iletisim->execute(array('iletisim_isim'=> $_POST['iletisim_isim'],
        'iletisim_isim'=> $_POST['iletisim_isim'],
        'iletisim_mail'=> $_POST['iletisim_mail'],
        'iletisim_tel'=> $_POST['iletisim_tel'],
        'iletisim_konu'=> $_POST['iletisim_konu'],
        'iletisim_mesaj'=> $_POST['iletisim_mesaj']
 
));
    if ($insert) {
        header("Location: ../mesaj.php?=ok");
    }

}

// Mesaj Silme İşlemi
		extract($_GET);
		if(isset($iletisimsil_id)){

			$query = $db->prepare("DELETE FROM iletisim WHERE iletisim_id=?");
		$delete = $query->execute (array($iletisimsil_id));

		if ($delete) {
			header("Location: mesajlar.php?durum=yes");
			}else{
			header("Location:  mesajlar.php?durum=no");
					}
		
		}

		// Giriş İşlemi
if (isset($_POST["giris"])) {

  $admin_kadi = htmlspecialchars(trim($_POST["admin_kadi"]));
  $admin_sifre = htmlspecialchars(trim(md5($_POST["admin_sifre"])));

  if (!$admin_kadi || !$admin_sifre) {
    header("Location: login.php?giris=bos");
  

}else{
  $query = $db->prepare("SELECT * FROM admin WHERE admin_kadi=? AND admin_sifre=?");
  $query->execute(array($admin_kadi,$admin_sifre));
  $admin_giris = $query->fetch(PDO::FETCH_ASSOC);


  if ($admin_giris) {

    $_SESSION["login"] = true;
    $_SESSION["admin_kadi"] = $admin_giris["admin_kadi"];
    $_SESSION["admin_id"] = $admin_giris["admin_id"];

    header("Location: index.php?durum=giris-ok");
  }else{
    header("Location: login.php?durum=giris=no");
  }
}
}

// Admin Güncelle Düzenleme
	extract($_POST);
	if (isset($kadi_degistir)) {
		$admin_id = $_GET["admin_id"];
		if ($admin_kadi) {
			$adminguncelle = $db->prepare("UPDATE admin SET admin_kadi=? WHERE admin_id=?");
			$adminupdate = $adminguncelle->execute(array($admin_kadi,$admin_id));

			if ($adminupdate) {
				header("Location: adminayar.php?durum=yes");
			}else{
				header("Location: adminayar.php?durum=no");
			}
			}else{
				header("Location: adminayar.php?durum=bos");
			}
			}

 
// Admin Şifre Düzenleme
			if (isset($_POST["sifre_degistir"])) {


				$id = $_GET["admin_id"];


				$eski_sifre = md5($_POST["eski_sifre"]);
				$yeni_sifre = md5($_POST["yeni_sifre"]);


			$kullanicisor = $db->prepare("SELECT * FROM admin WHERE admin_sifre=:admin_sifre");
			$kullanicisor->execute(array('admin_sifre' => $eski_sifre));

			// dönen satır sayısını belirtir
			$say=$kullanicisor->rowcount();
			if ($say==0) {
				header("Location: adminayar.php?durum=eskisifrehata");
			}else{
				$adminguncelle = $db->prepare("UPDATE admin SET admin_sifre=? WHERE admin_id=?");
				$adminupdate = $adminguncelle->execute(array($yeni_sifre,$id));

				if ($adminupdate) {
				header("Location: adminayar.php?durum=yes");
			}else{
				header("Location: adminayar.php?durum=no");
	}
		}

	}

	// Kategori Ekle
if(isset($_POST['kategoriekle'])){
	$kategori_title 	= $_POST['kategori_title'];

	$kategoriler = $db->prepare('INSERT INTO kategoriler SET kategori_title=?');
	$insert = $kategoriler->execute(array($kategori_title));

	if($insert){
		header("Location: kategoriler.php?kategori-ekle=yes");
	}else{
		header("Location: kategoriler.php?kategori-ekle=no");
	}

}


// Kategori Güncelle Düzenleme
extract($_POST);
if(isset($kategoriguncelle)){

    $kategori_id = $_GET["kategori_id"];

    if (!$kategori_title){
        header("Location: kategoriler.php?kategori_guncelle=bos");
    }else{
        $query = $db->prepare("UPDATE kategoriler SET kategori_title=? WHERE kategori_id=?");
        $update = $query->execute(array($kategori_title,$kategori_id));
        if($update){
            header("Location: kategoriler.php?kategori_guncelle=yes");
        }else{
            header("Location: kategoriler.php?kategori_guncelle=no");
        }
    }
}


// Kategori SİLME
if(isset($_GET['kategorisil_id'])){
	$kategoriler = $db->prepare('DELETE FROM kategoriler WHERE kategori_id=?');
	$delete = $kategoriler->execute(array($_GET['kategorisil_id']));

	if($delete){
		header("Location: kategoriler.php?kategori-delete=yes");
	}else{
		header("Location: kategoriler.php?kategori-delete=no");
	}
}


// Hakkımda Güncelle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
				if (isset($hakkimizdaduzenle)) {
					$hakkimizda_id = $_GET["hakkimizda_id"];

			if ($_FILES["hakkimizda_resim"]["size"]> 0) { 
			$kaynak= @$_FILES["hakkimizda_resim"]["tmp_name"];
			$isim= @$_FILES["hakkimizda_resim"]["name"];
			$boyut= @$_FILES["hakkimizda_resim"]["size"];
			$turu= @$_FILES["hakkimizda_resim"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/hakkimizda/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: hakkimizda.php?slide-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 648 * 5) {	
						header("Location: hakkimizda.php?slide-ekle=boyutbuyuk");
					}else{

						// Önceki Resmi Silelim
						$sil =$db->prepare("SELECT *  FROM  hakkimizda WHERE hakkimizda_id=?");
						$sil->execute (array($hakkimizda_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["hakkimizda_resim"];

						unlink("../assets/img/hakkimizda/".$eski_resim["hakkimizda_resim"]);





					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("UPDATE  hakkimizda  SET hakkimizda_baslik=?, hakkimizda_yazi=?, hakkimizda_resim=? WHERE hakkimizda_id=?");
						$update = $query->execute (array($hakkimizda_baslik,$hakkimizda_yazi,$resimAd,$hakkimizda_id));
						if ($update) {
						header("Location:hakkimizda.php?durum=yes");
						}else{
					header("Location:  hakkimizda.php?durum=no");

				}
					}
					
				}
			}
	}else{
		$query = $db->prepare("UPDATE  hakkimizda  SET hakkimizda_baslik=?,hakkimizda_yazi=?WHERE hakkimizda_id=?");
						$update = $query->execute (array($hakkimizda_baslik,$hakkimizda_yazi,$hakkimizda_id));
						if ($update) {	
						header("Location: hakkimizda.php?durum=yess");
						}else{
					header("Location:  hakkimizda.php?durum=no");

						}
					}
					
				}

				// Sertifika Ekle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png","pdf/pdf");
		$DosyaUzanti = array("jpeg","jpg","png","x-png","pdf");
		if (isset($sertifikaekle)) {
			$kaynak= @$_FILES["sertifika_pdf"]["tmp_name"];
			$isim= @$_FILES["sertifika_pdf"]["name"];
			$boyut= @$_FILES["sertifika_pdf"]["size"];
			$turu= @$_FILES["sertifika_pdf"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/sertifikalar/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: sertifikalar.php?slide-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {
						header("Location: sertifikalar.php?slide-ekle=boyutbuyuk");
					}else{
					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("INSERT INTO sertifikalar SET sertifika_isim=?,sertifika_pdf=?");
						$insert = $query->execute (array($sertifika_isim,$resimAd));
						if ($insert) {
						header("Location: sertifikalar.php?durum=yes");
						}else{
					header("Location:  sertifikalar.php?durum=no");

					}
					
				}
			}

		}

		}	




				// Sertifika Güncelle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png","pdf/pdf");
		$DosyaUzanti = array("jpeg","jpg","png","x-png","pdf");
				if (isset($sertifikaduzenle)) {
					$sertifika_id = $_GET["sertifika_id"];

			if ($_FILES["sertifika_pdf"]["size"]> 0) { 
			$kaynak= @$_FILES["sertifika_pdf"]["tmp_name"];
			$isim= @$_FILES["sertifika_pdf"]["name"];
			$boyut= @$_FILES["sertifika_pdf"]["size"];
			$turu= @$_FILES["sertifika_pdf"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/sertifikalar/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: sertifikalar.php?slide-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {	
						header("Location: sertifikalar.php?slide-ekle=boyutbuyuk");
					}else{

						// Önceki Resmi Silelim
						$sil =$db->prepare("SELECT *  FROM  sertifikalar WHERE sertifika_id=?");
						$sil->execute (array($sertifika_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["sertifika_pdf"];

						unlink("../assets/img/sertifikalar/".$eski_resim["sertifika_pdf"]);





					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("UPDATE  sertifikalar  SET sertifika_isim=?, sertifika_pdf=? WHERE sertifika_id=?");
						$update = $query->execute (array($sertifika_isim,$resimAd,$sertifika_id));
						if ($update) {
						header("Location:sertifikalar.php?durum=yes");
						}else{
					header("Location:  sertifikalar.php?durum=no");

				}
					}
					
				}
			}
	}else{
		$query = $db->prepare("UPDATE  sertifikalar  SET sertifika_isim=? WHERE sertifika_id=?");
						$update = $query->execute (array($sertifika_isim,$sertifika_id));
						if ($update) {	
						header("Location: sertifikalar.php?durum=yess");
						}else{
					header("Location:  sertifikalar.php?durum=no");

						}
					}
					
				}



		// Sertifika Silme İşlemi
		extract($_GET);
		if(isset($sertifikasil_id)){

			$sil =$db->prepare("SELECT *  FROM sertifikalar WHERE sertifika_id=?");
						$sil->execute (array($sertifikasil_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["sertifika_pdf"];

						unlink("../assets/img/sertifikalar/".$eski_resim["sertifika_pdf"]);

						$query = $db->prepare("DELETE FROM sertifikalar WHERE sertifika_id=?");
						$delete = $query->execute (array($sertifikasil_id));
						if ($delete) {
						header("Location:sertifikalar.php?durum=yess");
						}else{
					header("Location: sertifikalar.php?durum=no");

				}

		}

		//Abone // İletişim
if(isset($_POST['abonegonder'])){
    $aboneler=$db->prepare("INSERT INTO aboneler SET abone_mail=:abone_mail");
    $insert=$aboneler->execute(array('abone_mail'=> $_POST['abone_mail']
        
 
));
    if ($insert) {
        header("Location: ../iletisim.php?mesaj=ok");
    }

}
// Abone Sil İşlem

extract($_GET);
if(isset($abonesil_id)){

    $query = $db->prepare("DELETE FROM aboneler WHERE abone_id=?");
    $delete = $query->execute(array($abonesil_id));
    if ($delete) {
        header("Location: abone.php?yorum_sil=yes");
    } else {
        header("Location: abone.php?yorum_sil=no");
    }
}

// Portfolyo Ekle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
		if (isset($portfolyoekle)) {
			$kaynak= @$_FILES["portfolyo_fotograf"]["tmp_name"];
			$isim= @$_FILES["portfolyo_fotograf"]["name"];
			$boyut= @$_FILES["portfolyo_fotograf"]["size"];
			$turu= @$_FILES["portfolyo_fotograf"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/portfolio/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: portfolyo.php?portfolyo-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {
						header("Location: portfolyo.php?portfolyo-ekle=boyutbuyuk");
					}else{
					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("INSERT INTO portfolyo SET portfolyo_baslik=?, portfolyo_kisametin=?,portfolyo_class=?,portfolyo_fotograf=?");
						$insert = $query->execute (array($portfolyo_baslik,$portfolyo_kisametin,$portfolyo_class,$resimAd));
						if ($insert) {
						header("Location: portfolyo.php?durum-ekle=yes");
						}else{
					header("Location:  portfolyo.php?durum-ekle=no");

					}
					
				}
			}

		}

		}	


		// Portfolyo Güncelle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
				if (isset($portfolyoduzenle)) {
					$portfolyo_id = $_GET["portfolyo_id"];

			if ($_FILES["portfolyo_fotograf"]["size"]> 0) { 
			$kaynak= @$_FILES["portfolyo_fotograf"]["tmp_name"];
			$isim= @$_FILES["portfolyo_fotograf"]["name"];
			$boyut= @$_FILES["portfolyo_fotograf"]["size"];
			$turu= @$_FILES["portfolyo_fotograf"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/portfolio/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: portfolyo.php?portfolyo=gecersizuzanti");
					}else if ($boyut > 1024 * 648 * 5) {	
						header("Location: portfolyo.php?portfolyo=boyutbuyuk");
					}else{

						// Önceki Resmi Silelim
						$sil =$db->prepare("SELECT *  FROM  portfolyo WHERE portfolyo_id=?");
						$sil->execute (array($portfolyo_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["portfolyo_fotograf"];

						unlink("../assets/img/projects/".$eski_resim["portfolyo_fotograf"]);





					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("UPDATE  portfolyo  SET portfolyo_baslik=?, portfolyo_kisametin=?,portfolyo_class=?, portfolyo_fotograf=? WHERE portfolyo_id=?");
						$update = $query->execute (array($portfolyo_baslik,$portfolyo_kisametin,$portfolyo_class,$resimAd,$portfolyo_id));
						if ($update) {
						header("Location:portfolyo.php?durum=yes");
						}else{
					header("Location:  portfolyo.php?durum=no");

				}
					}
					
				}
			}
	}else{
		$query = $db->prepare("UPDATE  portfolyo  SET portfolyo_baslik=?,portfolyo_kisametin=?, portfolyo_class=?  WHERE portfolyo_id=?");
						$update = $query->execute (array($portfolyo_baslik,$portfolyo_kisametin,$portfolyo_class,$portfolyo_id));
						if ($update) {	
						header("Location: portfolyo.php?durum=yess");
						}else{
					header("Location:  portfolyo.php?durum=no");

						}
					}
					
				}

				// Portfolyo Silme İşlemi
		extract($_GET);
		if(isset($portfolyosil_id)){

			$sil =$db->prepare("SELECT *  FROM portfolyo WHERE portfolyo_id=?");
						$sil->execute (array($portfolyosil_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["portfolyo_fotograf"];

						unlink("../assets/img/portfolio/".$eski_resim["portfolyo_fotograf"]);

						$query = $db->prepare("DELETE FROM portfolyo WHERE portfolyo_id=?");
						$delete = $query->execute (array($portfolyosil_id));
						if ($delete) {
						header("Location:portfolyo.php?durum=yess");
						}else{
					header("Location: portfolyo.php?durum=no");

				}

		}
// YORUM CEVAPLA  
extract($_POST);
if (isset($_POST["yorumcevapla"])){

    $yorum_id = $_GET["yorum_id"];

    $query = $db->query("UPDATE yorumlar SET yorum_cevap=1 WHERE yorum_id=".$yorum_id);

    if (!$yorum_ekleyen || !$yorum_eposta || !$yorum_icerik){
        header("Location: yorumlar.php?yorum_ekle=bos");
    }else{
        $query = $db->prepare("INSERT INTO yorumlar SET yorum_ekleyen=?, yorum_eposta=?,yorum_icerik=?, yorum_yazi_id=?, yorum_ust=?, yorum_durum=?");
        $insert = $query->execute(array($yorum_ekleyen,$yorum_eposta,$yorum_icerik,$yorum_yazi_id,$yorum_id,1));

        if ($insert){
            header("Location: yorumlar.php?yorum_cevapla=yes");
        }else{
            header("Location: yorumlar.php?yorum_cevapla=no");
        }
    }

}


// YORUM GÜNCELLE
extract($_POST);
if(isset($yorumguncelle)){

    $yorum_id = $_GET["yorum_id"];

    if (!$yorum_icerik){
        header("Location: yorumlar.php?yorum_guncelle=bos");
    }else{
        $query = $db->prepare("UPDATE yorumlar SET yorum_icerik=?, yorum_durum=? WHERE yorum_id=?");
        $update = $query->execute(array($yorum_icerik,$yorum_durum,$yorum_id));
        if($update){
            header("Location: yorumlar.php?yorum_guncelle=yes");
        }else{
            header("Location: yorumlar.php?yorum_guncelle=no");
        }
    }
}
// Yorum Sil İşlem

extract($_GET);
if(isset($yorumlarsil_id)){

    $query = $db->prepare("DELETE FROM yorumlar WHERE yorum_id=?");
    $delete = $query->execute(array($yorumlarsil_id));
    if ($delete) {
        header("Location: yorumlar.php?yorum_sil=yes");
    } else {
        header("Location: yorumlar.php?yorum_sil=no");
    }
}

// Ekip Ekle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
		if (isset($ekipekle)) {
			$kaynak= @$_FILES["ekip_resim"]["tmp_name"];
			$isim= @$_FILES["ekip_resim"]["name"];
			$boyut= @$_FILES["ekip_resim"]["size"];
			$turu= @$_FILES["ekip_resim"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/ekipler/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: takim.php?ekip-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {
						header("Location: takim.php?ekip-ekle=boyutbuyuk");
					}else{
					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("INSERT INTO ekip SET ekip_resim=?,ekip_isim=?, ekip_mevki=?,ekip_fb=?,ekip_linkledin=?,ekip_instagram=?");
						$insert = $query->execute (array($resimAd,$ekip_isim,$ekip_mevki,$ekip_fb,$ekip_linkledin,$ekip_instagram));
						if ($insert) {
						header("Location: takim.php?ekip-ekle=yes");
						}else{
					header("Location:  takim.php?ekip-ekle=no");

					}
					
				}
			}

		}

		}	



		// Ekip Güncelle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
				if (isset($ekipduzenle)) {
					$ekip_id = $_GET["ekip_id"];

			if ($_FILES["ekip_resim"]["size"]> 0) { 
			$kaynak= @$_FILES["ekip_resim"]["tmp_name"];
			$isim= @$_FILES["ekip_resim"]["name"];
			$boyut= @$_FILES["ekip_resim"]["size"];
			$turu= @$_FILES["ekip_resim"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/ekipler/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: takim.php?ekip-guncelle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {	
						header("Location: takim.php?ekip-guncelle=boyutbuyuk");
					}else{

						// Önceki Resmi Silelim
						$sil =$db->prepare("SELECT *  FROM  ekip WHERE ekip_id=?");
						$sil->execute (array($ekip_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["ekip_resim"];

						unlink("../assets/img/ekipler/".$eski_resim["ekip_resim"]);





					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("UPDATE  ekip  SET ekip_resim=?,ekip_isim=?, ekip_mevki=?,ekip_fb=?,ekip_linkledin=?,ekip_instagram=? WHERE ekip_id=?");
						$update = $query->execute (array($resimAd,$ekip_isim,$ekip_mevki,$ekip_fb,$ekip_linkledin,$ekip_instagram ,$ekip_id));
						if ($update) {
						header("Location: takim.php?ekip-guncelle=yes");
						}else{
					header("Location:  takim.php?ekip-guncelle=no");

				}
					}
					
				}
			}
	}else{
		$query = $db->prepare("UPDATE  ekip  SET ekip_isim=?, ekip_mevki=?,ekip_fb=?,ekip_linkledin=?,ekip_instagram=?  WHERE ekip_id=?");
						$update = $query->execute (array($ekip_isim,$ekip_mevki,$ekip_fb,$ekip_linkledin,$ekip_instagram,$ekip_id));
						if ($update) {	
						header("Location: takim.php?ekip-guncelle=yess");
						}else{
					header("Location:  takim.php?ekip-guncelle=no");

						}
					}
					
				}


	// Ekip Silme İşlemi
		extract($_GET);
		if(isset($ekipsil_id)){

			$sil =$db->prepare("SELECT *  FROM ekip WHERE ekip_id=?");
						$sil->execute (array($ekipsil_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["ekip_resim"];

						unlink("../assets/img/ekipler/".$eski_resim["yorum_resim"]);

						$query = $db->prepare("DELETE FROM ekip WHERE ekip_id=?");
						$delete = $query->execute (array($ekipsil_id));
						if ($delete) {
						header("Location:ekip.php?ekip-sil=yess");
						}else{
					header("Location: ekip.php?ekip-sil=no");

				}

		}


		// Yorum Ekle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
		if (isset($referansekle)) {
			$kaynak= @$_FILES["yorum_resim"]["tmp_name"];
			$isim= @$_FILES["yorum_resim"]["name"];
			$boyut= @$_FILES["yorum_resim"]["size"];
			$turu= @$_FILES["yorum_resim"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/yorumlar/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: referans-ekle.php?yorum-ekle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {
						header("Location: referans-ekle.php?yorum-ekle=boyutbuyuk");
					}else{
					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("INSERT INTO yorum SET yorum_resim=?,yorum_isim=?, yorum_meslek=?,yorum_aciklama=?");
						$insert = $query->execute (array($resimAd,$yorum_isim,$yorum_meslek,$yorum_aciklama));
						if ($insert) {
						header("Location: referans-ekle.php?yorum-ekle=yes");
						}else{
					header("Location:  referans-ekle.php?yorum-ekle=no");

					}
					
				}
			}

		}
		}

		// Yorum Güncelle İşlem
		extract($_POST);
		$DosyaTuru = array("images/jpeg","images/jpg","images/png","images/x-png");
		$DosyaUzanti = array("jpeg","jpg","png","x-png");
				if (isset($referansduzenle)) {
					$yorum_id = $_GET["yorum_id"];

			if ($_FILES["yorum_resim"]["size"]> 0) { 
			$kaynak= @$_FILES["yorum_resim"]["tmp_name"];
			$isim= @$_FILES["yorum_resim"]["name"];
			$boyut= @$_FILES["yorum_resim"]["size"];
			$turu= @$_FILES["yorum_resim"]["type"];


			$uzanti =substr($isim,strpos($isim, ".") +1);
			$resimAd = substr(uniqid(rand()),  0,    11)."_" .$isim;
			$hedef = "../assets/img/yorumlar/".$resimAd;
			if ($kaynak) {
				if (!in_array($turu, $DosyaTuru) && !in_array($uzanti,$DosyaUzanti)) {
					header("Location: referans.php?referans-guncelle=gecersizuzanti");
					}else if ($boyut > 1024 * 1024 * 5) {	
						header("Location: referans.php?referans-guncelle=boyutbuyuk");
					}else{

						// Önceki Resmi Silelim
						$sil =$db->prepare("SELECT *  FROM  yorum WHERE yorum_id=?");
						$sil->execute (array($yorum_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["yorum_resim"];

						unlink("../assets/img/yorumlar/".$eski_resim["yorum_resim"]);





					if (move_uploaded_file($kaynak, $hedef)) {
						$query = $db->prepare("UPDATE  yorum SET yorum_resim=?,yorum_isim=?, yorum_meslek=?,yorum_aciklama=?  WHERE yorum_id=?");
						$update = $query->execute (array($resimAd,$yorum_isim,
							$yorum_meslek,$yorum_aciklama, $yorum_id));
						if ($update) {
						header("Location: referans.php?referans-guncelle=yes");
						}else{
					header("Location:  referans.php?referans-guncelle=no");

						}
					}
					
				}
			}
	}else{
		$query = $db->prepare("UPDATE yorum SET yorum_isim=?, yorum_meslek=? ,yorum_aciklama=? WHERE yorum_id=?");
						$update = $query->execute (array($yorum_isim,
							$yorum_meslek, $yorum_aciklama, $yorum_id));
						if ($update) {	
						header("Location: referans.php?referans-guncelle=yess");
						}else{
					header("Location:  referans.php?referans-guncelle=no");

						}
					}
					
				}

						// Yorum Silme İşlemi
		extract($_GET);
		if(isset($yorumsil_id)){

			$sil =$db->prepare("SELECT *  FROM yorum WHERE yorum_id=?");
						$sil->execute (array($yorumsil_id));
						$eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
						$eski_resim["yorum_resim"];

						unlink("../assets/img/yorumlar/".$eski_resim["yorum_resim"]);

						$query = $db->prepare("DELETE FROM yorum WHERE yorum_id=?");
						$delete = $query->execute (array($yorumsil_id));
						if ($delete) {
						header("Location: referans.php?referans-sil=yess");
						}else{
					header("Location: referans.php?referans-sil=no");

				}

		}