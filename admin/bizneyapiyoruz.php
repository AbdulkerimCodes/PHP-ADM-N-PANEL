<?php include 'header.php'?>
<?php include 'sidebar.php'?>




 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ürün Ayarlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürün Ayarlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Ürün</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                     <th>resim</th>
                    <th>Ürün Logo</th>
                    <th>Ürün Başlık</th>
                    <th>Ürün Kısa Yazı</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                                                      <?php 
$urunler =$db->prepare("SELECT * FROM urunler ORDER BY  urun_id ");
$urunler->execute();
$urunler_cek =$urunler->fetchAll(PDO::FETCH_ASSOC);
$say = $urunler->rowcount();
if ($say) {
foreach ($urunler_cek as $row) {
    ?>
                  <tr>
                    <td>
                      <img src="../assets/img/neyapiyoruz/<?php echo $row ["urun_resim"]; ?>" alt="Product 1" class="img-circle img-size-64 mr-2">
                    </td>
                       <td>
                      <?php echo $row ["urun_logo"]; ?></td>
                        </td>
                        <td>
                      <?php echo $row ["urun_baslik"]; ?>
                  </td>
                    <td><?php echo $row ["urun_kisayazi"]; ?></td>
                    <td>
                      <a href="bizneyapiyoruz-duzenle.php?urun_id=<?php echo $row ["urun_id"]; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i>   Düzenle   </button></a>
                      
                         <a href="islem.php?urunsil_id=<?php echo $row ["urun_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i>   Sil   </button></a>
                        
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