<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}

$list = new Item($myconnection);
$list->connection=$myconnection;


if(isset($_SESSION['id']))
 {
	$list->id=$_SESSION['id'];
	$list->get_all();
	
	
}	
else
{
	
 	//header("Location:test.php");
}
$get_detl=$list->get_all();
if($get_detl!=false){
	
	$count=count($get_detl);

}



?>