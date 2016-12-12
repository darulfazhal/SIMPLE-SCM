  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 .</strong> All rights
    reserved.
  </footer>
  <input type="hidden" id="group_id" value="<?php echo $_SESSION['group'];?>">
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo $url?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $url?>plugins/jQuery/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $url?>bootstrap/js/bootstrap.min.js"></script>
 
<!-- daterangepicker -->
<script src="<?php echo $url?>plugins/moment/moment.min.js"></script>
<script src="<?php echo $url?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo $url?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $url?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo $url?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $url?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url?>dist/js/app.js"></script> 
<script src="<?php echo $url?>plugins/highcharts/highcharts.js"></script>

<!-- DataTables -->
<script src="<?php echo $url?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $url?>admin/notifikasi/notifikasi.js"></script>
<script src="<?php echo $url?>plugins/formValidations/formvalidations.js"></script>
 <script>
   //Date picker
    $('#datepicker1').datepicker({
      autoclose: true,
      format: "mm/yyyy",
      viewMode: "months", 
      minViewMode: "months"
    });
     //Date picker
    $('#datepicker2').datepicker({
      autoclose: true,
      format: "mm/yyyy",
      viewMode: "months", 
      minViewMode: "months"
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": {
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Cari:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext":     "Selanjutnya",
          "sLast":     "Terakhir"
        }
      }

    });
  
 

    var myChart = Highcharts.chart('chart-peramalan', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Peramalan Mei - Roll Karet 1'
        },
        xAxis: {
            categories: ['Januari', 'Februari', 'Maret','April']
        },
        yAxis: {
            title: {
                text: 'Jumlah Order'
            }
        },
        series: [{
            name: 'Aktual',
            data: [100, 20, 90,80]
        }]
    });
 
   </script>
</body>
</html>
