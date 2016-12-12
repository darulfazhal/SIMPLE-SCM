 <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Ubah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form class="form-horizontal"  id="form_validation_edit"  action="user/proses_edit.php" method="POST">
             <?php
              $sql = mysql_query("select * from users join user_grup ON (users.id = user_grup.id_user) 
                  where users.id='".$_GET['id']."'") or die(mysql_error()); 
              if(mysql_num_rows($sql) >= 0)
              { 
                $data = mysql_fetch_array($sql);   
              }

              $id = (!empty($data))?$data['id']:""; 
              $nama = (!empty($data))?$data['nama']:""; 
              $username = (!empty($data))?$data['username']:"";
              $id_grup = (!empty($data))?$data['id_grup']:"";

            ?> 
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="act" value="user">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama user</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  id="nama" name="nama"  
                      value="<?php echo $nama;?>"  placeholder="Nama">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Grup</label>

                  <div class="col-sm-10">
                   <select class="form-control" name="grup_id" disabled=""> 
                    <?php
                    $sql = mysql_query("select * from grup ")  or die(mysql_error()); 
                  
                   while ($grups = mysql_fetch_array($sql, MYSQL_ASSOC)) { 
                      ?>
                    <option <?php if($grups['id_grup']==$id_grup) echo "selected";?> value="<?php echo $grups['id_grup'];?>"><?php echo $grups['nama_grup'];?></option>
                     
                    <?php }?>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username"  
                      value="<?php echo $username;?>"  placeholder="Username">
                  </div>
                </div> 

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password"  
                        placeholder="Password">
                  </div>
                </div> 

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Ulangi Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control"  name="confirmPassword"  placeholder="Ulangi Password">
                  </div>
                </div> 
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status Aktif</label>

                  <div class="col-sm-10">
                   <select class="form-control" name="status_aktif"> 
                    <option value=1>Aktif</option>
                    <option value=0>Tidak Aktif</option>  
                  </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="index.php?page=user" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
           
        </div>
      </div>
 </section>
 
   <script src="<?php echo $url?>plugins/jQuery/jquery.1.12.4.js"></script>
 <script src="user/user.js"></script>