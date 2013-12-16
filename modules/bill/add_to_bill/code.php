<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
$item=new Item($myconnection);
$item->connection=($myconnection);
$item_rate=$item->get_array_item_rate();
$item_name=$item->get_array_item_name();

$item_category=new ItemCategory($myconnection);
$item_category->connection=($myconnection);


if(isset($_POST['item_id'])){
$mybills=new Bills($myconnection);
$mybills->connection=($myconnection);

$mybillitems=new BillItems($myconnection);
$mybillitems->connection=($myconnection);
if(isset($_SESSION['bill_number']) && $_SESSION['bill_number']>0 && isset($_SESSION['bill_id']) && $_SESSION['bill_id']>0){
$mybillitems->item_id=$_POST['item_id'];
$mybillitems->bill_id=$_SESSION['bill_id'];
$chk=$mybillitems->bill_item_check();
if($chk==true){
$mybillitems->get_detail();
if(isset($_POST['qty']) && $_POST['qty']!=''){
$mybillitems->quantity=$_POST['qty'];
}else{
$mybillitems->quantity=$mybillitems->quantity+1;
}
$mybillitems->rate=($item_rate[$mybillitems->item_id])*$mybillitems->quantity;
$mybillitems->updated=CURRENT_DATE;
$mybillitems->update();
print $mybillitems->item_id.'!@#$%*'.$mybillitems->quantity.'!@#$%*'.$mybillitems->rate;
exit();
}else{
$mybillitems->bill_id=$_SESSION['bill_id'];
$mybillitems->item_id=$_POST['item_id'];
$mybillitems->rate=$item_rate[$mybillitems->item_id];
$mybillitems->bill_item_status_id=STATUS_INACTIVE;
$mybillitems->quantity=1;
$mybillitems->update();
$div_content='<div class="row row_bill_items"><div class="large-12 columns"><div class="large-4 columns" id="item_bill'.$mybillitems->item_id.'" item_id="'.$mybillitems->item_id.'" bill_item_id="'.$mybillitems->id.'">'.$item_name[$mybillitems->item_id].'</div><div class="large-4 columns"><input type="text" value="'.$mybillitems->quantity.'" class="item_quantity" id="item_quantity'.$mybillitems->item_id.'" item_id="'.$mybillitems->item_id.'" bill_item_id="'.$mybillitems->id.'" /></div><div class="large-4 columns" id="item_rate'.$mybillitems->item_id.'" item_id="'.$mybillitems->item_id.'" bill_item_id="'.$mybillitems->id.'">'.$mybillitems->rate.'</div></div></div>';
print $div_content;
exit();
}
}else{
$mybills->counter_id=$_SESSION[SESSION_TITLE.'counter_userid'];
$last_bill_number=$mybills->get_last_bill_number();

$mybills->bill_number=$last_bill_number+1;
$mybills->bill_date=CURRENT_DATE;
$mybills->bill_status_id=BILL_STATUS_BILLED;
$mybills->update();
$mybills->last_bill_number=$mybills->bill_number;
$mybills->update_last_bill_number();
$_SESSION['bill_number']=$mybills->bill_number;
$_SESSION['bill_id']=$mybills->id;
$mybillitems->bill_id=$mybills->id;
$mybillitems->item_id=$_POST['item_id'];
$mybillitems->rate=$item_rate[$mybillitems->item_id];
$mybillitems->bill_item_status_id=STATUS_INACTIVE;
$mybillitems->quantity=1;
$mybillitems->update();
$div_content='<div class="row row_bill_items"><div class="large-12 columns"><div class="large-4 columns" id="item_bill'.$mybillitems->item_id.'" item_id="'.$mybillitems->item_id.'" bill_item_id="'.$mybillitems->id.'">'.$item_name[$mybillitems->item_id].'</div><div class="large-4 columns"><input type="text" class="item_quantity" value="'.$mybillitems->quantity.'" item_id="'.$mybillitems->item_id.'" bill_item_id="'.$mybillitems->id.'" id="item_quantity'.$mybillitems->item_id.'" /></div><div class="large-4 columns" id="item_rate'.$mybillitems->item_id.'" item_id="'.$mybillitems->item_id.'" bill_item_id="'.$mybillitems->id.'">'.$mybillitems->rate.'</div></div></div>';
print $div_content;
exit();
}



}
?>
