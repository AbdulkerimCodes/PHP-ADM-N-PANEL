<!--- Header -->
<?php include "header.php" ?>

<!--- Sidebar -->
<?php include "sidebar.php" ?>


 <?php
$admin_id =1;
$admin =$db->prepare("SELECT * FROM admin WHERE  admin_id=?");
$admin->execute(array($admin_id));
$admin_cek =$admin->fetch(PDO::FETCH_ASSOC);

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Admin Güncelle</li>
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
                <h3 class="card-title">Kullanıcı Adı Değiştir</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?admin_id=<?php echo $admin_id; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Kullanıcı Adı </label>
                     <input type="text" name="admin_kadi" class="form-control" id="exampleInputPassword1" value="<?php echo $admin_cek ["admin_kadi"]; ?>">
                     </div>
                      <button type="submit" name="kadi_degistir" class="btn btn-primary">Güncelle</button>
                  </div>
                  </div>
                </form>

                 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Şifre Değiştir</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?admin_id=<?php echo $admin_id; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Eski Şifre</label>
                     <input type="text" name="eski_sifre" class="form-control" id="exampleInputPassword1">
                     </div>
                     </div>

                    <div class="card-body">
                    <div class="form-group">
                    <label>Yeni Şifre</label>
                     <input type="text" name="yeni_sifre" class="form-control" id="exampleInputPassword1" >
                     </div>
                   </div>
                     <div class="card-footer">
                     <button type="submit" name="sifre_degistir" class="btn btn-primary">Güncelle</button>
                  </div>
                  </div>
                  </div>
                  </div>
                </form>

</div>

</div>
               </div>
         
      
        
            <!-- /.card -->
                <?php  include 'footer.php';?>