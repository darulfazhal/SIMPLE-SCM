<?php
session_start();
include('../config/koneksi.php');

if(isset($_POST['login']))
{
	$username = mysql_real_escape_string(htmlentities($_POST['username']));
	$password = mysql_real_escape_string(htmlentities($_POST['password']));
 	
	$sql = mysql_query("SELECT users.*, grup.id_grup as grup_id FROM users
						join user_grup ON(users.id = user_grup.id_user)
						join grup ON(grup.id_grup = user_grup.id_grup)
					 	WHERE username='$username' AND password='$password' 
					 	AND status_aktif = '1'") or die(mysql_error());
		 	
		if(mysql_num_rows($sql) == 0)
		{ 
			header('Location: index.php');
		}
		else
		{
			$data=mysql_fetch_array($sql);
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['group'] = $data['grup_id'];
			$_SESSION['username'] = $_POST['username'];	 	
			 
			 header('Location: index.php');
			 
		}

}else{
	header('Location: index.php');
}

?>