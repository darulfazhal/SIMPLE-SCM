<?php
session_start();
include('config/koneksi.php');
 
if(isset($_POST['login']))
{
	$username = mysql_real_escape_string(htmlentities($_POST['username']));
	$password = mysql_real_escape_string(htmlentities($_POST['password']));
  
	$sql = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' and status_aktif='1'") or die(mysql_error());

		if(mysql_num_rows($sql) == 0)
		{
			$_SESSION['status_login'] = false;
			$_SESSION['message'] = "Gagal Login";
			header('Location: login.php'); 
		}
		else
		{
			$data_user = mysql_fetch_array($sql);  
		 
			$_SESSION['status_login'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['user_id'] = $data_user['id'];
			$_SESSION['message'] = "Berhasil Login";
			header('Location: index.php'); 
		}

}else{
	header('Location: index.php');
}

?>