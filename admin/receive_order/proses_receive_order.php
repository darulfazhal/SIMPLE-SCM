<?php
session_start();
include('../model.php');

if(isset($_GET['id']))
{
	$id_order = mysql_real_escape_string(htmlentities($_GET['id']));
 
 	
	$sql = mysql_query("update `order` set status_order = '8' where id_order='".$id_order."'") or die(mysql_error());
	if($sql){
		header('Location: ../index.php?page=receive_order');
	}

}else{
	header('Location: ../index.php');
}

?>