<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}

if(isset($_POST['bill_item_id']) && $_SESSION['bill_id']>0){
$bill_amount='';
$mybills=new Bills($myconnection);
$mybills->connection=($myconnection);
$mybills->id=$_SESSION['bill_id'];
$mybillitems=new BillItems($myconnection);
$mybillitems->connection=($myconnection);
$mybillitems->id=$_POST['bill_item_id'];
$mybillitems->get_detail();
$mybillitems->bill_item_status_id=BILL_ITEM_STATUS_CANCELLED;
$mybillitems->update();
$mybillitems->bill_id=$_SESSION['bill_id'];
$bill_amount=$mybillitems->get_tot_bill_amount_array();
$mybills->get_detail();
$mybills->amount=$bill_amount;
$mybills->bill_status_id=BILL_STATUS_HOLD;
$mybills->update();
print $mybills->amount;
exit();
}

if(isset($_POST['cancel']) && $_SESSION['bill_id']>0){
$bill_amount='';
$mybills=new Bills($myconnection);
$mybills->connection=($myconnection);
$mybills->id=$_SESSION['bill_id'];
$mybillitems=new BillItems($myconnection);
$mybillitems->connection=($myconnection);
$mybillitems->bill_id=$_SESSION['bill_id'];
$bill_amount=$mybillitems->get_tot_bill_amount_array();
$mybillitems->bill_item_status_id=BILL_ITEM_STATUS_CANCELLED;
$mybillitems->update_statuses();
$mybills->get_detail();
$mybills->amount=$bill_amount;
$mybills->bill_status_id=BILL_STATUS_CANCELLED;
$mybills->update();
$_SESSION['bill_id']='';
$_SESSION['bill_number']='';
print '1';
exit();
}



?>
