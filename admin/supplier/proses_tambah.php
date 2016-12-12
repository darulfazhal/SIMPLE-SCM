<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'supplier'; //page url
if(isset($_POST['act']) && $_POST['act'] === "supplier"){  
  $nama_tabel = 'supplier';  // nama tabel
  $master_name = "Supplier"; //untuk message
  $kolom = array(
    "nama_supplier" => $_POST['nama'],
    "alamat_supplier" => $_POST['alamat'],
    "kota" => $_POST['kota'],
    "no_kontak" => $_POST['no_kontak']
  ); //array of object  

  $proses_insert = insert($nama_tabel,$kolom);

  if($proses_insert){ 
    $status = TRUE; 
    $message = "Berhasil Menambahkan ".$master_name;
  }else{  
    $message = "Gagal Menambahkan ".$master_name;
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