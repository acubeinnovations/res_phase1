<div id="openedbills" class="reveal-modal" data-reveal>  </div>
<div id="print_bill" class="reveal-modal" data-reveal><a class="close-reveal-modal">&#215;</a><div id='printable-area'></div> <a href="#" class="tiny button  print_div" id= "print_div">PRINT</a> </div>
<div class="row parent">
	
		<div class="large-12 columns"><br><br>
			<table>
				  <thead>
					<tr>
					  <th width="30">Slno</th>
					 <th width="150">Bill Number</th>
					  <th width="250">Bill Date</th>
					  <th width="250">Payment Date</th>
					  <th width="250">Bill status</th>
						<th width="250">Amount</th>
						<th width="250">Print</th>
					</tr>
				  </thead>
				 <tbody>
				<?php
				$slno=1;
				$bill_index=0;
				while($bill_index<count($bills)){  if(isset($bills[$bill_index]['id'])){ ?>
				<tr>
						<td><?php echo $slno?></td>
						<td><?php echo $bills[$bill_index]['bill_number']?></td>
						<td><?php echo $bills[$bill_index]['bill_date']?></td>
						<td><?php echo $bills[$bill_index]['payment_date']?></td>
						<td><?php echo $bill_statuses[$bills[$bill_index]['bill_status_id']]?></td>
						<td><?php echo $bills[$bill_index]['amount']?></td>
						<td><a href="#" data-reveal-id="print_bill" id="print_bill_button<?php echo $bills[$bill_index]['id']?>" class="tiny button  print_bill_button" bill_id="<?php echo $bills[$bill_index]['id']?>" >PRINT</a></td>
				</tr>
				<?php
			}
				$bill_index++;
				$slno++;
				}?>
				</tbody>
				</table>
	
		</div>

	
	</div>


