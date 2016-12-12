 <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Jenis Produk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form class="form-horizontal"  id="form_validation" action="jenis_produk/proses_tambah.php" method="POST">
            <input type="hidden" name="act" value="jenis_produk">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Jenis Produk</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" placeholder="Nama">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-10">
                     <textarea class="form-control" rows="3" id="keterangan" name="keterangan" autocomplete="off" placeholder="Keterangan ..."></textarea>
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="index.php?page=jenis_produk" class="btn btn-default">Batal</a>
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
 <script src="jenis_produk/jenis_produk.js"></script>