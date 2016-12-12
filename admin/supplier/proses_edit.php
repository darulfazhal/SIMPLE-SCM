<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'supplier'; //page url

if(isset($_POST['act']) && $_POST['act'] === "supplier"){ 
  $id = $_POST['id']; 
  $where = "id_supplier";
  $nama_tabel = 'supplier';  // nama tabel
  $master_name = "Supplier"; //untuk message
  $kolom = array(
    "nama_supplier" => $_POST['nama'],
    "alamat_supplier" => $_POST['alamat'],
    "kota" => $_POST['kota'],
    "no_kontak" => $_POST['no_kontak']
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