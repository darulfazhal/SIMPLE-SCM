<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'satuan'; //page url

if(isset($_POST['act']) && $_POST['act'] === "satuan"){ 
 echo $id = $_POST['id']; 
  $where = "id_satuan";
  $nama_tabel = 'satuan';  // nama tabel
  $master_name = "Satuan"; //untuk message
  $kolom = array(
    "nama_satuan" => $_POST['nama'],
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