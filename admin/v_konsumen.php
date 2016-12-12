
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
         <div class="box-header">
              <h1 class="box-title">Data Konsumen</h1>
            </div>  
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <div class="box-body">
            <a href="index.php?page=form_tambah_user" class="btn btn-primary">Tambah Konsumen</a>
               <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Konsumen</th>
                  <th>Grup</th>
                  <th>Email</th>
                  <th>No Kontak</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = mysql_query("select * from users join user_grup ON(users.id = user_grup.id_user) 
                                      join grup on(user_grup.id_grup = grup.id_grup) where grup.id_grup = 3
                                    ") 
                        or die(mysql_error());
                 
                  $no = 1;
                 while ($users = mysql_fetch_array($sql, MYSQL_ASSOC)) {

                    ?>
                 <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $users['nama'];?></td>
                      <td><?php echo $users['nama_grup'];?></td>
                      <td><?php echo $users['email'];?></td>
                      <td><?php echo $users['no_telp'];?></td>
                      <td>
                       <?php echo ($users['status_aktif']==1)?"Aktif":"Tidak Aktif";?>
                      </td>
                      <td>
                        <a href="index.php?page=form_edit_user&id=<?php echo $users['id']?>"
                        class="btn btn-primary"
                          >
                          Ubah
                        </a>
                         <a href="index.php?page=proses_delete&url=user&id=<?php echo $users['id']?>"
                        class="btn btn-danger"
                          >
                          Hapus
                        </a>
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

   