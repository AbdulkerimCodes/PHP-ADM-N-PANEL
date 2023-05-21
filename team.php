<!-- Start Team Section -->
	<section class="team-area pb-100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h6>Team Member</h6>
						<h2>Expert Team</h2>
					</div>
				</div>
							 <?php

            $ekip =$db->prepare("SELECT * FROM ekip ORDER BY ekip_id ");
            $ekip->execute();
            $ekip_cek =$ekip->fetchAll(PDO::FETCH_ASSOC);

foreach ($ekip_cek as $row) {
 ?> 
				<div class="col-lg-3 col-md-6">
					<div class="single-team-box">
						<div class="team-image">
							<img src="assets/img/ekipler/<?php echo $row ["ekip_resim"]; ?>" alt="team" />
							<div class="team-social-icon">
								<a href="<?php echo $row ["ekip_fb"]; ?>" class="social-color-1"><i class="fab fa-facebook-f"></i></a>
								<a href="<?php echo $row ["ekip_instagram"]; ?>" class="social-color-2"><i class="fab fa-twitter"></i></a>
								<a href="<?php echo $row ["ekip_linkledin"]; ?>" class="social-color-3"><i class="fab fa-linkedin"></i></a>
							</div>
						</div>
						<div class="team-info">
							<h3><?php echo $row ["ekip_isim"]; ?></h3>
							<span><?php echo $row ["ekip_mevki"]; ?></span>
						</div>
					</div>
				</div>
				            <?php

}
?>
			</div>
		</div>
	</section>
	<!-- End Team Section -->