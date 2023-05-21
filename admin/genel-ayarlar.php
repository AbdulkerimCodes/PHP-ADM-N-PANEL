<?php include 'header.php'?>
<?php include 'sidebar.php'?>

<?php
$ayarlar_id =1;
$ayarlar =$db->prepare("SELECT * FROM ayarlar WHERE  ayarlar_id=?");
$ayarlar->execute(array($ayarlar_id));
$ayar_cek =$ayarlar->fetch(PDO::FETCH_ASSOC);
   

?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Genel Ayarlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Genel Ayarlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <form role="form" action="islem.php?ayarlar_id=<?php echo $ayar_cek ["ayarlar_id"]; ?>" method="POST">
 <div class="row">
          <div class="col-md-12">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Genel Ayarlar</h3>
              </div>
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Site Başlığı</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="ayarlar_title" value="<?php echo $ayar_cek ["ayarlar_title"]; ?>" class="form-control" >
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                
					<div class="form-group">
                  <label>Site Anahtar Kelimeleri</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-send-back"></i></span>
                    </div>
                    <input type="text" name="ayarlar_keyw" value="<?php echo $ayar_cek ["ayarlar_keyw"]; ?>" class="form-control" >
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                	<div class="form-group">
                  <label>Site Açıklama</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-send-back"></i></span>
                    </div>
                    <input type="text" name="ayarlar_desc" value="<?php echo $ayar_cek ["ayarlar_desc"]; ?>" class="form-control" >
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                	<div class="form-group">
                  <label>Site Url</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-send-back"></i></span>
                    </div>
                    <input type="text" name="ayarlar_siteurl" value="<?php echo $ayar_cek ["ayarlar_siteurl"]; ?>" class="form-control" >
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                  <div class="form-group">
                  <label>İş Yeri Adresi</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" name="ayarlar_adres" value="<?php echo $ayar_cek ["ayarlar_adres"]; ?>" class="form-control" >
                  </div>
                  <!-- /.input group -->
                </div>

                  <div class="form-group">
                  <label>İş Yeri Telefon</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <input type="text" name="ayarlar_telefon" value="<?php echo $ayar_cek ["ayarlar_telefon"]; ?>" class="form-control" >
                  </div>
                  <!-- /.input group -->
                </div>

                  <div class="form-group">
                  <label>İşyeri Mail</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" name="ayarlar_mail" value="<?php echo $ayar_cek ["ayarlar_mail"]; ?>" class="form-control" >
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>İnstagram Adresi</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                    </div>
                    <input type="text" name="ayarlar_instagram" value="<?php echo $ayar_cek ["ayarlar_instagram"]; ?>" class="form-control" >
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Facebook Adresi</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                    </div>
                    <input type="text" name="ayarlar_facebook" value="<?php echo $ayar_cek ["ayarlar_facebook"]; ?>" class="form-control" >
                  </div>
                  <!-- /.input group -->
                </div>
                <button class="btn btn-primary" name="genelguncelle" type="submit">Güncelle</button>
               

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </form>
</div>
</div>
</div>

<?php include 'footer.php'?>