<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'user'; //page url
if(isset($_GET['act']) && $_GET['act'] === "user"){  
 
  $master_name = "User"; //untuk message 
  $nama_tabel = 'users';  // nama tabel
  $id_kolom = 'id';
  $nilai_kolom = $_GET['id'];

  $proses = delete($nama_tabel,$id_kolom, $nilai_kolom);

  if($proses){ 
    $nama_tabel = 'user_grup';  // nama tabel
    $id_kolom = 'id_user';
    $proses_delete_user_grup = delete($nama_tabel,$id_kolom, $nilai_kolom);
    if($proses_delete_user_grup){
      $status = TRUE; 
      $message = "Berhasil Menghapus ".$master_name;
    }else{
      $message = "Gagal Menghapus ".$master_name;
    }
    
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