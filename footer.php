<?php
$ayarlar =$db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayar_cek =$ayarlar->fetch(PDO::FETCH_ASSOC);
   

?>
<!-- Start Footer & Subscribe Section -->
	<section class="footer-subscribe-wrapper">
		<!-- Start Subscribe Area -->
		<div class="subscribe-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-6">
						<div class="subscribe-content">
							<h2>İletişime Geç -></h2>
							<span class="sub-title">Bizimle İletişime Geçmek İçin Mail Adresinizi Yazınız.</span>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<form class="newsletter-form" action="admin/islem.php" method="POST">
							<input type="email" name="abone_mail" class="input-newsletter" placeholder="Lütfen Mail Adresinizi  Yazınız" name="EMAIL" required autocomplete="off">
							<button name="abonegonder" type="submit">Gönder</button>
							<div id="validator-newsletter" class="form-result"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Subscribe Area -->
		
		<!-- Start Footer Area -->
		<div class="footer-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>Hakkımızda</h3>
							</div>
							<p><p><?php
 $yazilar =$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id ORDER BY yazi_id DESC");
            $yazilar->execute();
            $yazilar_cek =$yazilar->fetchAll(PDO::FETCH_ASSOC);

foreach ($yazilar_cek as $row) {?>
			 <a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><?php echo $row["kategori_title"]; ?>
			<?php } ?>
		</p>
							<ul class="footer-social">
								<li>
									<a href="<?php echo $ayar_cek ["ayarlar_facebook"] ?>"> <i class="fab fa-facebook-f"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo $ayar_cek ["ayarlar_instagram"] ?>"> <i class="fab fa-instagram"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>Servisler</h3>
							</div>
							<ul class="footer-quick-links">
								<li> <a href="#">Web Tasarım</a></li>
								<li> <a href="#">Seo Optimizasyonu</a></li>
								<li> <a href="#">Mobil Uygulama</a></li>
								<li> <a href="#">Veri Tabanı Yönetimi</a></li>
								<li> <a href="#">Kişisel Kurumsal Yazılım (Otomasyon)</a></li>
								<li> <a href="#">İşletme Kaydı Google Ads Reklam</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>Hızlı Linkler</h3>
							</div>
							<ul class="footer-quick-links">
								<li><a href="hakkimizda.php">Hakkımızda</a></li>
								<li><a href="bloglar.php">Bloglar</a></li>
								<li><a href="contact.php">İletişim</a></li>
								<li><a href="servisler.php">Servisler</a></li>
								<li><a href="projeler.php">Projeler</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>İletişim</h3>
							</div>
							<div class="footer-info-contact"> <i class="flaticon-phone-call"></i>
								<h3>Telefon</h3>
								<span><a href="tel:<?php echo $ayar_cek ["ayarlar_telefon"] ?>"><?php echo $ayar_cek ["ayarlar_telefon"] ?></a></span>
							</div>
							<div class="footer-info-contact"> <i class="flaticon-envelope"></i>
								<h3>Email</h3>
								<span><a href="<?php echo $ayar_cek ["ayarlar_mail"] ?>"><?php echo $ayar_cek ["ayarlar_mail"] ?></a></span>
							</div>
							<div class="footer-info-contact"> <i class="flaticon-placeholder"></i>
								<h3>Adres</h3>
								<span><?php echo $ayar_cek ["ayarlar_adres"] ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Section -->
	</section>
	<!-- End Footer & Subscribe Section -->
	
	<!-- Start Copy Right Section -->
	<div class="copyright-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">
					<p> <i class="far fa-copyright"></i> 2022 İstiklal Soft - All Rights Reserved.</p>
				</div>
				<!--  
				<div class="col-lg-6 col-md-6">
					<ul>
						<li> <a href="terms-condition.html">Terms & Conditions</a>
						</li>
						<li> <a href="privacy-policy.html">Privacy Policy</a>
						</li>
					</ul>
				</div>
				-->
			</div>
		</div>
	</div>
	<!-- End Copy Right Section -->
	
	<!-- Start Go Top Section -->
	<div class="go-top">
		<i class="fas fa-chevron-up"></i>
		<i class="fas fa-chevron-up"></i>
	</div>
	<!-- End Go Top Section -->
<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/popper.min.js'></script>
<script src='assets/js/bootstrap.min.js'></script>
<script src='assets/js/jquery.meanmenu.js'></script>
<script src='assets/js/jquery.appear.min.js'></script>
<script src='assets/js/jquery.waypoints.min.js'></script>
<script src='assets/js/jquery.counterup.min.js'></script>
<script src='assets/js/owl.carousel.min.js'></script>
<script src='assets/js/jquery.magnific-popup.min.js'></script>
<script src='assets/js/jquery.nice-select.min.js'></script>
<script src='assets/js/isotope.pkgd.min.js'></script>
<script src='assets/js/swiper.min.js'></script>
<script src='assets/js/wow.min.js'></script>
<script src='assets/js/main.js'></script>





	
</body>

</html>