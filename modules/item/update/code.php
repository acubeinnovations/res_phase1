<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}
$item=new item($myconnection);
$item->connection=$myconnection;

$msg="";

if(isset($_POST['submit']))
{
	$item->itemname= $_POST['itemname'];
	$item->rate =  $_POST['rate'];
	$item->tax =  $_POST['tax'];
	$item->item_category_id="";
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
