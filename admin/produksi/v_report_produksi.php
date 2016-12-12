
    <section class="content">
      <div class="row">
	    <div class="col-xs-12">
	      <div class="box">
	       <div class="box-header">
              <h1 class="box-title">Laporan Proses Produksi</h1>
            </div>  
	      </div>
      	</div>
      </div>
       <!-- filter -->
      <div class="row">
         <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <form class="form-horizontal" action="index.php?page=report_produksi" method="POST">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Mulai</label>

                    <div class="col-sm-4">
                      <div class="input-group date">
                       
                        <input type="text" class="form-control pull-right" id="datepicker1" placeholder="22/12/2016">
                         <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Akhir</label>

                    <div class="col-sm-4">
                       <div class="input-group date">
                        
                        <input type="text" class="form-control pull-right" id="datepicker2" placeholder="22/12/2016">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>
                <!-- /.box-body -->
                <div class="col-sm-6"> 
                  <div class="col-sm-4 pull-right">
                  <button type="submit" class="btn btn-info pull-right">Filter</button>
                  </div>
                </div>
                <!-- /.box-footer -->
              </form>
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
                  <th>No Order</th>
                  <th>Nama Konsumen</th>
                  <th>Tanggal Order</th>
                  <th>Status Order</th>
                 
                </tr>
                </thead>
                <tbody> 
                <?php
                  $sql = mysql_query("select * from `order` 
                                      join users ON(order.id_user = users.id) 
                                      join enum_status_order ON(enum_status_order.id = order.status_order) 
                                    ") 
                        or die(mysql_error());
                 
                  $no = 1;
                 while ($order = mysql_fetch_array($sql, MYSQL_ASSOC)) {

                    ?>
                      <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $order['id_order'];?></td>
                      <td><?php echo $order['nama'];?></td>
                      <td><?php echo $order['tanggal_order'];?></td>
                      <td><?php echo $order['status'];?></td>
                      
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

   