<section class="content-header"></section>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <strong>Penerimaan Bahan </strong>
        <small class="pull-right">Tanggal: <?php echo DateToIndo(date("Y-m-d H:i:s"));?></small>
      </h2>
    </div>
      <!-- /.col -->
  </div>  
    
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th width="10px">No</th>
            
            <th>Bahan</th>
            <th>Jumlah</th> 
          </tr>
        </thead>
        <tbody>
         <?php
            $total = 0;
            $sql = mysql_query("select *,produk_bahan.jumlah as jumlah_barang from `order` 
                                join order_detail ON(order.id_order = order_detail.id_order)
                                join produk ON(order_detail.id_produk = produk.id_produk) 
                                 join produk_bahan ON(produk.id_produk = produk_bahan.id_produk) 
                                 join bahan ON(bahan.id_bahan = produk_bahan.id_bahan) 
                                where order.id_order = '".$_GET['id']."'
                              ") 
                  or die(mysql_error()); 
            $no = 1;
            while ($order = mysql_fetch_array($sql, MYSQL_ASSOC)) {
        ?>
        <tr>
          <td><?php echo $no;?></td> 
          <td><?php echo $order['nama_bahan'];?></td>
          <td><?php 
            echo $order['jumlah_barang'];
            $total+= $order['harga_produk'] * $order['jumlah'];
          ?>
          </td> 
        </tr>
        <?php $no++; } ?>
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

      
    </div>
    <!-- /.col -->
  </div>
   
  <div class="row no-print">
    <div class="col-xs-3"> 
      <a type="button" href="index.php?page=receive_order" class="btn btn-default  " style="margin-right: 5px;">
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