<?php include 'header.php';?>
<?php include 'navbar.php';?>
	
	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg2">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Blog</h2>
						<ul>
							<li><a href="index.php">Anasayfa</a>
							</li>
							<li>Blog</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start Blog Section -->
	<section class="blog-section pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="row">
										 <?php

            $yazilar =$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id ORDER BY yazi_id DESC");
            $yazilar->execute();
            $yazilar_cek =$yazilar->fetchAll(PDO::FETCH_ASSOC);

foreach ($yazilar_cek as $row) {
 ?> 
						<div class="col-lg-6 col-md-6">
							<div class="blog-item">
								<div class="blog-image">
									<a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>">
										<img src="assets/img/blog/<?php echo $row ["yazi_foto"]; ?>" alt="image">
									</a>
								</div>
								<div class="single-blog-item">
									<ul class="blog-list">
										<li>
											<a href="#"> <i class="fa fa-user-alt"></i> Admin </a>
										</li>
										<li>
											<a href="#"> <i class="fa fa-user-alt"></i> <?php echo $row ["kategori_title"]; ?> </a>
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
										<div class="blog-btn"> <a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>" class="blog-btn-one">Devamını Oku</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						               <?php

}
?>
						<div class="col-lg-12 col-md-12">
							<div class="pagination-area"> <a href="#" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
								<a href="#" class="page-numbers">1</a>
								<span class="page-numbers current" aria-current="page">2</span>
								<a href="#" class="page-numbers">3</a>
								<a href="#" class="page-numbers">4</a>
								<a href="#" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12">
					<aside class="widget-area" id="secondary">
						<section class="widget widget_search">
							<form class="search-form search-top">
								<label> <span class="screen-reader-text">Search for:</span>
									<input type="search" class="search-field" placeholder="Search...">
								</label>
								<button type="submit"> <i class="fas fa-search"></i>
								</button>
							</form>
						</section>
						<section class="widget widget_techvio_posts_thumb">
							<h3 class="widget-title">En Son Yazdıklarımız</h3>
															 <?php

            $yazilar =$db->prepare("SELECT * FROM yazilar ORDER BY yazi_id DESC");
            $yazilar->execute();
            $yazilar_cek =$yazilar->fetchAll(PDO::FETCH_ASSOC);

foreach ($yazilar_cek as $row) {
 ?> 
							<article class="item">
								<a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>" class="thumb"> <img src="assets/img/blog/<?php echo $row["yazi_foto"]; ?>"></span>
								</a>
								<div class="info">
									<span><?php echo $row["yazi_tarih"]; ?></span>
									<h4 class="title usmall">
                                            <a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><?php echo $row["yazi_title"]; ?></a>
                                        </h4>
								</div>
							</article>
							
										               <?php

}
?>
</section>
						<section class="widget widget_categories">
							<h3 class="widget-title">Kategoriler</h3>
<?php
$kategoriler =$db->prepare("SELECT * FROM kategoriler");
$kategoriler->execute();
$kategori_cek =$kategoriler->fetchALL(PDO::FETCH_ASSOC);
foreach ($kategori_cek as $row) { ?>
<ul>
								<li> <a href="#"><?php echo $row ["kategori_title"]; ?></a>
								</li>
							</ul>
<?php } ?>
							
						</section>
						<section class="widget widget_tag_cloud">
							<h3 class="widget-title">Tags</h3>
							<div class="tagcloud section-bottom"> <a href="#">
                                        IT 
                                        <span class="tag-link-count"> (7)</span>
                                    </a>
								<a href="#"> Technology
                                        <span class="tag-link-count"> (10)</span>
                                    </a>
								<a href="#">
                                        Applications 
                                        <span class="tag-link-count"> (15)</span>
                                    </a>
								<a href="#">
                                        Solutions 
                                        <span class="tag-link-count"> (30)</span>
                                    </a>
								<a href="#">
                                        Overview
                                        <span class="tag-link-count"> (10)</span>
                                    </a>
								<a href="#">
                                        Industry 
                                        <span class="tag-link-count"> (12)</span>
                                    </a>
								<a href="#">
                                        Marketing 
                                        <span class="tag-link-count"> (7)</span>
                                    </a>
								<a href="#">
                                        Guide 
                                        <span class="tag-link-count"> (3)</span>
                                    </a>
							</div>
						</section>
					</aside>
				</div>
			</div>
		</div>
	</section>
	<!-- End Blog Section -->
	
	<?php include 'footer.php'?>