<?php include  'navbar.php';?>
<?php include  'header.php';?>

 <?php



$hakkimizda =$db->prepare("SELECT * FROM hakkimizda");
$hakkimizda->execute();
$hakkimizda_cek =$hakkimizda->fetch(PDO::FETCH_ASSOC);

?>
	
	<!-- Start Page Title Area -->
	<div class="page-title-area">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Hakkımızda</h2>
						<ul>
							<li><a href="index.php">Anasayfa</a></li>
							<li>Hakkımızda</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start About Section -->
	<section class="about-area section-padding">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="about-content">
						<div class="about-content-text">
							<h6><?php echo $hakkimizda_cek ["hakkimizda_baslik"]; ?></h6> 
							<p><?php echo $hakkimizda_cek ["hakkimizda_yazi"]; ?></p>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1 col-md-12 col-sm-12">
					<div class="about-image">
						<img src="assets/img/hakkimizda/<?php echo $hakkimizda_cek ["hakkimizda_resim"]; ?>" alt="About image">
					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Section -->
	
	<!-- Start Counter Section -->
	<section class="counter-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">
							<h2>
								<span class="counter-number">2</span>
								<span>+</span>
							</h2>
							<h3 class="counter-heading">Yıl</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">
							<h2>
								<span class="counter-number">6</span>
								<span>+</span>
							</h2>
							<h3 class="counter-heading">Çalışan</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">
							<h2>
								<span class="counter-number">350</span>
								<span>+</span>
							</h2>
							<h3 class="counter-heading">Proje Tamamlama</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">
							<h2>
								<span class="counter-number">333</span>
								<span>+</span>
							</h2>
							<h3 class="counter-heading">Müşteri Memnuniyeti</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Counter Section -->
	
	<!-- Start Team Section -->
	<section class="team-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h6>Team Member</h6>
						<h2>Expert Team</h2>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-team-box">
						<div class="team-image">
							<img src="assets/img/team/team-1.jpg" alt="team" />
							<div class="team-social-icon">
								<a href="#" class="social-color-1"><i class="fab fa-facebook-f"></i></a>
								<a href="#" class="social-color-2"><i class="fab fa-twitter"></i></a>
								<a href="#" class="social-color-3"><i class="fab fa-linkedin"></i></a>
							</div>
						</div>
						<div class="team-info">
							<h3>Ava Farrington</h3>
							<span>Founder, ceo</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-team-box">
						<div class="team-image">
							<img src="assets/img/team/team-2.jpg" alt="team" />
							<div class="team-social-icon">
								<a href="#" class="social-color-1"><i class="fab fa-facebook-f"></i></a>
								<a href="#" class="social-color-2"><i class="fab fa-twitter"></i></a>
								<a href="#" class="social-color-3"><i class="fab fa-linkedin"></i></a>
							</div>
						</div>
						<div class="team-info">
							<h3>Kevin Haley</h3>
							<span>Co-founder, cto</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-team-box">
						<div class="team-image">
							<img src="assets/img/team/team-3.jpg" alt="team" />
							<div class="team-social-icon">
								<a href="#" class="social-color-1"><i class="fab fa-facebook-f"></i></a>
								<a href="#" class="social-color-2"><i class="fab fa-twitter"></i></a>
								<a href="#" class="social-color-3"><i class="fab fa-linkedin"></i></a>
							</div>
						</div>
						<div class="team-info">
							<h3>Alishia Fulton</h3>
							<span>Chief creative officer</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-team-box">
						<div class="team-image">
							<img src="assets/img/team/team-4.jpg" alt="team" />
							<div class="team-social-icon">
								<a href="#" class="social-color-1"><i class="fab fa-facebook-f"></i></a>
								<a href="#" class="social-color-2"><i class="fab fa-twitter"></i></a>
								<a href="#" class="social-color-3"><i class="fab fa-linkedin"></i></a>
							</div>
						</div>
						<div class="team-info">
							<h3>Lucas Martinez</h3>
							<span>Project Manager</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Team Section -->
	
	<!-- Start Testimonial Section -->
	<section class="testimonial-section pb-100">
		<div class="container">
			<div class="section-title">
				<h6>Testimonial</h6>
				<h2>What Our Client Say</h2>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="testimonial-slider owl-carousel owl-theme">
						<!-- testimonials item -->
						<div class="single-testimonial">
							<div class="rating-box">
								<ul>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
							</div>
							<div class="testimonial-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation.</p>
							</div>
							<div class="avatar">
								<img src="assets/img/client/testimonial-1.jpg" alt="testimonial images">
							</div>
							<div class="testimonial-bio">
								<div class="bio-info">
									<h3>Saabir al-Obeid</h3>
									<span>Business Man</span>
								</div>
							</div>
						</div>
						<!-- testimonials item -->
						<div class="single-testimonial">
							<div class="rating-box">
								<ul>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
							</div>
							<div class="testimonial-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation.</p>
							</div>
							<div class="avatar">
								<img src="assets/img/client/testimonial-2.jpg" alt="testimonial images">
							</div>
							<div class="testimonial-bio">
								<div class="bio-info">
									<h3>Zahra Burnett</h3>
									<span>Business Man</span>
								</div>
							</div>
						</div>
						<!-- testimonials item -->
						<div class="single-testimonial">
							<div class="rating-box">
								<ul>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
							</div>
							<div class="testimonial-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. enim ad minim veniam, quis nostrud exercitation.</p>
							</div>
							<div class="avatar">
								<img src="assets/img/client/testimonial-3.jpg" alt="testimonial images">
							</div>
							<div class="testimonial-bio">
								<div class="bio-info">
									<h3>Stevie Wills</h3>
									<span>Business Man</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->
	
	<!-- Start Hire Section -->
	<section class="hire-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-md-12">
					<div class="hire-content">
						<h6>BİZİMLE ÇALIŞMAK İSTER MİSİNİZ?</h6>
						<h2>İşinizi dijital olarak dönüştürün ve büyütün!</h2>
						<p>Size özel web geliştirme hizmeti ile işinizi büyütün
