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

if(isset($_SESSION['bill_id']) && $_SESSION['bill_id']>0 || isset($_POST['payment'])){
$mybillitems->bill_id=$_SESSION['bill_id'];
$mybillitems->bill_item_status_id=BILL_ITEM_STATUS_ACTIVE;
$data_bill_items=$mybillitems->get_list_array_bylimit();

$mybills->id=$_SESSION['bill_id'];
$mybills->get_detail();

$mybills->bill_status_id=BILL_STATUS_PAID;
$mybillitems->bill_id=$_SESSION['bill_id'];
$mybillitems->bill_item_status_id==BILL_ITEM_STATUS_ACTIVE;
//$mybillitems->bill_kitchen_status_id==BILL_KITCHEN_STATUS_FINISHED;
$tot_amount=$mybillitems->get_tot_amount();
$bill_amount=$mybillitems->get_tot_bill_amount_array();
$mybills->amount=$bill_amount;
$mybills->payment_date=CURRENT_DATETIME;
$mybills->update();

$mybills->id=$_SESSION['bill_id'];
$mybills->get_detail();
$bill_item_index=0;
////////////

?>


<?php
$div_content='
<table>
	<tr>
    	<td align="center" colspan="6" style="line-height:18px;">
			<font size="2"><b>
				KELLY\'S RESTAURANT</b><br/>
				Sea Port Airport Road, <br/>
				Near Sunrise Hospital, <br/>
				Kakkanad<br/>
				Phone: 0484 2145678, 9496155000<br/>
				* Cash Bill *
			</font>
		</td>
	</tr>
	
	<tr>
    	<td align="left" colspan="2">
			<font size="1">Bill No: '.$mybills->bill_number.'</font>
		</td>
		<td align="right" colspan="4">
			<font size="1">Date: '.date("d-m-Y H:i:s",strtotime($mybills->payment_date)).'</font> 
		</td>
	</tr>	
	<tr>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;" colspan="2" ><font size="1">Item</font></td>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;"><font size="1">Qty</font></td>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;" ><font size="1">Rate</font></td>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;" ><font size="1">Tax</font></td>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;"><font size="1">Amt</font></td>
	</tr>
 <tbody>';
$slno=1;
while($bill_item_index<count($data_bill_items)){
$div_content.='<tr>
      <td colspan="2"><font size="1">'.substr($item_name[$data_bill_items[$bill_item_index]['item_id']],0,12).'</font></td>
      <td><font size="1">'.$data_bill_items[$bill_item_index]['quantity'].'</font></td>
      <td><font size="1">'.$item_rate[$data_bill_items[$bill_item_index]['item_id']].'</font></td>
	 <td><font size="1">'.$data_bill_items[$bill_item_index]['tax'].'</font></td>
      <td><font size="1">'.$data_bill_items[$bill_item_index]['rate'].'</font></td>
    </tr>';
$bill_tot_amount=$bill_tot_amount+$data_bill_items[$bill_item_index]['rate'];
$bill_item_index++;
$slno++;
}
$div_content.='<tr>
	   <td colspan="2" style="border-top:1px #000 dotted;"><font size="1">Grand Total :</font></td>
	  
      <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;"></td>
	 
      <td style="border-top:1px #000 dotted;"><font size="1">'.$tot_amount.'</font></td>
    </tr>
	<tr>
	   <td><font size="1">Tax :</font></td>
      <td></td>
      <td></td>
      <td></td>
	  <td></td>
      <td><font size="1">'.$mybills->tax.'</font></td>
    </tr>
	<tr>
	   <td><font size="1">Discount :</font></td>
      <td></td>
      <td></td>
      <td></td>
	  <td></td>
      <td><font size="1">'.$mybills->discount.'</font></td>
    </tr>
	<tr>
	   <td colspan="2" style="border-top:1px #000 dotted;"><font size="1"><b>To be paid :</b></font></td>
      <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;"></td>
	
      <td style="border-top:1px #000 dotted;" colspan="2" align="right"<font size="1"><b>Rs.'.$bill_amount.'</b></font></td>
    </tr>
	<tr>
    <td colspan="6" align="center"><font size="2">Thank You</font></td>
	</tr>	
	</tbody>
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
