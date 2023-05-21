<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php
$urun_id =$_GET["urun_id"] ;
$urunler =$db->prepare("SELECT * FROM urunler WHERE  urun_id=?");
$urunler->execute(array($urun_id));
$urunler_cek =$urunler->fetch(PDO::FETCH_ASSOC);

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ürünler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Biz Ne Yapıyoruz Güncelle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Biz Ne Yapıyoruz Güncelle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?urun_id=<?php echo $urunler_cek ["urun_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Hizmet Logo</label>
                    <input type="text" name="urun_logo" class="form-control" value="<?php echo $urunler_cek ["urun_logo"]; ?>">
                  </div>
                  <div class="form-group">

                    <div class="form-group">
                    <label >Hizmet Başlık </label>
                    <input type="text" name="urun_baslik" class="form-control" value="<?php echo $urunler_cek ["urun_baslik"]; ?>">

                  </div>
                  <div class="form-group">
                    <label >Hizmet Kısa Yazı</label>
                    <input type="text" name="urun_kisayazi" class="form-control" value="<?php echo $urunler_cek ["urun_kisayazi"]; ?>">
                  </div>
                   <div class="form-group">
                    <label >Hizmet Detay Yazı</label>
                    <textarea name="urun_yazi" class="ckeditor" ><?php echo $urunler_cek ["urun_yazi"]; ?></textarea>
                  </div>
                  </div>
                 <div class="form-group">
                    <label for="exampleInputFile">Hizmet Detay Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="urun_resim" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Resim Seç</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  </div>
            
                <!-- /.card-body -->
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="bizneyapiyoruzduzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>