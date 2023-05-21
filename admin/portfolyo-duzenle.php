<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php
$portfolyo_id =$_GET["portfolyo_id"] ;
$portfolyo =$db->prepare("SELECT * FROM portfolyo WHERE  portfolyo_id=?");
$portfolyo->execute(array($portfolyo_id));
$portfolyo_cek =$portfolyo->fetch(PDO::FETCH_ASSOC);

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Portfolyo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Portfolyo Güncelle</li>
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
                <h3 class="card-title">Portfolyo Güncelle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?portfolyo_id=<?php echo $portfolyo_cek ["portfolyo_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Portfolyo Başlık</label>
                    <input type="text" name="portfolyo_baslik" class="form-control" value="<?php echo $portfolyo_cek ["portfolyo_baslik"]; ?>">
                  </div>
                  <div class="form-group">
                    <label >Portfolyo kısa Metin</label>
                    <input type="text" name="portfolyo_kisametin" class="form-control" value="<?php echo $portfolyo_cek ["portfolyo_kisametin"]; ?>">
                  </div>
                    <div class="form-group">
                    <label >Portfolyo Class (Tümü vb)</label>
                    <input type="text" name="portfolyo_class" class="form-control" value="<?php echo $portfolyo_cek ["portfolyo_class"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Portfolyo Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="portfolyo_fotograf" class="custom-file-input" id="exampleInputFile">
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
                  <button type="submit" name="portfolyoduzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>