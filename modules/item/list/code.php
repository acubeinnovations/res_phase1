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
$array_item_category=$item_category->get_array();
$get_item=$item->get_list_array();
if($get_item!=false){
	$count = count($get_item);
}
//$array_item=$item->get_array();
?>
