<?php
//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
	if(isset($_GET['id'])){
		$mybillitems=new BillItems($myconnection);
		$mybillitems->connection=($myconnection);
		$myitems=new items($myconnection);
		$myitems->connection=($myconnection);
		$myitems->id=$_GET['id'];
		$myitems->get_details();
		
		
		
		exit();
		
	}
	else{
		//donothing
	}
		
?>