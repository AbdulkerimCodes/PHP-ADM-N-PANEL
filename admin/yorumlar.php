<?php include 'header.php'?>
<?php include 'sidebar.php'?>




 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Yorum Ayarları</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Yorum Ayarları</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Yorumlar</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Ekleyen</th>
                    <th>Yazı</th>
                    <th>Tarih</th>
                    <th>Durum</th>
                    <th>Cevap</th>
                    <th>İşlemler</th>
                  </tr>
                  </thead>
                  <tbody>
                                                      <?php 
$yorumlar =$db->prepare("SELECT * FROM yorumlar INNER JOIN yazilar ON yazilar.yazi_id = yorumlar.yorum_yazi_id  WHERE yorum_ust=? ORDER BY  yorum_id DESC ");
$yorumlar->execute(array(0));
$yorum_cek =$yorumlar->fetchAll(PDO::FETCH_ASSOC);
$say = $yorumlar->rowcount();
if ($say) {
foreach ($yorum_cek as $row) {

    ?>
                  <tr>
                    <td><?php echo $row ["yorum_id"]; ?></td>
                    <td><?php echo $row ["yorum_ekleyen"]; ?></td>
                    <td><?php echo $row ["yorum_icerik"]; ?></td>
                    <td><?php echo $row ["yorum_tarih"]; ?></td>
                    <td style="text-align: center">
                      <?php if ($row["yorum_durum"]==1) {
                        echo "<span class='fa fa-check-circle text-success'></span>";
                      }else{
                echo "<span class='fa fa-times-circle text-danger'></span>";
                      }
                      ?>
                    </td>
                     <td style="text-align: center">
                      <?php if ($row["yorum_cevap"]==1) {
                        echo "<span class='fa fa-check-circle text-success'></span>";
                      }else{
                echo "<span class='fa fa-times-circle text-danger'></span>";
                      }
                      ?>
                    </td>
                    <td>
                      <a href="yorum-cevapla.php?yorum_id=<?php echo $row ["yorum_id"]; ?>"><button class="btn btn-success"><i class="fas fa-comment"></i>   Cevapla   </button></a>

                      <a href="yorum-duzenle.php?yorum_id=<?php echo $row ["yorum_id"]; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i>   Düzenle   </button></a>
                      
                         <a href="islem.php?yorumlarsil_id=<?php echo $row ["yorum_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i>   Sil   </button></a>
                        
                      </a>
                    </td>

                  </tr>
                    <?php
                                }
                            }else{
                                    ?>
                                    <td>Şuan Hiç Yorum Bulunmamaktadır</td>
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