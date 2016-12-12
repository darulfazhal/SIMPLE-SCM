 <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Supplier</h3>
            </div> 
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form_validation" action="supplier/proses_tambah.php" method="POST">
            <input type="hidden" name="act" value="supplier">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat" autocomplete="off"></textarea>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" autocomplete="off">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Kontak</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_kontak" name="no_kontak" placeholder="No Kontak" autocomplete="off">
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