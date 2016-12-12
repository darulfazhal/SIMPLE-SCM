<?php
 session_start();
include('config/koneksi.php');

if(isset($_POST['daftar']))
{
	$name = mysql_real_escape_string(htmlentities($_POST['name']));
	$username = mysql_real_escape_string(htmlentities($_POST['username']));
	$email = mysql_real_escape_string(htmlentities($_POST['email']));
	$password = mysql_real_escape_string(htmlentities($_POST['password']));
	$retype_password = mysql_real_escape_string(htmlentities($_POST['retype_password']));
 	


	$sql = mysql_query("insert into users (username,password,nama,email) 
	value('".$username."','".$password."','".$name."','".$email."')") or die(mysql_error());
	 
	if($sql)
	{ 
		$group_id = 3;
		$user_id = mysql_insert_id();
		$insert_users_groups = mysql_query("insert into user_grup (id_user,id_grup) 
		value('".$user_id."','".$group_id."')") or die(mysql_error());
		if($insert_users_groups){
			$_SESSION['status_daftar'] = true;
			$_SESSION['message'] = "Berhasil Daftar";

			header('Location: daftar.php'); 
		} 
	}
	else
	{
		$_SESSION['status_daftar'] = false;
		$_SESSION['message'] = "Gagal Daftar";

		header('Location: daftar.php'); 
	}

}else{
	header('Location: index.php');
}

?>