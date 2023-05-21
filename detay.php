<?php include 'header.php'?>
<?php include 'navbar.php'?>
<?php               
$yazi_id = $_GET['yazi_id'];
$yazilar =$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id WHERE yazi_id=?");
            $yazilar->execute(array($yazi_id));
            $yazi_cek =$yazilar->fetch(PDO::FETCH_ASSOC);


?>
	
	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg1">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>Blog Detay</h2>
						<ul>
							<li><a href="index-2.html">Anasayfa</a>
							</li>
							<li>Blog Detay</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->
	
	<!-- Start Blog Details Area -->
	<section class="blog-details-area ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="blog-details-desc">
						<div class="article-image">
							<img src="assets/img/blog/<?php echo $yazi_cek["yazi_foto"]; ?>" alt="image">
						</div>
						<div class="article-content">
							<div class="entry-meta">
								<ul>
									<li> <span>Tarih:</span>  <a href="#"><?php echo $yazi_cek["yazi_tarih"]; ?></a>
									</li>
									<li> <span>Yayınlayan:</span>  <a href="#">Admin</a>
									</li>
									<li> <span>Kategori:</span>  <a href="#"><?php echo $yazi_cek["kategori_title"]; ?></a>
									</li>
								</ul>
							</div>
							<h3><?php echo $yazi_cek["yazi_title"]; ?></h3>
							<p><?php echo $yazi_cek["yazi_icerik"]; ?></p>
							<ul class="wp-block-gallery columns-3">
								
							</ul>
						</div>
						<div class="article-footer">
							<div class="article-tags"> <span>Tag:</span>
								<a href="<?php echo $yazi_cek["kategori_title"]; ?>"><?php echo $yazi_cek["kategori_title"]; ?></a>
							</div>
							
						</div>
						<div class="post-navigation">
							<div class="navigation-links">
								
							</div>
						</div>
						<div class="comments-area">
							<h3 class="comments-title">3 Comments:</h3>
							<ol class="comment-list">
								<?php
					$yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_yazi_id=? AND yorum_durum=? AND yorum_ust=?");
					$yorumlar->execute(array($yazi_cek["yazi_id"],1,0));
					$yorumcek = $yorumlar->fetchAll(PDO::FETCH_ASSOC);
					$say = $yorumlar->rowCount();

					if ($say) {
						foreach ($yorumcek as $row) { ?>
								<li class="comment">
									<article class="comment-body">
										<footer class="comment-meta">
											<div class="comment-author vcard">
											 <b class="fn"><?php echo $row["yorum_ekleyen"]; ?></b>
												<span class="says">says:</span>
											</div>
											<div class="comment-metadata">
												<a href="#">
													<span><?php echo $row["yorum_tarih"]; ?></span>
												</a>
											</div>
										</footer>
										<div class="comment-content">
											<p><?php echo $row["yorum_icerik"]; ?></p>
										</div>
									</article>
<!-- cevap -->
							<?php
							$yanitlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_ust=?");
							$yanitlar->execute(array($row["yorum_id"]));
							$yanitcek = $yanitlar->fetchALL(PDO::FETCH_ASSOC);
							foreach ($yanitcek as $ycek) { ?>
										<li class="comment">
											<article class="comment-body">
												<footer class="comment-meta">
													<div class="comment-author vcard">
														<img src="assets/img/client/2.jpg" class="avatar" alt="image"> <b class="fn"><?php echo $ycek["yorum_ekleyen"]; ?></b>
														<span class="says">says:</span>
													</div>
													<div class="comment-metadata">
														<a href="#">
															<span><?php echo ($ycek["yorum_tarih"]); ?></span>
														</a>
													</div>
												</footer>
												<div class="comment-content">
													<p><?php echo $ycek["yorum_icerik"]; ?></p>
												</div>
											
											</article>
											<?php } ?>
							<!-- end cevap -->
							<?php } }else{ ?>
						<p style="margin-left: 15px;"><i>Bu konuya hiç yorum yapılmamış! Hayde İlk yorumu sen yap..</i></p>
						<?php } ?>
										</li>
									</ol>
								</li>











												<!--- AJAX İLE YORUM ---->

<script>
						function yorumGonder() {
							var degerler = $("#yorumForm").serialize();

							$.ajax({
								type : "POST",
								url  : "yorum-yap.php",
								data : degerler,
								success: function (sonuc) {
									if(sonuc == "bos"){
										swal("Dikkat!","Lütfen boş alan bırakmayınız!","warning");
									}else if(sonuc == "no"){
										swal("Hata!","Yorum gönderilirken bir hata oluştu!","error");
									}else if(sonuc == "yes"){
										swal({
											title : "Tebrikler!",
											text  : "Yorumunuz başarıyla gönderildi!",
											type  : "success",
											html  : true,
											timer : 2000},
											function () {
												location.reload();
											});
									}
								}
							});
						}
					</script>






				<!--- END YORUM YAPTIRMA ---->
							<div class="comment-respond">
								<h3 class="comment-reply-title">Yorum Bırak</h3>
								<form action="" method="POST" id="yorumForm" onsubmit="return false;" class="comment-form">
									<p class="comment-notes"> <span id="email-notes">yazi.</span>
										Required fields are marked <span class="required">*</span>
									</p>
									<input type="hidden" name="yorum_yazi_id" value="<?php echo $yazi_id; ?>">
									<p class="comment-form-comment">
										<label>Comment</label>
										<textarea name="yorum_icerik" id="comment" cols="45" rows="5" maxlength="65525"></textarea>
									</p>
									<p class="comment-form-author">
										<label>Name
										</label>
										<input type="text" id="author" name="yorum_ekleyen" >
									</p>
									<p class="comment-form-email">
										<label>Email 
										</label>
										<input type="email" id="email" name="yorum_eposta" >
									</p>
									<p class="form-submit">
										 <button  type="submit" onclick="yorumGonder();" >yolla</button>
									</p>
								</form>
							</div>
						</div>

					</div>
				</div>
			
				<div class="col-lg-4 col-md-12">
					<aside class="widget-area" id="secondary">
						<section >
							
						</section>
						<section class="widget widget_techvio_posts_thumb">
							<h3 class="widget-title">Popüler Yazılar</h3>
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

						
					<section class="widget widget_tag_cloud">
							<h3 class="widget-title">Kategoriler</h3>
							<div class="tagcloud section-bottom"> <?php
 $yazilar =$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id ORDER BY yazi_id DESC");
            $yazilar->execute();
            $yazilar_cek =$yazilar->fetchAll(PDO::FETCH_ASSOC);

foreach ($yazilar_cek as $row) {?>
			 <a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><?php echo $row["kategori_title"]; ?>
			 <?php
            $kategoriler = $db->prepare("SELECT * FROM yazilar WHERE yazi_kategori_id=?");
            $kategoriler->execute(array($row["kategori_id"]));
            $kategoriler->fetchALL(PDO::FETCH_ASSOC);
            $kategorisay = $kategoriler->rowCount();
            ?>
                                        <span class="tag-link-count"> (<?php echo $kategorisay; ?>)</span>
                                    </a>
								<?php } ?>

							</div>
						</section>
						
					</aside>
				</div>
			</div>
		</div>
	</section>
	<!-- End Blog Section -->
	
	<?php include 'footer.php'?>