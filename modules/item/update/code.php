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

if(isset($_POST['submit']) && $_POST['submit']=='submit'){
		if(isset($_POST['chkmaster'])){
		$chkvalue=$_POST['chkmaster'];
		}else{
		$chkvalue=0;
		}
		
		
	$item->name= $_POST['name'];
	$item->rate = $_POST['rate'];
	$item->tax =  $_POST['tax'];
	$item->item_category_id=$_POST['listitem'];
	$item->status_id= $_POST['status_id'];
	$item->chkmaster= $chkvalue;
	$item->update();
	$msg="Item Updated";
	}else{
	$msg="Invalid Entry";

}


if(isset($_GET['id'])){
	$item->id=$_GET['id'];
	$item->get_details();
}



?>
