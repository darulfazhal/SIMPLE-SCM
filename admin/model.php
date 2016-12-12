<?php
include("../../config/koneksi.php");

function extract_kolom($kolom,$type){
	$array_key = array();
	$array_value = array();
	$string = "";
	if($type =="insert"){
		foreach ($kolom as $key => $value) {
			array_push($array_key, $key);
			array_push($array_value, "'".$value."'");
		}
		$string_key   = implode(",", $array_key);
		$string_value =  implode(",", $array_value);
	
		$string = "(".$string_key.") VALUES (".$string_value.")";
	}elseif($type == "update"){
		foreach ($kolom as $key => $value) {
			$string .= $key."='".$value."',";
		}
	}else{
		$string = "";
	}
	

	return $string;	
}
function insert($nama_tabel, $kolom){ 
 	$string_insert = extract_kolom($kolom,"insert");

 	// echo $string_insert; 
 	// die();
	$sql = mysql_query("insert into ".$nama_tabel." ".$string_insert); 
	 
	return mysql_insert_id();
}

function update($nama_tabel, $kolom,$id,$where){ 
 	$string_update = extract_kolom($kolom,"update");
 	 
 	 
	$sql = mysql_query("update ".$nama_tabel." SET ".substr($string_update, 0, -1)." where ".$where." = '".$id."'") or die(mysql_error()); 
	return $sql;
}


function delete($nama_tabel, $id_kolom, $nilai_kolom){  
	$sql = mysql_query("delete from ".$nama_tabel." where ".$id_kolom."='".$nilai_kolom."'"); 
	return $sql;
}



?>