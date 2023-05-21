<?php include 'header.php'?>
<?php include 'sidebar.php'?>




 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog Ayarlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Blog Ayarlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Blog</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Blog Fotoğraf</th>
                    <th>Blog Başlık</th>
                    <th>Blog Kısa Metin </th>
                    <th>Blog Kategori</th>
                  </tr>
                  </thead>
                  <tbody>
                                                      <?php 
$yazilar =$db->prepare("SELECT * FROM yazilar ORDER BY  yazi_id ");
$yazilar->execute();
$yazi_cek =$yazilar->fetchAll(PDO::FETCH_ASSOC);
$say = $yazilar->rowcount();
if ($say) {
foreach ($yazi_cek as $row) {
    ?>
                  <tr>
                    <td>
                       <img src="../assets/img/blog/<?php echo $row ["yazi_foto"]; ?>" alt="Product 1" class="img-circle img-size-64 mr-2">
                       <td>
                      <?php echo $row ["yazi_title"]; ?></td>
                        </td>
                        <td>
                      <?php echo $row ["yazi_icerik"]; ?>
                  </td>
                    <td><?php echo $row ["yazi_kategori_id"]; ?></td>
                    <td>
                      <a href="blog-duzenle.php?yazi_id=<?php echo $row ["yazi_id"]; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i>   Düzenle   </button></a>
                      
                         <a href="islem.php?blogsil_id=<?php echo $row ["yazi_id"]; ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i>   Sil   </button></a>
                        
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