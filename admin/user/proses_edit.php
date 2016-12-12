<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'user'; //page url

if(isset($_POST['act']) && $_POST['act'] === "user"){ 
 echo $id = $_POST['id']; 
  $where = "id";
  $nama_tabel = 'users';  // nama tabel
  $master_name = "user"; //untuk message
  $kolom = array(
    "username" => $_POST['username'], 
    "nama" => $_POST['nama'], 
     "status_aktif" => $_POST['status_aktif']
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