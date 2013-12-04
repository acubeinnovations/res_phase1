<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


if(isset($_POST['submit']) && $_POST['submit']=="Submit" ){
 $item_category =new ItemCategory($myconnection);
 $item_category->connection=$myconnection;
 $item_category->id=$_POST['h_id'];
 $item_category->name=$_POST['name'];
 $item_category->status_id=STATUS_ACTIVE;
 $item_category->parent_id=$_POST['lstitem_category'];
 
 $item_category->update();

}
$item_category =new ItemCategory($myconnection);
$item_category->connection=$myconnection;
$arr_item_category=$item_category->get_list_array();
if($arr_item_category==false){
	$arr_item_category=array();
}

if(isset($_GET['id'])){
	$item_category->id=$_GET['id'];
	$item_category->get_details();
	}
 
  



?>