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
$get_detl=$itemcategory->get_list_array();
if($get_detl!=false){
	
	$count=count($get_detl);
}
$array_category=$itemcategory->get_array();
?>