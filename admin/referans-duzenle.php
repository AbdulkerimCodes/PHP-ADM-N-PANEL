<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php
$yorum_id =$_GET["yorum_id"] ;
$yorum =$db->prepare("SELECT * FROM yorum WHERE  yorum_id=?");
$yorum->execute(array($yorum_id));
$yorum_cek =$yorum->fetch(PDO::FETCH_ASSOC);

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
              <li class="breadcrumb-item active">Referans Düzenle</li>
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
                <h3 class="card-title">Referans Güncelle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?yorum_id=<?php echo $yorum_cek ["yorum_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">Yorum Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="yorum_resim" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Resim Seç</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  <div class="form-group">
                    <label>Yorum İsim</label>
                    <input type="text" name="yorum_isim" class="form-control" value="<?php echo $yorum_cek ["yorum_isim"]; ?>">
                  </div>
                  <div class="form-group">
                    <label >Yorum Meslek</label>
                    <input type="text" name="yorum_meslek" class="form-control" value="<?php echo $yorum_cek ["yorum_meslek"]; ?>">
                  </div>
                  <div class="form-group">
                    <label >Yorum Yazı</label>
                    <input type="text" name="yorum_aciklama" class="form-control" value="<?php echo $yorum_cek ["yorum_aciklama"]; ?>">
                  </div>
                  
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="referansduzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>