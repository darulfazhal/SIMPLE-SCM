

<?php 
require('../../plugins/fpdf/html2pdf.php');
  $pdf=new PDF_HTML();
  $pdf->SetFont('Arial','',12);
  $pdf->AddPage();
  $pdf->WriteHTML('<section class="content-header"></section>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <strong>Detail Order</strong>
        <small class="pull-right">Tanggal:  123</small>
      </h2>
    </div>
      <!-- /.col -->
  </div> 

  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      To
      <address>
       
      <strong> asdasdad </strong><br>
      
      asdasd
      </address>
    </div>
   
    <div class="col-sm-4 invoice-col"></div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Invoice #123123</b><br>
      <br>
      <b>Order ID:</b> 123123<br> 
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
         <tr>
            <td><?php echo $no;?></td>
            
            <td>0</td>
            <td>0</td>
            <td>0</td>
          </tr>
       <?php $no++; }  ?>
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
   
   
</section>
');
  $pdf->Output();
  exit;

?>