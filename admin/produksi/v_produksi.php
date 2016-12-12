
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
         <div class="box-header">
              <h1 class="box-title">Data Produksi</h1>
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
                                      where status_order IN(2,3,4,5,6,7,8,12)
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
                        <a href="index.php?page=detail_produksi&id=<?php echo $order['id_order'];?>" class="btn btn-primary">
                          Detail
                        </a>
                        <?php if( (
                                $order['status_order'] != 2 &&
                                $order['status_order'] != 4 &&
                                $order['status_order'] != 5 &&
                                $order['status_order'] != 6 &&
                                $order['status_order'] != 7 &&
                                $order['status_order'] != 8 &&
                                $order['status_order'] != 3) ||
                                $order['status_order'] == 12
                             ){?>
                             <a href="produksi/proses_produksi.php?id=<?php echo $order['id_order'];?>" class="btn btn-primary">
                          Proses Produksi</a>
                        <?php } ?>
                        
                        <?php if($order['status_order'] == 9 ){?>
                        <a href="pengiriman/proses_pengiriman.php?id=<?php echo $order['id_order'];?>" class="btn btn-primary">
                          Proses Pengiriman
                        </a>
                        <?php } ?>

                         <?php if($order['status_order'] == 3 ){?>
                         <a href="produksi/proses_produksi_selesai.php?id=<?php echo $order['id_order'];?>" class="btn btn-primary">Selesai</a>
                        <?php } ?>

                        <?php if($order['status_order'] < 3 ){?>
                            <a href="permintaan/proses_permintaan_bahan_baku.php?id=<?php echo $order['id_order'];?>" class="btn btn-primary">Proses Permintaan Stok
                            </a>
                          <?php }?> 
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

   