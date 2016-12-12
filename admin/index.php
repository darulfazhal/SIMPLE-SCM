<?php
  $url = '../';
  include '../template/header.php';
?>

<div class="content-wrapper">
<?php
  $url_admin = '../admin/';
  if(isset($_GET['page'])){
      switch ($_GET['page']) {
        case 'dashboard':
          include $url_admin.'dashboard/dashboard.php';
          break;
        case 'supplier':
          include $url_admin.'supplier/v_supplier.php';
          break;
        case 'bahan':
          include $url_admin.'bahan/v_bahan.php';
          break;
        case 'produk':
          include $url_admin.'produk/v_produk.php';
          break;
         case 'jenis_produk':
          include $url_admin.'jenis_produk/v_jenis_produk.php';
          break;
        case 'satuan':
          include $url_admin.'satuan/v_satuan.php';
          break;
        case 'user':
          include $url_admin.'user/v_user.php';
          break;
        case 'konsumen':
          include $url_admin.'v_konsumen.php';
          break;
        case 'order':
          include $url_admin.'order/v_order.php';
          break;
        case 'produksi':
          include $url_admin.'produksi/v_produksi.php';
          break;
        case 'pengiriman':
          include $url_admin.'pengiriman/v_pengiriman.php';
          break;
        case 'peramalan':
          include $url_admin.'peramalan/v_peramalan.php';
          break;
        case 'analisa_supplier':
          include $url_admin.'supplier/v_analisa_supplier.php';
          break;
        case 'request_stock':
          include $url_admin.'permintaan/v_request_stock.php';
          break;
        case 'report_order':
          include $url_admin.'order/v_report_order.php';
          break;
        case 'report_produksi':
          include $url_admin.'produksi/v_report_produksi.php';
          break;
        case 'report_pengiriman':
          include $url_admin.'pengiriman/v_report_pengiriman.php';
          break;
        case 'report_purchase_order':
          include $url_admin.'purchase_order/v_report_purchase_order.php';
          break;
        case 'report_request_stok':
          include $url_admin.'permintaan/v_report_request_stok.php';
          break;
        case 'report_receive_order':
          include $url_admin.'receive_order/v_report_receive_order.php';
          break;
        case 'purchase_order':
          include $url_admin.'purchase_order/v_purchase_order.php';
          break;
        case 'purchase_order_gm':
          include $url_admin.'purchase_order_gm/v_purchase_order_gm.php';
          break;
        case 'receive_order':
          include $url_admin.'receive_order/v_receive_order.php';
          break;
        case 'form_tambah_supplier':
          include $url_admin.'supplier/form_tambah_supplier.php';
          break;
        case 'form_tambah_satuan':
          include $url_admin.'satuan/form_tambah_satuan.php';
          break;
        case 'form_tambah_bahan':
          include $url_admin.'bahan/form_tambah_bahan.php';
          break;
        case 'form_tambah_jenis':
          include $url_admin.'jenis_produk/form_tambah_jenis.php';
          break;
        case 'form_tambah_produk':
          include $url_admin.'produk/form_tambah_produk.php';
          break;
        case 'form_tambah_user':
          include $url_admin.'user/form_tambah_user.php';
          break;
        case 'form_edit_supplier':
          include $url_admin.'supplier/form_edit_supplier.php';
          break;
        case 'form_edit_satuan':
          include $url_admin.'satuan/form_edit_satuan.php';
          break;
        case 'form_edit_bahan':
          include $url_admin.'bahan/form_edit_bahan.php';
          break;
         case 'form_edit_jenis':
          include $url_admin.'jenis_produk/form_edit_jenis.php';
          break;
        case 'form_edit_produk':
          include $url_admin.'produk/form_edit_produk.php';
          break;
        case 'form_edit_user':
          include $url_admin.'user/form_edit_user.php';
          break;
        case 'detail_order':
          include $url_admin.'order/detail_order.php';
          break;
        case 'detail_produksi':
          include $url_admin.'produksi/detail_produksi.php';
          break;
        case 'detail_request_stock':
          include $url_admin.'permintaan/detail_request_stock.php';
          break;
        case 'detail_purchase_order':
          include $url_admin.'purchase_order/detail_purchase_order.php';
          break;
        case 'detail_po_gm':
          include $url_admin.'purchase_order_gm/detail_po_gm.php';
          break;
        case 'detail_receive_order':
          include $url_admin.'receive_order/detail_receive_order.php';
          break;
        case 'detail_pengiriman':
          include $url_admin.'pengiriman/detail_pengiriman.php';
          break;
        case 'monitoring_stock':
          include $url_admin.'stok/v_monitoring_stock.php';
          break;
        default:
          include $url_admin.'error_page.php';
          break;
      }
  }else{
    include $url_admin.'dashboard/dashboard.php';
  }
?>
</div>

<?php include '../template/footer.php';?>