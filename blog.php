<!-- Start Blog Section -->
	<section class="blog-section bg-grey pt-100 pb-70">
		<div class="container">
			<div class="section-title">
				<h6>Blog </h6>
				<h2>Blog Yazılarımız</h2>
			</div>
			<div class="row">
					<?php

            $yazilar =$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id ORDER BY yazi_id DESC");
            $yazilar->execute();
            $yazilar_cek =$yazilar->fetchAll(PDO::FETCH_ASSOC);

foreach ($yazilar_cek as $row) {
 ?>      

				<div class="col-lg-4 col-md-6">
					<div class="blog-item">
						<div class="blog-image">
							<a href="single-blog.html">
								<img src="assets/img/blog/<?php echo $row ["yazi_foto"]; ?>" alt="image">
							</a>
						</div>
						<div class="single-blog-item">
							<ul class="blog-list">
								<li>
									<a href="#"> <i class="fa fa-user-alt"></i> <?php echo $row ["kategori_title"]; ?></a>
								</li>
								<li>
									<a href="#"> <i class="fa fa-user-alt"></i> Admin</a>
								</li>
								<li>
									<a href="#"> <i class="fas fa-calendar-week"></i><?php echo $row ["yazi_tarih"]; ?></a>
								</li>
							</ul>
							<div class="blog-content">
								<h3>
                                    <a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>">
										<?php echo $row ["yazi_title"]; ?>
                                    </a>
                                </h3>
								<p><?php echo $row ["yazi_icerik"]; ?></p>
								<div class="blog-btn"> <a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>" class="blog-btn-one">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
						                 <?php


}


?>
			</div>
		</div>
	</section>
	<!-- End Blog Section -->