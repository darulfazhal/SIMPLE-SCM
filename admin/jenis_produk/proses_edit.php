<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'jenis_produk'; //page url

if(isset($_POST['act']) && $_POST['act'] === "jenis_produk"){ 
 echo $id = $_POST['id']; 
  $where = "id_jenis_produk";
  $nama_tabel = 'jenis_produk';  // nama tabel
  $master_name = "Jenis Produk"; //untuk message
  $kolom = array(
    "nama_jenis" => $_POST['nama'],
    "keterangan" => $_POST['keterangan']
  ); //array of object  
  
  $proses_insert = update($nama_tabel,$kolom,$id,$where);

  if($proses_insert){ 
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