<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php ;
$hakkimizda =$db->prepare("SELECT * FROM hakkimizda");
$hakkimizda->execute(array());
$hakkimizda_cek =$hakkimizda->fetch(PDO::FETCH_ASSOC);

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hakkımızda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Hakkımızda</li>
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
                <h3 class="card-title">Hakkımızda Güncelle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?hakkimizda_id=<?php echo $hakkimizda_cek ["hakkimizda_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Hakkımızda Başlık</label>
                    <input type="text" name="hakkimizda_baslik" class="form-control" value="<?php echo $hakkimizda_cek ["hakkimizda_baslik"]; ?>">
                  </div>
                    <div class="form-group">
                    <label >Hakkımızda Yazı</label>
                    <textarea name="hakkimizda_yazi" class="ckeditor" ><?php echo $hakkimizda_cek ["hakkimizda_yazi"]; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Hakkımızda Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="hakkimizda_resim" class="custom-file-input" id="exampleInputFile">
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
                  <button type="submit" name="hakkimizdaduzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>