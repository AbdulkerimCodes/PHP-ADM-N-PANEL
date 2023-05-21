<?php include 'header.php';?>
<?php include 'navbar.php';?>
	
	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg1">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Services Details</h2>
						<ul>
							<li><a href="index-2.html">Home</a></li>
							<li>Services Details</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start Services Details Area -->

	<section class="services-details-area ptb-100">
		<div class="container">
			<div class="services-details-overview">
				<div class="row align-items-center">
					<div class="col-lg-12 col-md-12">
								 <?php
$urun_id = $_GET['urun_id'];
            $urunler =$db->prepare("SELECT * FROM urunler WHERE urun_id=? ");
            $urunler->execute(array($urun_id));
            $urunler_cek =$urunler->fetch(PDO::FETCH_ASSOC);
 ?> 
						<div class="image-sliders owl-carousel owl-theme">
							<div class="services-details-image">
								<img src="assets/img/neyapiyoruz/<?php echo $urunler_cek ["urun_resim"]; ?>" alt="image">
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="services-step-wrapper">
							<div class="services-step-title">
								<h2><?php echo $urunler_cek ["urun_baslik"]; ?></h2>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-12">
										<div class="features-text">
									<div class="services-step-content">
										<p><?php echo $urunler_cek ["urun_yazi"]; ?>.</p>	
									</div>

								</div>

							</div>
	
						</div>
					</div>

				</div>
																             <?php


?>
			</div>
		</div>
	</section>
	<!-- End Services Details Area -->
	

		<!-- End Subscribe Area -->
		<?php include 'footer.php'?>