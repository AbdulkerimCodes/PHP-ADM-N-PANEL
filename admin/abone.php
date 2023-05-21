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
                    <th>Mail Adresi</th>
                    <th>Görüntülenme</th>
                  </tr>
                  </thead>
                  <tbody>
       <?php 
$aboneler =$db->prepare("SELECT * FROM aboneler ORDER BY  abone_id  DESC");
$aboneler->execute();
$abone_cek =$aboneler->fetchAll(PDO::FETCH_ASSOC);
$say = $aboneler->rowcount();
if ($say) {
foreach ($abone_cek as $row) {
   if ($row["abone_okunma"]==1) {
    # code...
  
    ?>
                  <tr>
                      <td><?php echo $row ["abone_saat"]; ?></td>
                      <th scope="row" ><?php echo $row ["abone_id"]; ?></th>
                    <td><?php echo $row ["abone_mail"]; ?></td>
                    <td><span class="fa fa-eye" style="color: #00FF00;"></span></td>

                    <td>

                
                      
                         <a href="islem.php?iletisimsil_id=<?php echo $row ["abone_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i>   Sil   </button></a>
                        
                      </a>
                    </td>
                  </tr>
                   <?php
                                  }else{
                                    ?>
                                     <tr>
                                       <td><?php echo $row ["abone_saat"]; ?></td>
                                        <th scope="row" ><?php echo $row ["abone_id"]; ?></th> 
                                         <td><?php echo $row ["abone_mail"]; ?></td>
                                           <td><span class="fa fa-eye" style="color: #ff0000 ;"></span></td>


                                      
                                          <a href="islem.php?abonesil_id=<?php echo $row ["abone_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                        
                                    </tr>
                    <?php
                                }
                                }
                            }else{
                                    ?>
                                    <td>Şuan Hiç Abone Bulunmamaktadır</td>
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