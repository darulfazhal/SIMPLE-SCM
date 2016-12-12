
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
           <h3 class="box-title">Data Bahan</h3>
        
          </div>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="index.php?page=form_tambah_bahan" class="btn btn-primary">Tambah Bahan</a>
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
                  <th>Nama Bahan</th>
                   <th>Harga Satuan Bahan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = mysql_query("select * from bahan
                                    ") 
                        or die(mysql_error());
                 
                  $no = 1;
                 while ($bahan = mysql_fetch_array($sql, MYSQL_ASSOC)) {

                    ?>
                 <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $bahan['nama_bahan'];?></td>
                      <td><?php echo $bahan['harga_satuan_bahan'];?></td> 
                       <td>
                        <a href="index.php?page=form_edit_bahan&id=<?php echo $bahan['id_bahan']?>"
                        class="btn btn-primary"
                          >
                          Ubah
                        </a>
                          <a href="bahan/proses_delete.php?act=bahan&id=<?php echo $bahan['id_bahan']?>"
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

   