<?php 
include("../model.php");
session_start(); 

$status = FALSE;
$message = ""; 
$kolom = "";
$url = 'produk'; //page url
if(isset($_POST['act']) && $_POST['act'] === "produk"){  
  $nama_tabel = 'produk';  // nama tabel
  $master_name = "Produk"; //untuk message
  $kolom = array(
    "nama_produk" => $_POST['nama_produk'],
    "harga_produk" => $_POST['harga_produk'],
    "id_jenis_produk" => $_POST['id_jenis_produk']
  );  
    
  //PROSES UPLOAD GAMBAR
  $target_dir = "../../assets/produk/"; 
  
  $target_file = $target_dir . basename($_FILES["gambar_produk"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $namafile = time().".".$imageFileType; 
  $change_target_file = $target_dir . $namafile;

  $check = getimagesize($_FILES["gambar_produk"]["tmp_name"]);
  if($check !== false && move_uploaded_file($_FILES["gambar_produk"]["tmp_name"], $change_target_file)) {   
    $kolom['url_gambar'] = $namafile; 
  }   
   //INSERT KE DB
  $insert_produk = insert($nama_tabel,$kolom);  
 
  if($insert_produk){
    // INSERT PRODUK BAHAN
    for ($i=0; $i <= count($_POST['satuan']) ; $i++) { 
      if( !empty($_POST['bahan'][$i]) && 
          !empty($_POST['qty'][$i]) && 
          !empty($_POST['satuan'][$i])
        )
      { 
        $nama_tabel = 'produk_bahan';  // nama tabel 
        $kolom = array(
          "id_produk" => $insert_produk,
          "id_bahan" => $_POST['bahan'][$i],
          "id_satuan" => $_POST['satuan'][$i],
          "jumlah" => $_POST['qty'][$i]
        ); //ar
        $proses_insert_bahan = insert($nama_tabel,$kolom);
      } 
    } 
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