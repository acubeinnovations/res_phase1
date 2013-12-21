<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}

if(isset($_POST['print']) || isset($_POST['payment']) && isset($_SESSION['bill_id']) && $_SESSION['bill_id']>0){
$item_rate='';
$item_name='';
$tot_amount='';
$bill_tot_amount='';
$item=new Item($myconnection);
$item->connection=($myconnection);
$item_name=$item->get_array_item_name();
$item_rate=$item->get_array_item_rate();
$mybills=new Bills($myconnection);
$mybills->connection=($myconnection);
$bill_status=$mybills->get_array_statuses();
$mybillitems=new BillItems($myconnection);
$mybillitems->connection=($myconnection);
$last_bill_number='';
if(isset($_SESSION['bill_id']) && $_SESSION['bill_id']>0 || isset($_POST['payment'])){
$mybillitems->bill_id=$_SESSION['bill_id'];
$mybillitems->bill_item_status_id=BILL_ITEM_STATUS_ACTIVE;
$data_bill_items=$mybillitems->get_list_array_bylimit();

$mybills->id=$_SESSION['bill_id'];
$mybills->get_detail();
$last_bill_number=$mybills->get_last_bill_number();

$mybills->bill_number=$last_bill_number+1;
$mybills->bill_status_id=BILL_STATUS_PAID;
$mybillitems->bill_id=$_SESSION['bill_id'];
$mybillitems->bill_item_status_id==BILL_ITEM_STATUS_ACTIVE;
//$mybillitems->bill_kitchen_status_id==BILL_KITCHEN_STATUS_FINISHED;
$tot_amount=$mybillitems->get_tot_amount();
$bill_amount=$mybillitems->get_tot_bill_amount_array();
$mybills->amount=$bill_amount;
$mybills->payment_date=CURRENT_DATETIME;
$mybills->update();
$mybills->last_bill_number=$mybills->bill_number;
$mybills->update_last_bill_number();
$_SESSION['bill_number']=$mybills->bill_number;
$mybills->id=$_SESSION['bill_id'];
$mybills->get_detail();
$bill_item_index=0;
?>


<?php
$div_content=' <table width=150px> <tr>
    <td align="center"><font size="5">Company Name</font></td>
	</tr>
	<tr>
    <td align="center">Company Address</td>
	</tr>
	<tr>
    <td align="center">Telephone</td>
	</tr>
	<tr>
    <td align="left">Bill Number : '.$mybills->bill_number.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$mybills->payment_date.'</td>
	
	</tr>	
	<tr><td>
	<table width=150px>
    <thead>
    <tr>
	  <th style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;">Slno</th>
      <th style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;" >Item</th>
      <th style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;">Qty</th>
      <th style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;" >Rate</th>
	 <th style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;" >Tax</th>
      <th style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;">Amt</th>
    </tr>
  </thead>
 <tbody>';
$slno=1;
while($bill_item_index<count($data_bill_items)){
$div_content.='<tr>
	   <td>'.$slno.'</td>
      <td>'.$item_name[$data_bill_items[$bill_item_index]['item_id']].'</td>
      <td>'.$data_bill_items[$bill_item_index]['quantity'].'</td>
      <td>'.$item_rate[$data_bill_items[$bill_item_index]['item_id']].'</td>
	 <td>'.$data_bill_items[$bill_item_index]['tax'].'</td>
      <td>'.$data_bill_items[$bill_item_index]['rate'].'</td>
    </tr>';
$bill_tot_amount=$bill_tot_amount+$data_bill_items[$bill_item_index]['rate'];
$bill_item_index++;
$slno++;
}
$div_content.='<tr>
	   <td colspan="2" style="border-top:1px #000 dotted;">Grand Total :</td>
	  
      <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;"></td>
	 
      <td style="border-top:1px #000 dotted;">'.$tot_amount.'</td>
    </tr>
	<tr>
	   <td>Tax :</td>
      <td></td>
      <td></td>
      <td></td>
	  <td></td>
      <td>'.$mybills->tax.'</td>
    </tr>
	<tr>
	   <td>Discount :</td>
      <td></td>
      <td></td>
      <td></td>
	  <td></td>
      <td>'.$mybills->discount.'</td>
    </tr>
	<tr>
	   <td colspan="2" style="border-top:1px #000 dotted;">To be paid :</td>
      <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;"></td>
	  <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;">'.$bill_amount.'</td>
    </tr>
	<tr>
    <td colspan="6" align="center"><u>Thank You</u></td>
	</tr>	
	</tbody>
</table></td>
  </tr>
</table>';
print $div_content;
exit();
}else{
print 'Some errors occured.please try after some time.';
exit();
}
}else{
print 'No Bill Selected.';
exit();
}


?>
