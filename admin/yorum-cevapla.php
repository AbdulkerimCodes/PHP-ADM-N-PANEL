<!-- header -->
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<!-- end: header -->


<?php
$yorum_id = $_GET["yorum_id"];
$yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_id=?");
$yorumlar->execute(array($yorum_id));
$yorum_cek = $yorumlar->fetch(PDO::FETCH_ASSOC);

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Yorum Cevapla</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Yorum Cevapla</li>
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
                <h3 class="card-title">Yorum Cevapla</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
				<form class="form-horizontal form-bordered" action="islem.php?yorum_id=<?php echo $yorum_id; ?>" method="POST" enctype="multipart/form-data">
					
					<input type="hidden" name="yorum_yazi_id" value="<?php echo $yorum_cek["yorum_yazi_id"]; ?>">
					<input type="hidden" name="yorum_ekleyen" class="form-control" value="admin" readonly>

					<input type="hidden" name="yorum_eposta" class="form-control" value="admin@gmail.com" readonly>

					 <div class="card-body">
                  <div class="form-group">
						<label class="col-md-2 control-label" for="inputDefault">Ekleyen Adı</label>
						<div class="input-group-prepend">
							<input type="text" class="form-control" value="<?php echo $yorum_cek["yorum_ekleyen"]; ?>" readonly>
						</div>
					</div>
					
						<div class="form-group">
						<label class="col-sm-2 control-label">Yapılan Yorum</label>
						<div class="input-group-prepend">
							<textarea class="form-control" disabled><?php echo $yorum_cek["yorum_icerik"]; ?></textarea>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Tarih</label>
						<input class="form-control" value="<?php echo $yorum_cek["yorum_tarih"];?>" disabled>
						</div>
						
						<div class="form-group">
						<label class="col-sm-2 control-label">Yapılan Yorum</label>
						<div class="col-sm-9">
							<textarea name="yorum_icerik" class="form-control" required><?php echo $yorum_cek["yorum_icerik"]; ?></textarea>
						</div>
					</div>

						<div class="form-group">
						<label class="col-sm-2 control-label">Cevapla</label>
						<div class="input-group-prepend">
							<textarea name="yorum_icerik" class="form-control" ></textarea>
						</div>
					</div>


					<div class="card-footer">
						<div class="col-md-12">
							<button name="yorumcevapla" class="btn btn-primary btn-sm btn-block" >Cevapla</button>
			 </div>
              </form>
            </div></div>
        </div>
        </div></div>

<!-- <footer>-->
	<?php include 'footer.php'; ?>
<!--</footer>  -->