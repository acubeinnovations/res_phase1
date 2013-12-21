<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
$mybills=new Bills($myconnection);
$mybills->connection=($myconnection);
$bill_statuses=$mybills->get_array_statuses();
if(isset($_POST['opened'])){




}
$bills='';
$mybills->counter_id=$_SESSION[SESSION_TITLE.'counter_userid'];
$mybills->bill_status_id=BILL_STATUS_PAID;
$bills=$mybills->get_list_array_bylimit();


?>
