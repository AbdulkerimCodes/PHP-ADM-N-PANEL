<?php include 'header.php'?>
<?php include 'sidebar.php'?>




 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sertifikalar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Sertifika Ayarları</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Sertifika</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Sertifika Pdf</th>
                    <th>Sertifika Pdf Başlık</th>
                    <th>Sertifika Link </th>
                  </tr>
                  </thead>
                  <tbody>
                                                      <?php 
$sertifikalar =$db->prepare("SELECT * FROM sertifikalar ORDER BY  sertifika_id ");
$sertifikalar->execute();
$sertifika_cek =$sertifikalar->fetchAll(PDO::FETCH_ASSOC);
$say = $sertifikalar->rowcount();
if ($say) {
foreach ($sertifika_cek as $row) {
    ?>
                  <tr>
                    <td>
                      <object width="150" height="150" data="../assets/img/sertifikalar/<?php echo $row ["sertifika_pdf"]; ?>"  type="application/pdf">
                       <td>
                      <?php echo $row ["sertifika_isim"]; ?></td>
                        </td>
                    <td>
                      <a href="sertifika-duzenle.php?sertifika_id=<?php echo $row ["sertifika_id"]; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i>   Düzenle   </button></a>
                      
                         <a href="islem.php?sertifikasil_id=<?php echo $row ["sertifika_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i>   Sil   </button></a>
                        
                      </a>
                    </td>
                  </tr>
                    <?php
                                }
                            }else{
                                    ?>
                                    <td>Şuan Hiç Sertifika Bulunmamaktadır</td>
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