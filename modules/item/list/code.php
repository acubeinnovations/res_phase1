<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
$item=new Item($myconnection);
$item->connection=($myconnection);

if(isset($_SESSION['id'])){
$item->id=$_SESSION['id'];
$item->get_all();
}else{

}
$get_item=$item->get_list_array();

