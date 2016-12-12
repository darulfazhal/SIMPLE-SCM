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
              <h3 class="box-title">Form Ubah Produk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form class="form-horizontal" id="form_validation"  action="produk/proses_edit.php" enctype="multipart/form-data" method="POST">
            
            <?php
              $sql = mysql_query("select * from produk where id_produk='".$_GET['id']."'") or die(mysql_error()); 
              if(mysql_num_rows($sql) >= 0)
              { 
                $data = mysql_fetch_array($sql);   
              }

              $id = (!empty($data))?$data['id_produk']:""; 
              $nama_produk = (!empty($data))?$data['nama_produk']:""; 
              $harga_produk = (!empty($data))?$data['harga_produk']:""; 
              $jenis_produk = (!empty($data))?$data['id_jenis_produk']:""; 
              $url_gambar = (!empty($data))?$data['url_gambar']:""; 
             

            ?>
            <input type="hidden" name="act" value="produk">
            <input type="hidden" name="id" value="<?php echo $id;?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>

                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama" autocomplete="off" value="<?php echo $nama_produk;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Produk</label> 
                  <div class="col-sm-10">
                   <select class="form-control" name="id_jenis_produk"> 
                    <?php
                    $sql = mysql_query("select * from jenis_produk ")  or die(mysql_error()); 
                  
                   while ($grups = mysql_fetch_array($sql, MYSQL_ASSOC)) { 
                      ?>
                    <option <?php if($grups['id_jenis_produk']==$jenis_produk) echo "selected";?>  value="<?php echo $grups['id_jenis_produk'];?>"><?php echo $grups['nama_jenis'];?></option>
                     
                    <?php }?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Produk</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="harga_produk" name="harga_produk" autocomplete="off" value="<?php echo $harga_produk;?>"  placeholder="Harga">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Gambar Produk</label>

                  <div class="col-sm-10">
                  <?php if(empty($url_gambar)) $url_gambar = "default.png";?>
                     <img src="../assets/produk/<?php echo $url_gambar?>" style="max-height: 200px;"  class="thumbnail" >
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> </label>

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
                  <!-- UNTUK MENGAMBIL DATA PRODUK BAHAN -->
                  <?php 
                    $sql_produk_bahan = mysql_query("select * from produk_bahan where id_produk ='".$id."'")  or die(mysql_error()); 
                    while ($data_produk_bahan = mysql_fetch_array($sql_produk_bahan, MYSQL_ASSOC)) { 
                      
                  ?>
                  <div class=" form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"> </label> 
                    <div class="col-sm-3">
                      <select class="form-control" name="bahan[]">
                        <option value="">Pilih Bahan</option>
                        <?php
                        $sql = mysql_query("select * from bahan ")  or die(mysql_error()); 
                        while ($grups = mysql_fetch_array($sql, MYSQL_ASSOC)) { 
                        ?>
                          <option  
                                <?php if($grups['id_bahan']==$data_produk_bahan['id_bahan']) echo "selected";?> 
                                value="<?php echo $grups['id_bahan'];?>"><?php echo $grups['nama_bahan'];?></option>
                         
                        <?php }?>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="qty[]" value="<?php echo $data_produk_bahan['jumlah']?>" placeholder="Jumlah" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                      <select class="form-control" name="satuan[]">
                        <option value="">Pilih Satuan</option>
                        <?php
                        $sql = mysql_query("select * from satuan ")  or die(mysql_error()); 
                        while ($grups = mysql_fetch_array($sql, MYSQL_ASSOC)) { 
                        ?>
                        <option 
                          <?php if($grups['id_satuan']==$data_produk_bahan['id_satuan']) echo "selected";?> 
                          value="<?php echo $grups['id_satuan'];?>"><?php echo $grups['nama_satuan'];?></option>   
                        <?php }?>
                      </select>
                    </div>  
                    <a href="javascript:void(0);" 
                      class="remove_button" title="Remove field">
                          <img src="produk/images/remove-icon.png"/>
                      </a>
                  </div>
                  <?php }?>
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