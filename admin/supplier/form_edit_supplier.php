
 <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Ubah Supplier</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"  id="form_validation" action="supplier/proses_edit.php" method="POST">
            
            <?php
              $sql = mysql_query("select * from supplier where id_supplier='".$_GET['id']."'") or die(mysql_error()); 
              if(mysql_num_rows($sql) >= 0)
              { 
                $data_user = mysql_fetch_array($sql);   
              }

              $id = (!empty($data_user))?$data_user['id_supplier']:""; 
              $nama_supplier = (!empty($data_user))?$data_user['nama_supplier']:""; 
              $alamat_supplier = (!empty($data_user))?$data_user['alamat_supplier']:""; 
              $kota = (!empty($data_user))?$data_user['kota']:""; 
              $no_kontak = (!empty($data_user))?$data_user['no_kontak']:""; 

            ?>
            <input type="hidden" name="act" value="supplier">
            <input type="hidden" name="id" value="<?php echo $id;?>">

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" 
                      id="nama" 
                      name="nama"
                      placeholder="Nama" 
                      autocomplete="off"
                      value="<?php echo $nama_supplier;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label> 
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" 
                    placeholder="Keterangan ..."
                    id="alamat"
                    autocomplete="off"
                    name="alamat"><?php echo $alamat_supplier;?></textarea>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" 
                    id="kota"
                    name="kota" 
                    autocomplete="off"
                    placeholder="Kota" 
                    value="<?php echo $kota;?>">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Kontak</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" 
                      id="no_kontak" 
                      name="no_kontak"
                      autocomplete="off"
                      placeholder="No Kontak"
                    value="<?php echo $no_kontak;?>">
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="index.php?page=supplier" class="btn btn-default">Batal</a>
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
 <script src="supplier/supplier.js"></script>