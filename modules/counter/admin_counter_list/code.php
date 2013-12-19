<?php

if(!defined('CHECK_INCLUDED')){
	exit();
}

$admin_counter= new Counter($myconnection);
$admin_counter->connection=$myconnection;

if(isset($_POST['search'])){
	$admin_counter->name=$_POST['search'];
	$array_admin_counter=$admin_counter->get_list_array_bylimit();
if($array_admin_counter!=false){
	$count=count($array_admin_counter);
}
}else{

}

?>


