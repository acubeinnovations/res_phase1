<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
$item=new Item($myconnection);
$item->connection=($myconnection);

$item_category=new ItemCategory($myconnection);
$item_category->connection=($myconnection);

$array_item_category=$item_category->get_list_array();
$get_item=$item->get_list_array();
if($get_item!=false){
	$count = count($get_item);
}
$item->item_category_id=1;
$get_item_sub=$item->get_items_by_category();
//$array_item=$item->get_array();


?>