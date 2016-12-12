<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'produk'; //page url
if(isset($_GET['act']) && $_GET['act'] === "produk"){  
 
  $master_name = "Produk"; //untuk message 
  $nama_tabel = 'produk';  // nama tabel
  $id_kolom = 'id_produk';
  $nilai_kolom = $_GET['id'];


  //delete fisik gambar 
  $sql = mysql_query("select url_gambar from produk where id_produk='".$nilai_kolom."'") or die(mysql_error()); 
  $data = mysql_fetch_row($sql);  
  unlink('../../assets/produk/'. $data[0]);  
  $delete_produk = delete($nama_tabel,$id_kolom, $nilai_kolom);
  $delete_produk_bahan = delete("produk_bahan",$id_kolom, $nilai_kolom);

  if($delete_produk){ 
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
  $redirect_url = "../index.php?page=".$url;
  $message = "Silahkan Menggunakan form untuk input data";
  header('Location: '.$redirect_url);
}


?>