 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu </li>
        <li <?php if(isset($_GET['page']) && $_GET['page'] =='dashboard') echo "class=active"; ?>>
          <a href="index.php?page=dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if(!$_AS_GM || $_AS_ADMIN){?>
        
          <?php $menu_master = array('supplier','satuan','bahan','produk','user','konsumen','jenis_produk');?>
          <li class=" treeview 
            <?php if(isset($_GET['page']) && in_array($_GET['page'], $menu_master)) echo "  active"; ?>">
            <a href="#">
              <i class="fa fa-database"></i> <span>Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          <ul class="treeview-menu">
            <?php if($_AS_PURCHASING){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='supplier') echo "class=active"; ?>>
                <a href="index.php?page=supplier"><i class="fa fa-circle-o"></i>Supplier</a>
            </li>
            <?php }?>

            <?php if($_AS_GUDANG){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='satuan') echo "class=active"; ?>>
              <a href="index.php?page=satuan"><i class="fa fa-circle-o"></i>Satuan</a>
            </li>
             <?php }?>

            <?php if($_AS_GUDANG || $_AS_PURCHASING){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='bahan') echo "class=active"; ?>>
              <a href="index.php?page=bahan"><i class="fa fa-circle-o"></i>Bahan</a>
            </li>
            <?php }?>

            <?php if($_AS_PRODUKSI){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='jenis_produk') echo "class=active"; ?>>
              <a href="index.php?page=jenis_produk"><i class="fa fa-circle-o"></i>Jenis Produk</a>
            </li>
            <?php }?>

            <?php if($_AS_PRODUKSI){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='produk') echo "class=active"; ?>>
              <a href="index.php?page=produk"><i class="fa fa-circle-o"></i>Produk</a>
            </li>
            <?php }?>

            <?php if($_AS_MARKETING){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='user') echo "class=active"; ?>>
              <a href="index.php?page=user"><i class="fa fa-circle-o"></i>User</a>
            </li>
            <?php }?>
            <?php if($_AS_MARKETING){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='konsumen') echo "class=active"; ?>>
              <a href="index.php?page=konsumen"><i class="fa fa-circle-o"></i>Konsumen</a>
            </li>
            <?php }?>
          </ul>
          </li>
        <?php }?>
        <?php $menu_transaksi = array('order','produksi','pengiriman','request_stock','purchase_order','receive_order','purchase_order_gm');?>
        <li class="treeview
          <?php if(isset($_GET['page']) && in_array($_GET['page'], $menu_transaksi)) echo "  active"; ?>">
          <a href="#">
            <i class="fa fa-share"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($_AS_MARKETING){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='order') echo "class=active"; ?>>
              <a href="index.php?page=order"><i class="fa fa-circle-o"></i>Pemesanan</a>
            </li>
            <?php }?>
            
            <?php if($_AS_PRODUKSI){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='produksi') echo "class=active"; ?>>
              <a href="index.php?page=produksi"><i class="fa fa-circle-o"></i>Produksi</a>
            </li>
            <?php }?>


            <?php if($_AS_KURIR){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='pengiriman') echo "class=active"; ?>>
              <a href="index.php?page=pengiriman"><i class="fa fa-circle-o"></i>Pengiriman</a>
            </li>
            <?php }?>

            <?php if($_AS_GUDANG){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='request_stock') echo "class=active"; ?>>
              <a href="index.php?page=request_stock"><i class="fa fa-circle-o"></i>Permintaan Stok</a>
            </li>
            <?php }?>

            <?php if($_AS_PURCHASING){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='purchase_order') echo "class=active"; ?>>
              <a href="index.php?page=purchase_order"><i class="fa fa-circle-o"></i>Pembelian Bahan</a>
            </li>
             <?php }?>

             <?php if($_AS_GM){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='purchase_order_gm') echo "class=active"; ?>>
              <a href="index.php?page=purchase_order_gm"><i class="fa fa-circle-o"></i>Pembelian Bahan (GM)</a>
            </li>
            <?php }?>

             <?php if($_AS_PURCHASING){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='receive_order') echo "class=active"; ?>>
              <a href="index.php?page=receive_order"><i class="fa fa-circle-o"></i>Penerimaan Bahan </a>
            </li>
            <?php }?>
          </ul>
        </li>

        <?php $menu_report = array(  'report_order','report_produksi','report_request_stok','report_pengiriman','report_purchase_order','report_receive_order'); ?>
        <li class="treeview
          <?php if(isset($_GET['page']) && in_array($_GET['page'], $menu_report)) echo "  active"; ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <?php if($_AS_MARKETING){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='report_order') echo "class=active"; ?>>
              <a href="index.php?page=report_order"><i class="fa fa-circle-o"></i>Laporan Pemesanan</a>
            </li>
            <?php }?>

            <?php if($_AS_PRODUKSI){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='report_produksi') echo "class=active"; ?>>
              <a href="index.php?page=report_produksi"><i class="fa fa-circle-o"></i>Laporan Produksi</a>
            </li>
             <?php }?>

            <?php if($_AS_KURIR){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='report_pengiriman') echo "class=active"; ?>>
              <a href="index.php?page=report_pengiriman"><i class="fa fa-circle-o"></i>Laporan Pengiriman</a>
            </li>
            <?php }?>
             <?php if($_AS_GUDANG){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='report_request_stok') echo "class=active"; ?>>
              <a href="index.php?page=report_request_stok"><i class="fa fa-circle-o"></i>Laporan Permintaan Stok</a>
            </li>
             <?php }?>
             <?php if($_AS_PURCHASING){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='report_purchase_order') echo "class=active"; ?>>
              <a href="index.php?page=report_purchase_order"><i class="fa fa-circle-o"></i>Laporan Pembelian Bahan</a>
            </li>
             <?php }?>

            <?php if($_AS_PURCHASING || $_AS_GM){?>
            <li <?php if(isset($_GET['page']) && $_GET['page'] =='report_receive_order') echo "class=active"; ?>>
              <a href="index.php?page=report_receive_order"><i class="fa fa-circle-o"></i>Laporan Penerimaan Bahan</a>
            </li> 
             <?php }?>
          </ul>
        </li>
        <?php if($_AS_GUDANG){?>
         <li <?php if(isset($_GET['page']) && $_GET['page'] =='monitoring_stock') echo "class=active"; ?>>
          <a href="index.php?page=monitoring_stock">
            <i class="fa fa-area-chart"></i> <span>Monitoring Stok</span>
          </a>
        </li>
        <?php }?>
         <?php if($_AS_PURCHASING){?>
         <li <?php if(isset($_GET['page']) && $_GET['page'] =='peramalan') echo "class=active"; ?>>
          <a href="index.php?page=peramalan">
            <i class="fa fa-area-chart"></i> <span>Peramalan</span>
          </a>
        </li>
        <?php }?>

        <?php if($_AS_PURCHASING){?>
         <li <?php if(isset($_GET['page']) && $_GET['page'] =='analisa_supplier') echo "class=active"; ?>>
          <a href="index.php?page=analisa_supplier">
            <i class="fa fa-bar-chart"></i> <span>Analisa Supplier</span>
          </a>
        </li>
        <?php }?>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>