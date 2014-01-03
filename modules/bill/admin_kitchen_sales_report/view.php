<form id="form" name="form" method="GET" action="">
	<fieldset>

		<div class="small-6  medium-6 large-6 column">
			<div class="row">
				<div class="small-6  medium-6 large-6 column">
					<b>Select Date</b> 
				</div>

				<div class="small-6  medium-6 large-6 column">
					<input name="date" class="mydatepicker" id="date" readonly="readonly" value="<?php echo $admin_kitchen_report->date; ?>"> 
				</div>	
			</div>
			<div class="row">
				<div class="small-6  medium-6 large-6 column">
					<b>Counter</b> &nbsp;
				</div>

				<div class="small-6  medium-6 large-6 column">
					  <?php echo populate_array("listcounter", $array_counter, $admin_kitchen_report->counter_id,$disable=false);?>
				</div>
			</div>
			<input name="kitchen_id" type="hidden" id="kitchen_id" value="<?php echo $admin_kitchen_report->kitchen_id; ?>"/>
			<input class = "tiny button" type="submit" value="search"/>
		</div>
		<table width="800" hight="68" align="center" border="0">

			<tr>
			
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
						<td ><?php echo $array_kitchen_report[$i]['counter_quantity'];?></td>
						<td ><?php echo $array_kitchen_report[$i]['bill_quantity'];?></td>
						<td><?php echo ($array_kitchen_report[$i]['counter_quantity'] - $array_kitchen_report[$i]['bill_quantity']);?></td>
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