<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php ;
$yorum_id =$_GET["yorum_id"] ;
$yorumlar =$db->prepare("SELECT * FROM yorumlar WHERE  yorum_id=?");
$yorumlar->execute(array($yorum_id));
$yorum_cek =$yorumlar->fetch(PDO::FETCH_ASSOC);

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Yorum</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Yorum Düzenle</li>
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
                <h3 class="card-title">Yorum Düzenle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?yorum_id=<?php echo $yorum_cek ["yorum_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Ekleyen Adı</label>
                    <input type="text" name="yorum_ekleyen" class="form-control" value="<?php echo $yorum_cek ["yorum_ekleyen"]; ?>">
                  </div>
                    <div class="form-group">
                    <label >Tarih</label>
                    <input type="text" class="form-control" value="<?php echo $yorum_cek ["yorum_tarih"]; ?>"disabled>
                  </div>
                   <div class="form-group">
                    <label >Durum</label>
                  <select name="yorum_durum" class="form-control">
                    <option value="1" <?php echo $yorum_cek["yorum_durum"]==1 ? "selected" : null;  ?>>Onaylı</option>
                    <option value="0"  <?php echo $yorum_cek["yorum_durum"]==0 ? "selected" : null;  ?>>Onaylı Değil</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label >İçerik</label>
                 <textarea name="yorum_icerik" id="" cols="5" rows="10" class="form-control"><?php echo $yorum_cek["yorum_icerik"] ?></textarea>
                  </div>


                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="yorumguncelle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>