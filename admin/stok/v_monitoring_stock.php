
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
         <div class="box-header">
              <h1 class="box-title">Stok Monitoring</h1>
            </div>  
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <div class="box-body"> 
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="10px">No</th>
                 
                  <th>Nama Bahan</th>
                  <th>Stok Awal</th>
                  <th>Pembelian</th>
                  <th>Pemakaian</th>
                  <th>Stok Akhir</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody> 
                <?php
                  $sql = mysql_query("select * from `bahan`") 
                        or die(mysql_error());
                 
                  $no = 1;
                 while ($order = mysql_fetch_array($sql, MYSQL_ASSOC)) {

                    ?>
                      <tr>
                      <td><?php echo $no;?></td>
                      
                      <td><?php echo $order['nama_bahan'];?></td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>-</td>
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

   