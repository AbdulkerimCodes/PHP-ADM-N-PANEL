<?php include 'header.php'?> 
<?php include 'navbar.php'?> 
	
	<!-- Start Page Title Area -->
	<div class="page-title-area">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>İletişim</h2>
						<ul>
							<li><a href="index.php">Anasayfa</a>
							</li>
							<li>İletişim</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start Contact Box Area -->
	<section class="contact-info-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h6>İLETİŞİM BİLGİLERİMİZ</h6>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div >
					
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="contact-info-content">
						<h5>Konya Ofisimiz</h5>
						<p><?php echo $ayar_cek ["ayarlar_adres"] ?></p>
						<a href="https://wa.me/05551785835">05551785835</a>
						<a href="mailto:<?php echo $ayar_cek ["ayarlar_mail"] ?>"><?php echo $ayar_cek ["ayarlar_mail"] ?></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div >
					
					</div>
				</div>
			</div>
		</div>
    </section>
	<!-- End Contact Box Area -->
	
	<!-- Start Contact Section -->
	<div class="contact-section bg-grey section-padding">
		<div class="container">
			<div class="section-title">
				<h6>İletişime Geç</h6>
				<h2>İletişimde Kalalım ;)</h2>
			</div>
			<div class="row align-items-center">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact-form">
						<p class="form-message"></p><br />
						<form id="contact-form" class="contact-form form" action="admin/islem.php" method="POST">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="iletisim_isim" id="name" class="form-control" required placeholder="Ad - Soyad">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="email" name="iletisim_mail" id="email" class="form-control" required placeholder="Email Adresiniz">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="iletisim_tel" id="phone" required class="form-control" placeholder="Telefon Numaranız">
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="iletisim_konu" id="subject" class="form-control" required placeholder="Konu">
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="form-group">
										<textarea name="iletisim_mesaj" class="form-control" id="message" cols="30" rows="6" required placeholder="Mesaj"></textarea>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<button type="submit" name="mesajgonder" class="default-btn submit-btn">Mesaj Gönder <span></span></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact Section -->
	
    <!-- Map Section Start -->
    <div class="map-area">
        
       <div class="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12542.994707693513!2d32.3650532!3d38.1925116!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe5139f0a850810ff!2s%C4%B0stiklal%20Soft!5e0!3m2!1str!2str!4v1667602865357!5m2!1str!2str" width="1480" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
    </div>
    <!-- Map Section End -->
	
	<?php include 'footer.php'?>