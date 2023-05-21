<!-- Start Testimonial Section -->
	<section class="testimonial-section section-padding">
		<div class="container">
			<div class="section-title">
				<h6>Referanslarımız</h6>
				<h2>Bizim Hakkımızda Ne Diyorlar</h2>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="testimonial-slider owl-carousel owl-theme">
						<!-- testimonials item -->
		
						<div class="single-testimonial">
							                            <?php 
$yorum =$db->prepare("SELECT * FROM yorum ORDER BY  yorum_id  DESC");
$yorum->execute();
$yorum_cek =$yorum->fetchAll(PDO::FETCH_ASSOC);
foreach ($yorum_cek as $row) {
    ?>
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
								<p><?php echo $row ["yorum_aciklama"]; ?></p>
							</div>
							<div class="avatar">
								<img src="assets/img/yorumlar/<?php echo $row ["yorum_resim"]; ?>" alt="testimonial images">
							</div>
							<div class="testimonial-bio">
								<div class="bio-info">
									<h3><?php echo $row ["yorum_isim"]; ?></h3>
									<span><?php echo $row ["yorum_meslek"]; ?></span>
								</div>
							</div>
						</div>
						<!-- testimonials item -->
									            <?php

}
?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->