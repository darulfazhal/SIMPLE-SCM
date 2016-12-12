 <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Bahan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <form class="form-horizontal" id="form_validation"  action="bahan/proses_tambah.php" method="POST">
            <input type="hidden" name="act" value="bahan">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Bahan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" placeholder="Nama" autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Satuan Bahan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga_satuan_bahan" name="harga_satuan_bahan" placeholder="Harga" autocomplete="off">
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="index.php?page=bahan" class="btn btn-default">Batal</a>
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
 <script src="bahan/bahan.js"></script>