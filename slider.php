<!-- Start Slider Are -->
    <header class="slider slider-prlx">
        <div class="swiper-container parallax-slider">
            <div class="swiper-wrapper">
                 <?php

            $slider =$db->prepare("SELECT * FROM slider ORDER BY slider_id ");
            $slider->execute();
            $slider_cek =$slider->fetchAll(PDO::FETCH_ASSOC);

foreach ($slider_cek as $row) {
 ?>  
                <div class="swiper-slide">
                    <div class="bg-img valign" data-background="assets/img/<?php echo $row ["slider_resim"]; ?>" data-overlay-dark="5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="caption">
                                        <h1><?php echo $row ["slider_baslik"]; ?></h1>
                                        <p><?php echo $row ["slider_yazi"]; ?></p>
										<div class="banner-btn home-slider-btn">
											<a href="<?php echo $row ["slider_buton"]; ?>" class="default-btn-one">
												Hakkımızda
												<span></span>
											</a>
											<a class="default-btn" href="https://istiklalsoft.com/contact.php" class="default-btn">
												İletişim
												<span></span>
											</a>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                   <?php

}
?>
            <!-- slider setting -->
            <div class="control-text">
                <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer">
                    <span class="arrow prv"></span>
                </div>
                <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer">
                    <span class="arrow nxt"></span>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </header>
     <!-- End Slider Area -->