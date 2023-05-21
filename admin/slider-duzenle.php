<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php
$slider_id =$_GET["slider_id"] ;
$slider =$db->prepare("SELECT * FROM slider WHERE  slider_id=?");
$slider->execute(array($slider_id));
$slider_cek =$slider->fetch(PDO::FETCH_ASSOC);

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Anasayfa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
                <h3 class="card-title">Slider Güncelle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?slider_id=<?php echo $slider_cek ["slider_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Slider Başlık</label>
                    <input type="text" name="slider_baslik" class="form-control" value="<?php echo $slider_cek ["slider_baslik"]; ?>">
                  </div>
                  <div class="form-group">
                    <label >Slider Yazı</label>
                    <input type="text" name="slider_yazi" class="form-control" value="<?php echo $slider_cek ["slider_yazi"]; ?>">
                  </div>
                  <div class="form-group">
                    <label >Slider Buton</label>
                    <input type="text" name="slider_buton" class="form-control" value="<?php echo $slider_cek ["slider_buton"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Slider Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="slider_resim" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Resim Seç</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="sliderduzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>