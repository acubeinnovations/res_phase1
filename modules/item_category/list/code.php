<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}

$itemcategory = new Itemcategory($myconnection);
$itemcategory->connection=$myconnection;

if(isset($_SESSION['id'])){
	$itemcategory->id=$_SESSION['id'];
	$itemcategory->get_all();
}else{
	//header("Location:test.php");
}
$array_item_categories=$itemcategory->get_list_array();
if($array_item_categories!=false){
	
	$count=count($array_item_categories);
}
$array_category=$itemcategory->get_array();
?>