<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php

$ekip_id =$_GET["ekip_id"] ;
$ekip =$db->prepare("SELECT * FROM ekip WHERE  ekip_id=?");
$ekip->execute(array($ekip_id));
$ekip_cek =$ekip->fetch(PDO::FETCH_ASSOC);

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
              <li class="breadcrumb-item active">Ekip</li>
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
                <h3 class="card-title">Ekip Güncelle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?ekip_id=<?php echo $ekip_cek ["ekip_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">Ekip Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="ekip_resim" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Resim Seç</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  <div class="form-group">
                    <label>Ekip İsim</label>
                    <input type="text" name="ekip_isim" class="form-control" value="<?php echo $ekip_cek ["ekip_isim"]; ?>">
                  </div>
                  <div class="form-group">
                    <label >Ekip Mevki</label>
                    <input type="text" name="ekip_mevki" class="form-control" value="<?php echo $ekip_cek ["ekip_mevki"]; ?>">
                  </div>
                  <div class="form-group">
                    <label >Ekip Facebook</label>
                    <input type="text" name="ekip_fb" class="form-control" value="<?php echo $ekip_cek ["ekip_fb"]; ?>">
                  </div>
                  <div class="form-group">
                    <label >Ekip İnstagram</label>
                    <input type="text" name="ekip_instagram" class="form-control" value="<?php echo $ekip_cek ["ekip_instagram"]; ?>">
                  </div>
                  <div class="form-group">
                    <label >Ekip Linkledin</label>
                    <input type="text" name="ekip_linkledin" class="form-control" value="<?php echo $ekip_cek ["ekip_linkledin"]; ?>">
                  </div>
                  
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="ekipduzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>