 <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Ubah Satuan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form_validation" action="satuan/proses_edit.php" method="POST">
             <?php
              $sql = mysql_query("select * from satuan where id_satuan='".$_GET['id']."'") or die(mysql_error()); 
              if(mysql_num_rows($sql) >= 0)
              { 
                $data = mysql_fetch_array($sql);   
              }

              $id = (!empty($data))?$data['id_satuan']:""; 
              $nama = (!empty($data))?$data['nama_satuan']:""; 
              $keterangan = (!empty($data))?$data['keterangan']:"";

            ?> 
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="act" value="satuan">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Satuan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  id="nama" name="nama"  
                      value="<?php echo $nama;?>" placeholder="Nama" autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-10">
                     <textarea class="form-control" rows="3"  id="keterangan" autocomplete="off" name="keterangan" placeholder="Keterangan ..."><?php echo $keterangan;?></textarea>
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="index.php?page=satuan" class="btn btn-default">Batal</a>
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
 <script src="satuan/satuan.js"></script>