<!-- Start Services Section -->
	<section class="services-section bg-grey section-padding">
		<div class="container">
            <div class="row">
                <div class="col-sm-12">
					<div class="section-title">
						<h6>NELER YAPABİLİRİZ</h6>
						<h2>Hizmet Verdiğimiz Alanlar</h2>
					</div>
                </div>
            </div>
			<div class="row">
				 <?php

            $urunler =$db->prepare("SELECT * FROM urunler ORDER BY urun_id ");
            $urunler->execute();
            $urunler_cek =$urunler->fetchAll(PDO::FETCH_ASSOC);

foreach ($urunler_cek as $row) {
 ?> 
				<div class="col-lg-4 col-md-6">
					<div class="single-services-item">
						<div class="services-icon">
							<i class="<?php echo $row ["urun_logo"]; ?>"></i>
						</div>
						<h3><?php echo $row ["urun_baslik"]; ?></h3>
						<p><?php echo $row ["urun_kisayazi"]; ?></p>
						<div class="services-btn-link">
						<a href="yaptikdetay.php?urun_id=<?php echo $row["urun_id"]; ?>" class="services-link">Devamını Oku</a>
						</div>
					</div>
				</div>
                  <?php

}
?>
			</div>
		</div>
	</section>
	<!-- End Services Section -->