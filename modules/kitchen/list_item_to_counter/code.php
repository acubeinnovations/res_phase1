<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
$item=new Item($myconnection);
$item->connection=($myconnection);

$item_category=new ItemCategory($myconnection);
$item_category->connection=($myconnection);
///////////////////////////////////////////
$counteritem=new CounterItem($myconnection);
$counteritem->connection=($myconnection);

//////////////////////////////////////////
if(isset($_POST['item_id'])){
$item->item_category_id=$_POST['item_id'];
$get_item=$item->get_items_by_category();
}else{

}

if($get_item!=false){
	$count = count($get_item);
	$item_index=0;
	$div_content='<div class="row"><div class="medium-6 columns">';
	while($item_index<$count){
			$counteritem->counter_id=$_SESSION[SESSION_TITLE.'counter_id'];	
			$counteritem->item_id=$get_item[$item_index]["id"];	
			$available_quantity=$counteritem->get_item_quantity_today(); 
	$div_content.='<div class="medium-4 columns"><a href="#" class="tiny button items " item_id="'.$get_item[$item_index]["id"].'" item_details="'.$get_item[$item_index]["name"].'/'.$get_item[$item_index]["rate"].'/'.$get_item[$item_index]["tax"].'">'.$get_item[$item_index]["name"].' Q.'.$available_quantity.'</a></div>';
	$item_index++;
	 } 
$div_content.='</div></div>';
print $div_content;
exit();
}else{
	print '1';
	exit();
}

print_r($get_item);
?>
