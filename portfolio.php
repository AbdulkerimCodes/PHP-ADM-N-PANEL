<!-- Start Project Section -->
    <section class="project-area section-padding">
        <div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="section-title">
						<h6>SON ÇALIŞMALAR</h6>
						<h2>Portfolyo</h2>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="project-list">
                        <ul class="nav" id="project-flters">
                            <li class="filter filter-active" data-filter=".tümü">Tümü</li>
                            <li class="filter" data-filter=".web">Web Site</li>
                            <li class="filter" data-filter=".yazılım">Yazılım</li>
                            <li class="filter" data-filter=".logo">Logo </li>
                            <li class="filter" data-filter=".reklam">Reklam</li>
                        </ul>
                    </div>
                </div>
                <div class="project-container">
                    <!-- project-item -->
                    <?php

            $portfolyo =$db->prepare("SELECT * FROM portfolyo ORDER BY portfolyo_id ");
            $portfolyo->execute();
            $portfolyo_cek =$portfolyo->fetchAll(PDO::FETCH_ASSOC);

foreach ($portfolyo_cek as $row) {
 ?> 
                    <div class="col-lg-3 col-md-6 project-grid-item <?php echo $row ["portfolyo_class"] ?>">
                        <div class="project-item">
							<img src="assets/img/portfolio/<?php echo $row ["portfolyo_fotograf"] ?>" alt="image">
                            <div class="project-content-overlay">
								<p><?php echo $row ["portfolyo_baslik"] ?></p>
								<h3><a><?php echo $row ["portfolyo_kisametin"] ?></a></h3>
                            </div>
                        </div>
                    </div>
                                        <?php

}
?>
                    <!-- project-item -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Project Section -->