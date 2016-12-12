<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'user'; //page url
if(isset($_POST['act']) && $_POST['act'] === "user"){  
  $nama_tabel = 'users';  // nama tabel
  $master_name = "User"; //untuk message
  $kolom = array(
    "username" => $_POST['username'],
    "password" => $_POST['password'],
    "nama" => $_POST['nama'],
    "status_aktif" => $_POST['status_aktif']
  ); //array of object  
 
  $proses_insert = insert($nama_tabel,$kolom);

  if($proses_insert){ 
    $nama_tabel = 'user_grup';  // nama tabel 

    $kolom = array(
      "id_user" => $proses_insert,
      "id_grup" => $_POST['grup_id']
    ); //array of object 
    $proses_insert_grup = insert($nama_tabel,$kolom);
    if($proses_insert_grup){
      $status = TRUE; 
      $message = "Berhasil Menambahkan ".$master_name;  
    }else{

      $message = "Gagal Menambahkan ".$master_name;
    }
    
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