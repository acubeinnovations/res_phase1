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

$div_content=' <table> <tr>
    <td align="center"><font size="5">Company Name</font></td>
	</tr>
	<tr>
    <td align="center">Company Address</td>
	</tr>
	<tr>
    <td align="center">Telephone</td>
	</tr>
	<tr>
    <td align="left">Bill Number '.$mybills->bill_number.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; POST CODE, CITY</td>
	
	</tr>	
	<tr><td>
	<table width=150px>
  <thead>
    <tr>
	  <th>Slno</th>
      <th >Item</th>
      <th>Quantity</th>
      <th >Rate</th>
	 <th >Tax</th>
      <th>Amt</th>
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

$bill_item_index++;
$slno++;
}
$div_content.='<tr>
	   <td>Grand Total :</td>
      <td></td>
      <td></td>
      <td></td>
	  <td></td>
      <td>'.$tot_amount.'</td>
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
	   <td>To be paid :</td>
      <td></td>
      <td></td>
      <td></td>
	  <td></td>
      <td>'.$bill_amount.'</td>
    </tr></tbody>
</table></td>
  </tr>
</table>';
print $div_content;
exit();

}else{
print 'No Bill Selected.<a class="close-reveal-modal">&#215;</a>';
exit();
}


?>
