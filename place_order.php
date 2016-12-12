<?php
// start session
session_start();
 include('config/koneksi.php');
if(isset($_SESSION['status_login'])){
	$action = isset($_GET['action']) ? $_GET['action'] : "";
	// set page title
	$page_title="Thank You!";
	

	$sql = mysql_query("insert into `order` 
						(id_user,tanggal_order,status_order) 
						values('".$_SESSION['user_id']."','".date('Y-m-d H:i:s')."','1')") 
					or die(mysql_error());
	
	if($sql){
		$id_order = mysql_insert_id(); 
		foreach($_SESSION['cart'] as $id=>$value){
		 	$id_produk = $id;
			$qty = $_SESSION['cart'][$id]['quantity']; 
			$get_data = mysql_query("select harga_produk from produk where id_produk = '".$id_produk."'") or die(mysql_error());
			$harga_produk = mysql_fetch_row($get_data)[0];  

	        $sql = mysql_query("insert into order_detail (id_order,id_produk,jumlah,harga) 
								value('".$id_order."','".$id."','".$qty."','".$harga_produk."')") 
	        		or die(mysql_error());
	    }	
	}
	

 

	unset($_SESSION['cart']);
	

	include 'template/user_template_header.php';
	echo "<div class='col-md-12'>";
	 	echo "<div class='alert alert-success'>";
	        echo "<strong>Your order has been placed!</strong> Thank you very much!";
	    echo "</div>"; 
	echo "</div>"; 
	 include 'template/user_template_footer.php';	
}else{
	$_SESSION['message'] ="kamu harus login terlebih dahulu";
	$_SESSION['status_login'] = false;
	header('Location: login.php'); 
}

?>