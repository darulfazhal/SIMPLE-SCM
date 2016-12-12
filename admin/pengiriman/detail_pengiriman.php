<section class="content-header"></section>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <strong>Surat Jalan</strong>
        <small class="pull-right">Tanggal: <?php echo DateToIndo(date("Y-m-d H:i:s"));?></small>
      </h2>
    </div>
      <!-- /.col -->
  </div> 

  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      To
      <address>
      <?php
      $sql_pembeli = mysql_query("select users.* from `order` 
                    join users ON(order.id_user = users.id) 
                    where order.id_order = '".$_GET['id']."'
                  ") 
      or die(mysql_error()); 
      
      $order = mysql_fetch_array($sql_pembeli); 
        ?>
      <strong><?php  echo $order['nama'];?> </strong><br>
      
      <?php  echo $order['alamat'];?> 
      </address>
    </div>
   
    <div class="col-sm-4 invoice-col"></div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Invoice #<?php echo $_GET['id']?></b><br>
      <br>
      <b>Order ID:</b> <?php echo $_GET['id']?><br> 
    </div> 
  </div>
    
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th width="10px">No</th>
               
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
        </tr>
        </thead>
        <tbody>
         <?php
                $total = 0;
                $sql = mysql_query("select * from `order` 
                                    join order_detail ON(order.id_order = order_detail.id_order)
                                    join produk ON(order_detail.id_produk = produk.id_produk) 
                                    where order.id_order = '".$_GET['id']."'
                                  ") 
                      or die(mysql_error()); 
                $no = 1;
               while ($order = mysql_fetch_array($sql, MYSQL_ASSOC)) {

                  ?>
         <tr>
                    <td><?php echo $no;?></td>
                    
                    <td><?php echo $order['nama_produk'];?></td>
                    <td><?php echo $order['jumlah'];?></td>
                    <td><?php echo $order['harga_produk'];
                      $total+= $order['harga_produk'] * $order['jumlah'];
                    ?></td> 
                  </tr>
               <?php $no++; }
              ?>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div> 

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6"> 
    </div>
    <!-- /.col -->
    <div class="col-xs-6"> 

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td>Rp. <?php echo $total;?></td>
          </tr>
           
          <tr>
            <th>Total </th>
            <td>Rp. <?php echo $total;?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
   
  <div class="row no-print">
    <div class="col-xs-3"> 
      <a type="button" href="index.php?page=pengiriman" class="btn btn-default  " style="margin-right: 5px;">
        Kembali
      </a>
    </div>
    <div class="col-xs-9"> 
      <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
        <i class="fa fa-download"></i> Download Pdf
      </button>
    </div>
  </div>
</section>