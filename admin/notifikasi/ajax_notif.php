<?php

include("../../config/koneksi.php");
$return = array();
$return['status'] = false;
$return['data'] = array();
$return['message'] = "";


$group_id = $_POST['group_id'];
// $group_id = 1;
$status = "";
switch ($group_id) {
	case 1:
		$status = "(1,2,3,4,5,6,7,8,9,10,11,12)";
		break;
	case 2:
		$status = "(1,10,11)";
		break;
	case 3:
		$status = "(1,2,3,4,5,6,7,8,9,10,11,12)";
		break;
	case 4:
		$status = "(4,8)";
		break;
	case 5:
		$status = "(2,12)";
		break;
	case 6:
		$status = "(6)";
		break;
	case 7:
		$status = "(5,7)";
		break;
	case 8:
		$status = "(9)";
		break;
	default:
		$status = "(1,2,3,4,5,6,7,8,9,10,11,12)";
		break;
}

$sql = mysql_query("select * from `order` a join enum_status_order b ON(a.status_order = b.id) where  status_baca = 0 and status_order IN ".$status."") or die(mysql_error());
 	
if(mysql_num_rows($sql) > 0)
{  
	$return['status']  = true;
	while ($order = mysql_fetch_array($sql, MYSQL_ASSOC)) {
		
		array_push($return['data'], $order);
	}
}
 echo json_encode($return);





?>