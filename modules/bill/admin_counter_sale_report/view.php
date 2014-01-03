<form id="form2" name="form2" method="GET" action="">
  <fieldset>
    <legend> Sales Report </legend>

  <table width="500" height="68" align="center">

  	<tr>
  		<td> Item </td>
  		<td> Rate </td>
  		<td> Sales Quantity </td>
  		<td> Amount </td>
  	</tr>
    <b>Select Date <input name="bill_date" class="mydatepicker" id="bill_date" readonly="readonly" value="<?php echo $admin_sale_counter->bill_date; ?>"></b> &nbsp; <input class = "tiny button" type="submit" value="search"/>
    <input name="counter_id" type="hidden" id="counter_id" value="<?php echo $admin_sale_counter->counter_id; ?>"/>

  	<?php
  	if($array_sales_counter==false){
  	?>
 	 	<tr>
  		<td> NO Records Found</td></tr>
 	 	</tr>

 	 <?php } else{
  		$i=0;
      $j=0;
      $bill_total_amount=0;
    
  		while($i<$count_sales_report){?>
  	<tr>

	     <td><?php echo $array_sales_counter[$i]['item_name']; ?></td>
				<td><?php echo $array_sales_counter[$i]['rate'];?></td>
        <td><?php echo $array_sales_counter[$i]['quantity'];?></td>
        <td><?php echo $array_sales_counter[$i]['amount'];?></td>
  </tr>
    
      <?php 
        $bill_total_amount=$bill_total_amount+$array_sales_counter[$j]['amount'];
      
       

    $j++;
    $i++;
    }?>
<tr>
    <td align="Right" colspan="4"><b>Total Amount: </b><?php echo  $bill_total_amount; ?></td></tr>
<?php 
  }
?>
  

  	<table>
  	</fieldset>
  </form>

