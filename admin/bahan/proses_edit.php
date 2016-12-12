<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'bahan'; //page url

if(isset($_POST['act']) && $_POST['act'] === "bahan"){ 
 echo $id = $_POST['id']; 
  $where = "id_bahan";
  $nama_tabel = 'bahan';  // nama tabel
  $master_name = "Bahan"; //untuk message
  $kolom = array(
    "nama_bahan" => $_POST['nama_bahan'],
    "harga_satuan_bahan" => $_POST['harga_satuan_bahan']
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