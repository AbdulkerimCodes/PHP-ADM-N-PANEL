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
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kategori </li>
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
                <h3 class="card-title">Kategori Ekle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Kategori İsim</label>
                    <input type="text" name="kategori_title" class="form-control" >
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="kategoriekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>
            </div></div>
        </div>
        </div></div>
        
            <!-- /.card -->
                <?php  include 'footer.php';?>