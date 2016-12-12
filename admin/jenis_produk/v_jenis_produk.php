
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
           <h3 class="box-title">Data Jenis Produk</h3>
        
          </div>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="index.php?page=form_tambah_jenis" class="btn btn-primary">Tambah Jenis Produk</a>
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
                  <th>Nama Jenis Produk</th>
                   <th>Keterangan </th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = mysql_query("select * from jenis_produk
                                    ") 
                        or die(mysql_error());
                 
                  $no = 1;
                 while ($jenis_produk = mysql_fetch_array($sql, MYSQL_ASSOC)) {

                    ?>
                 <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $jenis_produk['nama_jenis'];?></td>
                      <td><?php echo $jenis_produk['keterangan'];?></td> 
                       <td>
                        <a href="index.php?page=form_edit_jenis&id=<?php echo $jenis_produk['id_jenis_produk']?>"
                        class="btn btn-primary"
                          >
                          Ubah
                        </a>
                        <a href="jenis_produk/proses_delete.php?act=jenis_produk&id=<?php echo $jenis_produk['id_jenis_produk']?>"
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

   