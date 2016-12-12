<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'produk'; //page url

if(isset($_POST['act']) && $_POST['act'] === "produk"){ 
  $id = $_POST['id']; 
  $where = "id_produk";
  $nama_tabel = 'produk';  // nama tabel
  $master_name = "Produk"; //untuk message
  $kolom = array(
    "nama_produk" => $_POST['nama_produk'],
    "harga_produk" => $_POST['harga_produk'],
    "id_jenis_produk" => $_POST['id_jenis_produk']
  ); //array of object  
    //PROSES UPLOAD GAMBAR
  $target_dir = "../../assets/produk/"; 
  $status = FALSE;
  $target_file = $target_dir . basename($_FILES["gambar_produk"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $namafile = time().".".$imageFileType; 

  $change_target_file = $target_dir . $namafile;  
  $check = getimagesize($_FILES["gambar_produk"]["tmp_name"]);
  if($check !== false && move_uploaded_file($_FILES["gambar_produk"]["tmp_name"], $change_target_file)) {  
    //delete OLD fisik gambar 
    $sql = mysql_query("select url_gambar from produk where id_produk='".$id."'") or die(mysql_error()); 
    $data = mysql_fetch_row($sql);  
    unlink('../../assets/produk/'. $data[0]);  
     $kolom['url_gambar'] = $namafile; 
  }

  $proses_insert = update($nama_tabel,$kolom,$id,$where);

  if($proses_insert){ 
    $nama_tabel = 'produk_bahan'; 
    $delete_produk_bahan = delete($nama_tabel,"id_produk", $id);

     for ($i=0; $i <= count($_POST['satuan']) ; $i++) { 
      if( !empty($_POST['bahan'][$i]) && 
          !empty($_POST['qty'][$i]) && 
          !empty($_POST['satuan'][$i])
        )
      { 
       // nama tabel 
        $kolom = array(
          "id_produk" => $id,
          "id_bahan" => $_POST['bahan'][$i],
          "id_satuan" => $_POST['satuan'][$i],
          "jumlah" => $_POST['qty'][$i]
        ); //ar
        $proses_insert_bahan = insert($nama_tabel,$kolom);
      } 
    } 
    $status = TRUE; 
    $message = "Berhasil Mengubah ".$master_name;
  }else{  
    $message = "Gagal Mengubah ".$master_name;
  }

  $_SESSION['insert_message'] = $message;
  $_SESSION['insert_status'] = $status;
  
  header('Location: ../index.php?page='.$url);

}else{
  $message = "Silahkan Menggunakan form untuk input data";
  
  header('Location: ../index.php?page='.$url);
}


?>