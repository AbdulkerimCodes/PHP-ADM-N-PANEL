<?php include 'header.php'?>
<?php include 'sidebar.php'?>




 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Portfolyo Ayarlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Portfolyo Ayarlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Portfolyo</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Portfolyo Fotoğraf</th>
                    <th>Portfolyo Başlık</th>
                    <th>Portfolyo Kısa Metin </th>
                    <th>Portfolyo Liste</th>
                  </tr>
                  </thead>
                  <tbody>
                                                      <?php 
$portfolyo =$db->prepare("SELECT * FROM portfolyo ORDER BY  portfolyo_id ");
$portfolyo->execute();
$portfolyo_cek =$portfolyo->fetchAll(PDO::FETCH_ASSOC);
$say = $portfolyo->rowcount();
if ($say) {
foreach ($portfolyo_cek as $row) {
    ?>
                  <tr>
                    <td>
                       <img src="../assets/img/portfolio/<?php echo $row ["portfolyo_fotograf"]; ?>" alt="Product 1" class="img-circle img-size-64 mr-2">
                       <td>
                      <?php echo $row ["portfolyo_baslik"]; ?></td>
                        </td>
                        <td>
                      <?php echo $row ["portfolyo_kisametin"]; ?>
                  </td>
                    <td><?php echo $row ["portfolyo_class"]; ?></td>
                    <td>
                      <a href="portfolyo-duzenle.php?portfolyo_id=<?php echo $row ["portfolyo_id"]; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i>   Düzenle   </button></a>
                      
                         <a href="islem.php?portfolyosil_id=<?php echo $row ["portfolyo_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i>   Sil   </button></a>
                        
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