Ürününüzü başarıya ulaştırmak için en iyi çözümleri uygulayan ve kullanıcı deneyimini en üst seviyeye çıkaran bir web geliştirme ortağı seçmek önemlidir.</p>
						<div class="hire-btn">
							<a class="default-btn" href="https://wa.me/05551785835">Whatsapp<span></span></a>
							<a class="default-btn-one" href="contact.php">İletişim<span></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Hire Section -->
	
	<!-- Start Partner section -->
	<section class="partner-section pt-100 pb-70">
		<div class="container">
			<div class="partner-title">
				<h6>Trusted By Over 40,000</h6>
				<h2>Our Customers</h2>
			</div>
			<div class="partner-list">
				<div class="partner-item">
					<a href="#0">
						<img src="assets/img/partner/client-1.png" alt="image">
					</a>
				</div>
				<div class="partner-item">
					<a href="#0">
						<img src="assets/img/partner/client-2.png" alt="image">
					</a>
				</div>
				<div class="partner-item">
					<a href="#0">
						<img src="assets/img/partner/client-3.png" alt="image">
					</a>
				</div>
				<div class="partner-item">
					<a href="#0">
						<img src="assets/img/partner/client-4.png" alt="image">
					</a>
				</div>
				<div class="partner-item">
					<a href="#0">
						<img src="assets/img/partner/client-5.png" alt="image">
					</a>
				</div>
				<div class="partner-item">
					<a href="#0">
						<img src="assets/img/partner/client-6.png" alt="image">
					</a>
				</div>
				<div class="partner-item">
					<a href="#0">
						<img src="assets/img/partner/client-7.png" alt="image">
					</a>
				</div>
				<div class="partner-item">
					<a href="#0">
						<img src="assets/img/partner/client-8.png" alt="image">
					</a>
				</div>
				<div class="partner-item">
					<a href="#0">
						<img src="assets/img/partner/client-1.png" alt="image">
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End Partner section -->
	
<?php include 'footer.php'?>
	