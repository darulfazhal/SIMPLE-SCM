
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
         <div class="box-header">
              <h1 class="box-title">Data Produk</h1>
            </div>  
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <a href="index.php?page=form_tambah_produk" class="btn btn-primary">Tambah Produk</a>
            </div> 
            <div class="box-body">
           
            <?php 
              if(isset($_SESSION['insert_message'])){
              ?>
              <div class="alert alert-<?php echo ($_SESSION['insert_status'])?'success':'error';?>" 
                    role="alert">
                    <?php echo $_SESSION['insert_message'];?> 
              </div>
              <?php 
              unset($_SESSION['insert_message']); 
              }?>
               <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                  <th>Harga Produk</th>
                   
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = mysql_query("select produk.*, jenis_produk.nama_jenis from produk join jenis_produk on(produk.id_jenis_produk = jenis_produk.id_jenis_produk)
                                    ") 
                        or die(mysql_error());
                 
                  $no = 1;
                 while ($produks = mysql_fetch_array($sql, MYSQL_ASSOC)) { 
                    ?>
                 <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $produks['nama_produk'];?></td>
                      <td><?php echo $produks['nama_jenis'];?></td>
                      <td><?php echo $produks['harga_produk'];?></td> 
                      <td>
                        <a href="index.php?page=form_edit_produk&id=<?php echo $produks['id_produk']?>"
                        class="btn btn-primary"
                          >
                          Ubah
                        </a>
                         <a href="produk/proses_delete.php?act=produk&id=<?php echo $produks['id_produk']?>"
                        class="btn btn-danger"
                          >
                          Hapus
                        </a>
                      </td>
                    </tr>
                 <?php $no++; }
                ?>
                </tbody>
                
              </table>
            </div>
            
          </div> 
        </div>
      
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

   