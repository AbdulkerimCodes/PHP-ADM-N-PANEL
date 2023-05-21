<?php include 'header.php'?>
<?php include 'sidebar.php'?>




 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>İletişim Ayarlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">İletişim</a></li>
              <li class="breadcrumb-item active">İletişim Ayarlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">İletişim</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Tarih</th>
                    <th>ID</th>
                    <th>İsim Soyisim</th>
                    <th>Mail Adresi</th>
                    <th>Telefon Numarası</th>
                    <th>Konu</th>
                    <th>Mesaj</th>
                    <th>Görüntülenme</th>
                  </tr>
                  </thead>
                  <tbody>
       <?php 
$iletisim =$db->prepare("SELECT * FROM iletisim ORDER BY  iletisim_id  DESC");
$iletisim->execute();
$iletisim_cek =$iletisim->fetchAll(PDO::FETCH_ASSOC);
$say = $iletisim->rowcount();
if ($say) {
foreach ($iletisim_cek as $row) {
   if ($row["mesaj_okunma"]==1) {
    # code...
  
    ?>
                  <tr>
                      <td><?php echo $row ["iletisim_tarih"]; ?></td>
                      <th scope="row" ><?php echo $row ["iletisim_id"]; ?></th>
                    <td>
                      <?php echo $row ["iletisim_isim"]; ?>
                    </td>
                    <td><?php echo $row ["iletisim_mail"]; ?></td>
                    <td>
                      <?php echo $row ["iletisim_tel"]; ?>
                    </td>
                    <td><?php echo $row ["iletisim_konu"]; ?></td>
                    <td><?php echo $row ["iletisim_mesaj"]; ?></td>
                    <td><span class="fa fa-eye" style="color: #00FF00;"></span></td>

                    <td>

                      <a href="mesaj-oku.php?iletisim_id=<?php echo $row ["iletisim_id"]; ?>"><button class="btn btn-primary">   Oku   </button></a>
                      
                         <a href="islem.php?iletisimsil_id=<?php echo $row ["iletisim_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i>   Sil   </button></a>
                        
                      </a>
                    </td>
                  </tr>
                   <?php
                                  }else{
                                    ?>
                                     <tr>
                                       <td><?php echo $row ["iletisim_tarih"]; ?></td>
                                        <th scope="row" ><?php echo $row ["iletisim_id"]; ?></th> 
                                        <td><?php echo $row ["iletisim_isim"]; ?></td>
                                         <td><?php echo $row ["iletisim_mail"]; ?></td>
                                         <td><?php echo $row ["iletisim_tel"]; ?></td>
                                         <td><span class="tag tag-success"><?php echo $row ["iletisim_konu"]; ?></span></td>
                                           <td><?php echo $row ["iletisim_mesaj"]; ?></td>
                                           <td><span class="fa fa-eye" style="color: #ff0000 ;"></span></td>


                                        <td><a href="mesaj-oku.php?iletisim_id=<?php echo $row ["iletisim_id"]; ?>"><button class="btn btn-primary">Oku</button></a>
                                            <a href="islem.php?iletisimsil_id=<?php echo $row ["iletisim_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                        
                                    </tr>
                    <?php
                                }
                                }
                            }else{
                                    ?>
                                    <td>Şuan Hiç Mesaj Bulunmamaktadır</td>
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