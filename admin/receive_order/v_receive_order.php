
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
         <div class="box-header">
              <h1 class="box-title">Data Receive Order</h1>
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
                  <th>Nama Konsumen</th>
                  <th>Tanggal Order</th>
                  <th>Status Order</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody> 
                <?php
                  $sql = mysql_query("select * from `order` 
                                      join users ON(order.id_user = users.id) 
                                      join enum_status_order ON(enum_status_order.id = order.status_order) 
                                      where status_order IN(7)
                                    ") 
                        or die(mysql_error());
                 
                  $no = 1;
                 while ($order = mysql_fetch_array($sql, MYSQL_ASSOC)) {

                    ?>
                      <tr>
                      <td><?php echo $no;?></td>
                       
                      <td><?php echo $order['nama'];?></td>
                       <td><?php echo DateToIndo($order['tanggal_order']);?></td>
                      <td><?php echo $order['status'];?></td>
                      <td>
                        <a href="index.php?page=detail_receive_order&id=<?php echo $order['id_order'];?>" class="btn btn-primary">Detail</a>
                        <a href="receive_order/proses_receive_order.php?id=<?php echo $order['id_order'];?>" class="btn btn-primary">Terima Barang</a>
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

   