
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
         <div class="box-header">
              <h1 class="box-title">Proses Peramalan</h1>
            </div>  
        </div>
        </div>
      </div>
       <div class="row">
         <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
                <form class="form-horizontal" action="index.php?page=peramalan" method="POST">
                <div class="box-body">
                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Produk</label>

                    <div class="col-sm-4">
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Pilih Produk</option>
                        <option>Roll Karet 1</option>
                        <option>Roll Karet 2</option>
                        <option>Roll Karet 3</option>
                        <option>Roll Karet 4</option>
                        <option>Roll Karet 5</option>
                        <option>Roll Karet 6</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Periode Awal</label>

                    <div class="col-sm-4">
                      <div class="input-group date">
                       
                        <input type="text" class="form-control pull-right" id="datepicker1" placeholder="02/2016">
                         <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Periode Akhir</label>

                    <div class="col-sm-4">
                       <div class="input-group date">
                        
                        <input type="text" class="form-control pull-right" id="datepicker2" placeholder="12/2016">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>
               
                <div class="col-sm-6"> 
                  <div class="col-sm-4 pull-right">
                  <button type="submit" class="btn btn-info pull-right">Proses</button>
                  </div>
                </div> 
              </form>
         <!-- filter -->
            </div>
          </div>
        </div>
      </div>

      <div class="row">
         <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table class="table">  
                <?php
                  $point = array(0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9);
                  $bulan = array(15,9,21,19,8,12);
                  $nama_bulan = array('Mei','Juni','Juli','Agustus','Sept','Oktober');
                ?> 
                <thead> 
                <tr>  
                  <td rowspan="2" style="vertical-align: middle;border-bottom: 2px solid black;">Bulan</td>
                  <td rowspan="2" style="vertical-align: middle;border-bottom: 2px solid black;">Permintaan</td> 
                  <td colspan="8" align="center" style="vertical-align: middle;">
                    ALPHA
                  </td> 
                </tr>
                <tr>  
                  <?php  for ($j=0; $j < count($point) ; $j++) { ?>
                  <td style="border-bottom: 2px solid black;">
                    <?php echo $point[$j];?>
                  </td>
                  <?php  } ?>
                </tr>
                </thead>
                <?php
                  $hasil = array();
                  for ($i=0; $i < count($bulan) ; $i++) {  
                    $hasil[$i] = array();
                  ?> 
                  <tr> 
                    <td><?php echo $nama_bulan[$i]; ?></td>
                    <td>
                      <?php echo $bulan[$i]; ?>
                    </td> 
                    <?php  for ($j=0; $j < count($point) ; $j++) { ?>
                    <td>
                      <?php 
                        if($i == 0){
                          echo "";
                        }elseif($i == 1){
                          echo $bulan[0];
                          $hasil[$i][$j] = $bulan[0];  
                        }else{
                           // echo "(".$point[$j]."*".$bulan[$i-1].") + (".(1-$point[$j])."*". $hasil[$i-1][$j].")=";
                           echo $hasil[$i][$j] = ($point[$j]*$bulan[$i-1]) + (1-$point[$j]) * $hasil[$i-1][$j];  
                        }
                        ?>
                    </td>
                    <?php  } ?>
                  </tr>
                <?php } ?>
                <tr>
                  <td>
                    Hasil Peramalan
                  </td>
                  <?php  
                  $hasil_peramalan[0] = 0;
                  for ($j=0; $j < count($point) ; $j++) { ?>
                  <td>
                     <?php 
                      if($i == 0){
                        echo "";
                      }elseif($i == 1){
                        echo $bulan[0];
                        $hasil[$i][$j] = $bulan[0];  

                        $hasil_peramalan[$j] = $hasil[$i][$j];
                      }else{
                         // echo "(".$point[$j]."*".$bulan[$i-1].") + (".(1-$point[$j])."*". $hasil[$i-1][$j].")=";
                         echo $hasil[$i][$j] = ($point[$j]*$bulan[$i-1]) + (1-$point[$j]) * $hasil[$i-1][$j]; 
                         $hasil_peramalan[$j] = $hasil[$i][$j]; 
                      }
                      ?>
                  </td>
                  <?php }?>
                </tr>
              </table>
               <br><br>

              <h3>Perhitungan MAE</h3>
              <table class="table">  
                <?php
                  $point = array(0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9);
                  $bulan = array(15,9,21,19,8,12);
                ?>
                <thead> 
                <tr>  
                  <td rowspan="2" style="vertical-align: middle;border-bottom: 2px solid black;">Bulan</td>
                  <td rowspan="2" style="vertical-align: middle;border-bottom: 2px solid black;">Permintaan</td> 
                  <td colspan="8" align="center" style="vertical-align: middle;">
                    ALPHA
                  </td> 
                </tr>
                <tr>  
                  <?php  for ($j=0; $j < count($point) ; $j++) { ?>
                  <td style="border-bottom: 2px solid black;">
                    <?php echo $point[$j];?>
                  </td>
                  <?php  } ?>
                </tr>
                </thead>
                <?php
                  $hasil = array();
                  for ($i=0; $i < count($bulan) ; $i++) {  
                    $hasil[$i] = array();
                  ?> 
                  <tr> 
                    <td><?php echo $nama_bulan[$i]; ?></td>
                    <td>
                      <?php echo $bulan[$i]; ?>
                    </td> 
                    <?php  for ($j=0; $j < count($point) ; $j++) { ?>
                    <td>
                      <?php 
                        if($i == 0){
                          echo "";
                        }elseif($i == 1){
                            
                          $hasil[$i][$j] = $bulan[0]; 
                          echo $bulan[$i] - $hasil[$i][$j];  
                        }else{
                           // echo "(".$point[$j]."*".$bulan[$i-1].") + (".(1-$point[$j])."*". $hasil[$i-1][$j].") = ";
                          $hasil[$i][$j] = ($point[$j]*$bulan[$i-1]) + (1-$point[$j]) * $hasil[$i-1][$j];  
                          // echo $bulan[$i]." - ".$hasil[$i][$j];

                          echo $bulan[$i] - $hasil[$i][$j];
                        }


                        ?>
                    </td>
                    <?php  } ?>
                  </tr>
                <?php } ?> 
              </table> 
              <br><br> 
               <h3>Perhitungan MAD</h3>
              <table class="table">  
                <?php
                  $point = array(0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9);
                  $bulan = array(15,9,21,19,8,12);
                ?>
                <thead> 
                <tr>  
                  <td rowspan="2" style="vertical-align: middle;border-bottom: 2px solid black;">Bulan</td>
                  <td rowspan="2" style="vertical-align: middle;border-bottom: 2px solid black;">Permintaan</td> 
                  <td colspan="8" align="center" style="vertical-align: middle;">
                    ALPHA
                  </td> 
                </tr>
                <tr>  
                  <?php  for ($j=0; $j < count($point) ; $j++) { ?>
                  <td style="border-bottom: 2px solid black;">
                    <?php echo $point[$j];?>
                  </td>
                  <?php  } ?>
                </tr>
                </thead>
                <?php
                  $hasil = array();
                  for ($i=0; $i < count($bulan) ; $i++) {  
                    $hasil[$i] = array();
                  ?> 
                  <tr> 
                    <td><?php echo $nama_bulan[$i]; ?></td>
                    <td>
                      <?php echo $bulan[$i]; ?>
                    </td> 
                    <?php  for ($j=0; $j < count($point) ; $j++) { ?>
                    <td>
                      <?php 
                        if($i == 0){
                          echo "";
                        }elseif($i == 1){
                            
                          $hasil[$i][$j] = $bulan[0]; 
                          echo abs($bulan[$i] - $hasil[$i][$j]);  
                        }else{
                           // echo "(".$point[$j]."*".$bulan[$i-1].") + (".(1-$point[$j])."*". $hasil[$i-1][$j].") = ";
                          $hasil[$i][$j] = ($point[$j]*$bulan[$i-1]) + (1-$point[$j]) * $hasil[$i-1][$j];  
                          // echo $bulan[$i]." - ".$hasil[$i][$j];

                          echo abs($bulan[$i] - $hasil[$i][$j]);
                        }


                        ?>
                    </td>
                    <?php  } ?>
                  </tr>
                <?php } ?> 
              </table>


              <br><br> 
               <h3>Perhitungan MSE</h3>
              <table class="table">  
                <?php
                  $point = array(0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9);
                  $bulan = array(15,9,21,19,8,12);
                ?>
                <thead> 
                  <tr>  
                    <td rowspan="2" style="vertical-align: middle;border-bottom: 2px solid black;">Bulan</td>
                    <td rowspan="2" style="vertical-align: middle;border-bottom: 2px solid black;">Permintaan</td> 
                    <td colspan="8" align="center" style="vertical-align: middle;">
                      ALPHA
                    </td> 
                  </tr>
                  <tr>  
                    <?php  for ($j=0; $j < count($point) ; $j++) { ?>
                    <td style="border-bottom: 2px solid black;">
                      <?php echo $point[$j];?>
                    </td>
                    <?php  } ?>
                  </tr>
                  </thead>
                <?php
                  $hasil = array();
                  $total_mse = array();
                  for ($i=0; $i < count($bulan) ; $i++) {  
                    $hasil[$i] = array();
                  ?> 
                  <tr> 
                    <td><?php echo $nama_bulan[$i]; ?></td>
                    <td>
                      <?php echo $bulan[$i]; ?>
                    </td> 
                    <?php  for ($j=0; $j < count($point) ; $j++) { ?>
                    <td>
                      <?php 

                        if($i == 0){
                          echo "";
                          $total_mse[$j] = 0;
                        }elseif($i == 1){ 
                          $hasil[$i][$j] = $bulan[0]; 
                          echo pow (abs($bulan[$i] - $hasil[$i][$j]),2); 
                          $total_mse[$j] += pow (abs($bulan[$i] - $hasil[$i][$j]),2);
                        }else{
                           // echo "(".$point[$j]."*".$bulan[$i-1].") + (".(1-$point[$j])."*". $hasil[$i-1][$j].") = ";
                          $hasil[$i][$j] = ($point[$j]*$bulan[$i-1]) + (1-$point[$j]) * $hasil[$i-1][$j];  
                          
                          echo round(pow(abs($bulan[$i] - $hasil[$i][$j]),2),4);
                          $total_mse[$j] += pow (abs($bulan[$i] - $hasil[$i][$j]),2);
                        }   
                        ?>
                    </td>
                    <?php  } ?>
                  </tr>
                <?php } ?> 
                <tr>
                  <td colspan="2" align="center">
                    MSE
                  </td>
                  <?php  
                  $total_mse_terkecil = array();
                  $total_mse_terkecil['total'] = $total_mse[0]/count($hasil);
                  $total_mse_terkecil['index'] = 0;
                  for ($j=0; $j < count($point) ; $j++) { ?>
                  <td>
                     <?php  
                       if($total_mse_terkecil['total'] > $total_mse[$j]/count($hasil)){
                          $total_mse_terkecil['total'] = $total_mse[$j]/count($hasil);
                          $total_mse_terkecil['index'] = $j;
                       }  
                      echo round($total_mse[$j]/count($hasil),4);
                      ?>
                  </td>
                  <?php }?>
                </tr>
              </table>

              <br><br>
              <h3>REKOMENDASI</h3>
              Karena Nilai MSE Terkecil adalah <?php  echo round($total_mse_terkecil['total'],4); ?>, dari @ = 
              <?php echo $point[$total_mse_terkecil['index']];?> Maka Untuk Periode Selanjutnya disarankan untuk melakukan pengadaan sebanyak <h4><?php echo $hasil_peramalan[$total_mse_terkecil['index']];?>  / 
               <?php echo floor($hasil_peramalan[$total_mse_terkecil['index']]);?> UNIT</h4> 

              <br><br> 
            
            </div>  
          </div>
         </div>
      </div>
      <!-- <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <div class="box-body"> 
              <div id="chart-peramalan" style="width:90%; height:300px;"></div>
              <div class="clear-fix"></div><br><br>
              <table class="table"  >
                  <th>
                    <td>
                      Results (Mei)
                    </td>
                     <td>
                      <b>29</b>
                    </td>
                  </th>
              </table>
            </div>
            
          </div> 
        </div>
      
      </div> -->
      <!-- /.row -->
    </section>
    <!-- /.content -->

  