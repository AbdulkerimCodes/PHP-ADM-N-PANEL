<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php
$sertifika_id =$_GET["sertifika_id"] ;
$sertifikalar =$db->prepare("SELECT * FROM sertifikalar WHERE  sertifika_id=?");
$sertifikalar->execute(array($sertifika_id));
$sertifika_cek =$sertifikalar->fetch(PDO::FETCH_ASSOC);

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sertifika</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Sertifika</li>
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
                <h3 class="card-title">Sertifika Güncelle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?sertifika_id=<?php echo $sertifika_cek ["sertifika_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                      <div class="form-group">
                    <label for="exampleInputFile">Sertifika İçin Pdf Seç</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="sertifika_pdf" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pdf Seç</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                    <label>Sertifika Adı</label>
                    <input type="text" name="sertifika_isim" class="form-control" value="<?php echo $sertifika_cek ["sertifika_isim"]; ?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="sertifikaduzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>