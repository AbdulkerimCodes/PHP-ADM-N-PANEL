<?php include 'header.php'?>
<?php include 'sidebar.php'?>




 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori Ayarları</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kategori Ayarları</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Kategori</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Kategori Adı</th>
                  </tr>
                  </thead>
                  <tbody>
                                                      <?php 
$kategoriler =$db->prepare("SELECT * FROM kategoriler ORDER BY  kategori_id ");
$kategoriler->execute();
$kategori_cek =$kategoriler->fetchAll(PDO::FETCH_ASSOC);
$say = $kategoriler->rowcount();
if ($say) {
foreach ($kategori_cek as $row) {

      $urunler =$db->prepare("SELECT * FROM urunler WHERE urun_kategori_id=? ");
      $urunler->execute(array($row["kategori_id"]));
      $urunler_cek =$urunler->fetchAll(PDO::FETCH_ASSOC);
      $urunsay = $urunler->rowcount();


    ?>
                  <tr>
                    <td><?php echo $row ["kategori_id"]; ?></td>
                    <td><?php echo $row ["kategori_title"]; ?></td>
                    <td>
                      <a href="kategori-duzenle.php?kategori_id=<?php echo $row ["kategori_id"]; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i>   Düzenle   </button></a>
                      
                         <a href="islem.php?kategorisil_id=<?php echo $row ["kategori_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i>   Sil   </button></a>
                        
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