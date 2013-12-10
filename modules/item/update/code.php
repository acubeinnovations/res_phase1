<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
$item=new item($myconnection);
$item->connection=$myconnection;

$item_category=new ItemCategory($myconnection);
$item_category->connection=$myconnection;

$arr_item_category=$item_category->get_list_array();
if($arr_item_category==false){
	$arr_item_category=array();
}

$msg="";

if(isset($_POST['submit']))
{
	$item->name= $_POST['itemname'];
	$item->rate =  $_POST['rate'];
	$item->tax =  $_POST['tax'];
	$item->item_category_id=$_POST['listitem'];
	$item->status_id= "";
	$item->update();
	$msg="Item Updated";
	}else{
	$msg="Valid Entry";
}
if(isset($_GET['id'])){
	$item->id=$_GET['id'];
	$item->get_details();
}


?>
