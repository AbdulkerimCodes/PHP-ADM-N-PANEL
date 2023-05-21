<?php include "admin/baglan.php";?>
<?php 


$ayarlar =$db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayar_cek =$ayarlar->fetch(PDO::FETCH_ASSOC);
   

?>
<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title -->
	<title><?php echo $ayar_cek ["ayarlar_title"]; ?></title>
	<meta name="description" content="<?php echo $ayar_cek ["ayarlar_desc"]; ?>">
  <meta name="keywords" content="<?php echo $ayar_cek ["ayarlar_keyw"]; ?>">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<!-- Favicon -->
<link rel=icon href='assets/img/favicon.png'>
	  <link rel=stylesheet href='assets/css/bootstrap.min.css'>
	  <link rel=stylesheet href='assets/css/animate.min.css'>
	  <link rel=stylesheet href='assets/css/flaticon.css'>
	  <link rel=stylesheet href='assets/css/fontawesome.min.css'>
	  <link rel=stylesheet href='assets/css/meanmenu.css'>
	  <link rel=stylesheet href='assets/css/magnific-popup.min.css'>
	  <link rel=stylesheet href='assets/css/nice-select.min.css'>
	  <link rel=stylesheet href='assets/css/swiper.min.css'>
	  <link rel=stylesheet href='assets/css/owl.carousel.min.css'>
	  <link rel=stylesheet href='assets/css/style.css'>
	  <link rel=stylesheet href='assets/css/responsive.css'>
  <link rel=stylesheet href='assets/css/swal.css'>
  <script type="text/javascript" src='assets/js/swal.min.js'></script>
</head>

<body>

	<div class="preloader">
		<div class="loader">
			<div class="shadow"></div>
			<div class="box"></div>
		</div>
	</div>
	