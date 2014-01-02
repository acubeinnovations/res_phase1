<form id="form" name="form" method="GET" action="">
	<fieldset>
		<table width="800" hight="68" align="center" border="0">
			<b>Select Date <input name="date" class="mydatepicker" id="date" readonly="readonly" value="<?php echo $admin_kitchen_report->date; ?>"></b> &nbsp; <input class = "tiny button" type="submit" value="search"/>
			<input name="kitchen_id" type="hidden" id="kitchen_id" value="<?php echo $admin_kitchen_report->kitchen_id; ?>"/>
			<td><?php echo populate_list_array("listcounter", $arr_admin_counter, 'id','name', $my_counter->counter_id,$disable=false);?></td>
			
				<td>Item</td>
				<td width="200">Kitchen Quantity</td>
				<td width="200">Sales Quantity</td>
				<td>Balance</td>
			</tr>
			<?php 
			if($array_kitchen_report==false){
				?>
			<tr>
				<td>No Records Found</td>
			</tr>
			<?php } else {
			$i=0;
			while($i<$count_admin_kitchen) { ?>
				<tr>
					
						<td ><?php echo $array_kitchen_report[$i]['name'];?></td>
						<td ><?php echo $array_kitchen_report[$i]['quantity'];?></td>
						<td></td>
						<td></td>

					</tr>
	<?php 
	$i++;
	}
	}
	?>							
		</table>
	</fieldset>
</form>