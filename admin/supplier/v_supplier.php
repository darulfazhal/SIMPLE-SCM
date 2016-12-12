
    <section class="content">
      <div class="row">
	    <div class="col-xs-12">
	      <div class="box">
	        <div class="box-body">
           <h3 class="box-title">Data Supplier</h3>
	     	
	      	</div>
	      </div>
      	</div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="index.php?page=form_tambah_supplier" class="btn btn-primary">Tambah Supplier</a> 
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
                  <th>Nama Supplier</th>
                  <th>Alamat Supplier</th>
                  <th>Kota</th>
                  <th>No Kontak</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = mysql_query("select * from supplier
                                    ") 
                        or die(mysql_error());
                 
                  $no = 1;
                 while ($supplier = mysql_fetch_array($sql, MYSQL_ASSOC)) {

                    ?>
                 <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $supplier['nama_supplier'];?></td>
                      <td><?php echo $supplier['alamat_supplier'];?></td>
                      <td><?php echo $supplier['kota'];?></td> 
                      <td>
                       <?php echo $supplier['no_kontak'];?>
                      </td>
                       <td>
                        <a href="index.php?page=form_edit_supplier&id=<?php echo $supplier['id_supplier']?>"
                        class="btn btn-primary"
                          >
                          Ubah
                        </a>
                         <a href="supplier/proses_delete.php?act=supplier&id=<?php echo $supplier['id_supplier']?>"
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

   