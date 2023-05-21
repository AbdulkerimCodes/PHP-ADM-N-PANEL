<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php
$yazi_id =$_GET["yazi_id"] ;
$yazilar =$db->prepare("SELECT * FROM yazilar WHERE  yazi_id=?");
$yazilar->execute(array($yazi_id));
$yazi_cek =$yazilar->fetch(PDO::FETCH_ASSOC);

?>
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
              <li class="breadcrumb-item active">Blog Güncelle</li>
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
                <h3 class="card-title">Blog Güncelle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?yazi_id=<?php echo $yazi_cek ["yazi_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Blog Başlık</label>
                    <input type="text" name="yazi_title" class="form-control" value="<?php echo $yazi_cek ["yazi_title"]; ?>">
                  </div>
                       <div class="form-group">
                    <label >Blog Yazı </label>
                     <textarea name="yazi_icerik" class="ckeditor" ><?php echo $yazi_cek ["yazi_icerik"]; ?></textarea>
                  </div>
                   <div class="form-group">
                    <label >kategori</label>
                    <select name="yazi_kategori_id">
                        <?php
                     $kategoriler=$db->prepare("SELECT * FROM kategoriler");
                     $kategoriler->execute();
                     $kategori_cek = $kategoriler->fetchAll(PDO::FETCH_ASSOC);
                     foreach ($kategori_cek as $row){ ?>
                      <option value="<?php echo $row["kategori_id"]; ?>"  <?php echo $yazi_cek["yazi_kategori_id"]==$row["kategori_id"] ? "selected" : null;?>> 
                       <?php echo $row["kategori_title"];?>
              </option>


                  <?php } ?>
             </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Portfolyo Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="yazi_foto" class="custom-file-input" id="exampleInputFile">
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
                  <button type="submit" name="blogduzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>