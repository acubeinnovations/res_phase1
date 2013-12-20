<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
$item=new Item($myconnection);
$item->connection=($myconnection);

$item_category=new ItemCategory($myconnection);
$item_category->connection=($myconnection);

if(isset($_SESSION['id'])){
$item->id=$_SESSION['id'];
$item->get_all();
}else{

}

//$get_item=$item->get_list_array();
	$item->total_records=25;
	if(isset($_POST['submit'])){
	$item->name=$_POST['search'];
	}else{

	}
	$array_item_category=$item_category->get_array();
	$get_item=$item->get_list_array_bylimit();
	if($get_item!=false){
	$count = count($get_item);

}
//$array_item=$item->get_array();
?>
