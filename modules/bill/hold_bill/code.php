<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}

if(isset($_POST['hold']) && isset($_SESSION['bill_id']) && $_SESSION['bill_id']>0){
$mybills=new Bills($myconnection);
$mybills->connection=($myconnection);
$mybills->id=$_SESSION['bill_id'];
$mybills->get_detail();
if($mybills->bill_status_id!=BILL_STATUS_PAID){
$mybills->bill_status_id=BILL_STATUS_HOLD;
$chk=$mybills->update();
if($chk=true){
$_SESSION['bill_number']='';
$_SESSION['bill_id']='';
print 1;
exit();
}else{
print 2;
exit();
}
}
}


?>
