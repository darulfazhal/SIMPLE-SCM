<style>
  .master-field{
    display: none;
  }
</style>
 <section class="content">
      <div class="row"> 
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Produk</h3>
            </div> 
            <form class="form-horizontal" id="form_validation" enctype="multipart/form-data" action="produk/proses_tambah.php" method="POST">
              <input type="hidden" name="act" value="produk">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label> 
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Produk</label> 
                  <div class="col-sm-10">
                   <select class="form-control" name="id_jenis_produk">
                     <option value="">Pilih Jenis Produk</option>
                    <?php
                    $sql = mysql_query("select * from jenis_produk ")  or die(mysql_error()); 
                  
                   while ($grups = mysql_fetch_array($sql, MYSQL_ASSOC)) { 
                      ?>
                    <option value="<?php echo $grups['id_jenis_produk'];?>"><?php echo $grups['nama_jenis'];?></option>
                     
                    <?php }?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Produk</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  id="harga_produk" name="harga_produk" placeholder="Harga" autocomplete="off">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Gambar Produk</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control"  id="gambar_produk" name="gambar_produk" >
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Bahan</label> 
                  <div class="col-sm-10"> 
                    <a href="javascript:void(0);" class="add_button" title="Add field"><img src="produk/images/add-icon.png"/></a>
                  </div>
                </div> 
                <div class="field_wrapper">
                  <div class="master-field form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> </label> 
                    <div class="col-sm-3">
                      <select class="form-control" name="bahan[]">
                        <option value="">Pilih Bahan</option>
                        <?php
                        $sql = mysql_query("select * from bahan ")  or die(mysql_error()); 
                      
                       while ($grups = mysql_fetch_array($sql, MYSQL_ASSOC)) { 
                          ?>
                        <option value="<?php echo $grups['id_bahan'];?>"><?php echo $grups['nama_bahan'];?></option>
                         
                        <?php }?>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="qty[]"  placeholder="Jumlah" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                      <select class="form-control" name="satuan[]">
                        <option value="">Pilih Satuan</option>
                        <?php
                        $sql = mysql_query("select * from satuan ")  or die(mysql_error()); 
                      
                       while ($grups = mysql_fetch_array($sql, MYSQL_ASSOC)) { 
                          ?>
                        <option value="<?php echo $grups['id_satuan'];?>"><?php echo $grups['nama_satuan'];?></option>
                         
                        <?php }?>
                      </select>
                    </div>  
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="index.php?page=produk" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
           
        </div>
      </div>
 </section> 
 <script src="<?php echo $url?>plugins/jQuery/jquery.1.12.4.js"></script>
 <script src="produk/produk.js"></script>