<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'supplier'; //page url
if(isset($_GET['act']) && $_GET['act'] === "supplier"){  
 
  $master_name = "Supplier"; //untuk message 
  $nama_tabel = 'supplier';  // nama tabel
  $id_kolom = 'id_supplier';
  $nilai_kolom = $_GET['id'];

  $proses_insert = delete($nama_tabel,$id_kolom, $nilai_kolom);

  if($proses_insert){ 
    $status = TRUE; 
    $message = "Berhasil Menghapus ".$master_name;
  }else{  
    $message = "Gagal Menghapus ".$master_name;
  }

  $_SESSION['insert_message'] = $message;
  $_SESSION['insert_status'] = $status;
   
  $redirect_url = "../index.php?page=".$url;
  header('Location: '.$redirect_url);

}else{
  $message = "Silahkan Menggunakan form untuk input data";
  header('Location: '.$redirect_url);
}


?>