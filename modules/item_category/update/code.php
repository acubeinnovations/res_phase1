<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


$item =new Item($myconnection);
$item->connection=$myconnection;

$message="";

if(isset($_GET['id'])){
	$item->id=$_GET['id'];
	$get_details=$item->get_details();
}

//submit action

if(isset($_POST['submit'])){
	$item->name=$_POST['item'];
	$update=$item->update();
	
		
}


?>