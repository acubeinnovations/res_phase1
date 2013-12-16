<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}

if(isset($_POST['refresh'])){
$item=new Item($myconnection);
$item->connection=($myconnection);
$item_name=$item->get_array_item_name();

$mybills=new Bills($myconnection);
$mybills->connection=($myconnection);

$mybillitems=new BillItems($myconnection);
$mybillitems->connection=($myconnection);

if(isset($_SESSION['bill_number']) && $_SESSION['bill_number']>0 && isset($_SESSION['bill_id']) && $_SESSION['bill_id']>0){
$mybillitems->bill_id=$_SESSION['bill_id'];
$data_bill_items=$mybillitems->get_list_array_bylimit();
$bill_item_index=0;

$div_content='';
while($bill_item_index<count($data_bill_items)){
$div_content.='<div class="row"><div class="large-12 columns"><div class="large-4 columns"><a href="#" class="tiny button fixed bill_items" id="item_bill'.$data_bill_items[$bill_item_index]['item_id'].'" item_id="'.$data_bill_items[$bill_item_index]['item_id'].'" bill_item_id="'.$data_bill_items[$bill_item_index]['id'].'">'.$item_name[$data_bill_items[$bill_item_index]['item_id']].'</a></div><div class="large-4 columns"><input type="text" value="'.$data_bill_items[$bill_item_index]['quantity'].'" class="item_quantity" id="item_quantity'.$data_bill_items[$bill_item_index]['item_id'].'" item_id="'.$data_bill_items[$bill_item_index]['item_id'].'" bill_item_id="'.$data_bill_items[$bill_item_index]['id'].'" /></div><div class="large-4 columns"><a href="#" class="tiny button bill_items fixed" id="item_rate'.$data_bill_items[$bill_item_index]['item_id'].'" item_id="'.$data_bill_items[$bill_item_index]['item_id'].'" bill_item_id="'.$data_bill_items[$bill_item_index]['id'].'">'.$data_bill_items[$bill_item_index]['rate'].'</a></div></div/></div/>';
$bill_item_index++;
}
print $div_content;
exit();
}else{
print 1;
exit();
}
}

?>
