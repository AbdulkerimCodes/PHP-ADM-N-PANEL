<?php include 'header.php'?>
<?php include 'sidebar.php'?>


<!--- Content -->
<?php
$iletisim_id = $_GET["iletisim_id"];
$iletisim =$db->prepare("SELECT * FROM iletisim  WHERE  iletisim_id=?");
$iletisim->execute(array($iletisim_id));
$iletisim_cek =$iletisim->fetch(PDO::FETCH_ASSOC);

$okunma = $db->prepare("UPDATE iletisim SET mesaj_okunma=? WHERE iletisim_id=?");
$okunma->execute(array(1,$iletisim_id));
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gelen Kutusu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Mail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Gelen Mailler</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Konu: <?php echo $iletisim_cek ["iletisim_konu"]; ?></h5>
                <h6>Mail Adresi: <?php echo $iletisim_cek ["iletisim_mail"]; ?>
                <h6>Telefon Numarası: <?php echo $iletisim_cek ["iletisim_tel"]; ?>
                  <span class="mailbox-read-time float-right"><?php echo $iletisim_cek ["iletisim_tarih"]; ?></span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p><?php echo $iletisim_cek ["iletisim_mesaj"]; ?></p>

              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
           
            <!-- /.card-footer -->
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php include "footer.php" ?>