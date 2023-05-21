<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Blog</li>
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
                <h3 class="card-title">Blog Ekle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Portfolyo Başlık</label>
                    <input type="text" name="yazi_title" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label >Blog Yazı</label>
                    <input type="text" name="yazi_icerik" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label >Blog kategori</label>
                    <select name="yazi_kategori_id">
                        <?php
                        $urunler =$db->prepare("SELECT * FROM urunler");
$urunler->execute();
$urunler_cek =$urunler->fetchAll(PDO::FETCH_ASSOC);

                     $kategoriler=$db->prepare("SELECT * FROM kategoriler");
                     $kategoriler->execute();
                     $kategori_cek = $kategoriler->fetchAll(PDO::FETCH_ASSOC);
                     foreach ($kategori_cek as $row){ ?>
                      <option value="<?php echo $row["kategori_id"]; ?>"  <?php echo $yazi_cek["yazi_kategori_id"]=$row["kategori_id"] ? "selected" : null;?>> 
                       <?php echo $row["kategori_title"];?>
              </option>


                  <?php } ?>
                </select>
              </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Blog Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input required type="file"  name="yazi_foto" class="custom-file-input" id="exampleInputFile">
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
                  <button type="submit" name="blogekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>