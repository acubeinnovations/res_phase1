<?php

//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}

if(isset($_POST['print'])  && isset($_POST['bill_id'])){
$item_rate='';
$item_name='';
$bill_amount='0';
$item=new Item($myconnection);
$item->connection=($myconnection);
$item_name=$item->get_array_item_name();
$item_rate=$item->get_array_item_rate();
$mybills=new Bills($myconnection);
$mybills->connection=($myconnection);
$bill_status=$mybills->get_array_statuses();
$mybillitems=new BillItems($myconnection);
$mybillitems->connection=($myconnection);

$mybillitems->bill_id=$_POST['bill_id'];

$data_bill_items=$mybillitems->get_list_array_bylimit();

$mybills->id=$_POST['bill_id'];
$mybills->get_detail();

$mybillitems->bill_id=$_POST['bill_id'];
$tot_amount=$mybillitems->get_tot_amount();
$mybillitems->bill_item_status_id=BILL_ITEM_STATUS_ACTIVE;

$bill_amount=$mybillitems->get_tot_bill_amount_array();
if($bill_amount==false){
$bill_amount=0;
}
$bill_item_index=0;
	$total_packing_charges=0;
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
			<font size="2"><b>Bill No: '.$mybills->bill_number.'</b></font>
		</td>
		<td align="right" colspan="4">
			<font size="1"><b>Date: '.date("d-m-Y H:i:s",strtotime($mybills->payment_date)).'</b></font> 
		</td>
	</tr>	
	<tr>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;" colspan="2" ><font size="1"><b>Item</b></font></td>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;"><font size="1"><b>Qty</b></font></td>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;" ><font size="1"><b>Rate</b></font></td>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;" ><font size="1"><b>Tax</b></font></td>
	  <td style="border-bottom:1px #000 dotted;border-top:1px #000 dotted;"><font size="1"><b>Amt</b></font></td>
	</tr>
 <tbody>';
$slno=1;
$total_packing_charges=$mybills->packing_charge;
if($total_packing_charges>0){
	$total_packing_charges=$mybills->packing_charge;
}
else {
	$total_packing_charges=0;
	}
while($bill_item_index<count($data_bill_items)){
$div_content.='<tr>
      <td colspan="2"><b><font size="1">'.substr($item_name[$data_bill_items[$bill_item_index]['item_id']],0,12).'</font></b></td>
      <td><b><font size="1">'.$data_bill_items[$bill_item_index]['quantity'].'</font></b></td>
      <td><b><font size="1">'.$item_rate[$data_bill_items[$bill_item_index]['item_id']].'</font></b></td>
	 <td><b><font size="1">'.$data_bill_items[$bill_item_index]['tax'].'</font></b></td>
      <td><b><font size="1">'.$data_bill_items[$bill_item_index]['rate'].'</font></b></td>
    </tr>';

$bill_item_index++;
$slno++;
}
$div_content.='<tr>
	   <td colspan="2" style="border-top:1px #000 dotted;"><font size="1"><b>Grand Total :</b></font></td>
	  
      <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;"></td>
	 
      <td style="border-top:1px #000 dotted;"><b><font size="1">'.$tot_amount.'</font></b></td>
    </tr>
	<tr>
	   <td><font size="1"><b>Tax :</b></font></td>
      <td></td>
      <td></td>
      <td></td>
	  <td></td>
      <td><b><font size="1">'.$mybills->tax.'</font></b></td>
    </tr>
	<tr>
	   <td><b><font size="1">Packing Charge:</font></b></td>
      <td></td>
      <td></td>
      <td></td>
	  <td></td>
      <td><b><font size="1">'.$total_packing_charges.'</font><b></td>
    </tr>
	<tr>
	   <td colspan="2" style="border-top:1px #000 dotted;"><font size="1"><b>To be paid :</b></font></td>
      <td style="border-top:1px #000 dotted;"></td>
      <td style="border-top:1px #000 dotted;"></td>
	
      <td style="border-top:1px #000 dotted;" colspan="2" align="right"<font size="1"><b>Rs.'.$bill_amount.'</b></font></td>
    </tr>
    <tr>
	   <td colspan="2"><font size="1"><b>Paid :</b></font></td>
      <td></td>
      <td></td>
	
      <td  colspan="2" align="right"><b><font size="1">Rs.'.$mybills->paid.'</font></b></td>
    </tr>
    <tr>
	   <td colspan="2" ><font size="1"><b>Change :</b></font></td>
      <td ></td>
      <td ></td>
	
      <td  colspan="2" align="right"><b><font size="1">Rs.'.$mybills->balance.'</font></b></td>
    </tr>
	<tr>
    <td colspan="6" align="center"><font size="2">Thank You</font></td>
	</tr>	

	</tbody>
</table>';
print $div_content;
exit();

}else{
print 'No Bill Selected.<a class="close-reveal-modal">&#215;</a>';
exit();
}


?>
