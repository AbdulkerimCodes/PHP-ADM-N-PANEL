<?php include 'header.php';?>
<?php include 'sidebar.php';?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anasayfa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Admin v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php 
                   $iletisim =$db->prepare("SELECT * FROM iletisim ORDER BY  iletisim_id  DESC");
                    $iletisim->execute();
                    $iletisim_cek =$iletisim->fetchAll(PDO::FETCH_ASSOC);
                    $toplam = $iletisim->rowcount();
                    ?>
            <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-lime">
              <div class="inner">
                <h3><?php echo $toplam; ?></h3>

                <p>Mesaj</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope-open-text"></i>
              </div>
              <a href="mesajlar.php" class="small-box-footer">
                Mesajlar <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>

          </div>
           
           <?php 
                   $yazilar =$db->prepare("SELECT * FROM yazilar ORDER BY  yazi_id  DESC");
                    $yazilar->execute();
                    $yazilar_cek =$yazilar->fetchAll(PDO::FETCH_ASSOC);
                    $toplam = $yazilar->rowcount();
                    ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $toplam; ?></h3>

                <p>Yazılar</p>
              </div>
              <div class="icon">
               <i class="fas fa-book"></i>
              </div>
              <a href="bloglar.php" class="small-box-footer">
                Yazılar <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
            <?php 
                   $slider =$db->prepare("SELECT * FROM slider ORDER BY  slider_id  DESC");
                    $slider->execute();
                    $slider_cek =$slider->fetchAll(PDO::FETCH_ASSOC);
                    $toplam = $slider->rowcount();
                    ?>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo $toplam; ?></h3>

                <p>Slider</p>
              </div>
              <div class="icon">
               <i class="fa fa-window-restore"></i>
              </div>
              <a href="Slider.php" class="small-box-footer">
                Slider <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         

          <?php 
                    $aboneler =$db->prepare("SELECT * FROM aboneler ORDER BY  abone_id  DESC");
                    $abone_cek->execute();
                    $aboneler =$aboneler->fetchAll(PDO::FETCH_ASSOC);
                    $toplam = $aboneler->rowcount();
                    ?>

                    
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $toplam; ?></h3>

                <p>Aboneler</p>
              </div>
              <div class="icon">
               <i class="fas fa-check-circle"></i>
              </div>
              <a href="urunler.php" class="small-box-footer">
                Aboneler <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
            
          
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    </div>
    <!-- /.content-header -->
  </div></div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
  </div>
  <?php include 'footer.php' ?>