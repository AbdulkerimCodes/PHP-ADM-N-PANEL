<?php include 'header.php'?>
<?php include 'sidebar.php'?>




 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider Ayarlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Slider Ayarlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Slider</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Slider</th>
                    <th>Slider Yazı</th>
                    <th>Sil-Güncelle</th>
                  </tr>
                  </thead>
                  <tbody>
                                                      <?php 
$slider =$db->prepare("SELECT * FROM slider ORDER BY  slider_id ");
$slider->execute();
$slider_cek =$slider->fetchAll(PDO::FETCH_ASSOC);
$say = $slider->rowcount();
if ($say) {
foreach ($slider_cek as $row) {
    ?>
                  <tr>
                    <td>
                      <img src="../assets/img/<?php echo $row ["slider_resim"]; ?>" alt="Product 1" class="img-circle img-size-64 mr-2">
                      <?php echo $row ["slider_baslik"]; ?>
                    </td>
                    <td><?php echo $row ["slider_yazi"]; ?></td>
                    <td>
                      <a href="slider-duzenle.php?slider_id=<?php echo $row ["slider_id"]; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i>   Düzenle   </button></a>
                      
                         <a href="islem.php?slidersil_id=<?php echo $row ["slider_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i>   Sil   </button></a>
                        
                      </a>
                    </td>
                  </tr>
                    <?php
                                }
                            }else{
                                    ?>
                                    <td>Şuan Hiç Slayt Bulunmamaktadır</td>
                                     <?php
                                 }
                                      ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
         <?php include 'footer.php' ?>