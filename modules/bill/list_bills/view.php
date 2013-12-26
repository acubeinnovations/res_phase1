<div id="openedbills" class="reveal-modal" data-reveal>  </div>
<div id="print_bill" class="reveal-modal" data-reveal><a class="close-reveal-modal">&#215;</a><div id='printable-area'></div> <a href="#" class="tiny button  print_div" id= "print_div">PRINT</a> </div>
<div class="row parent">
	
		<div class="large-12 columns"><br><br>

			<table>
			<tbody bgcolor="#D6D6D6">
					<tr>

						<td colspan="6"><form action="" method="post"><p><b>Select Date <input name="bill_date" class="mydatepicker" id="bill_date" readonly="readonly" value="<?php echo $mybills->bill_date; ?>"></b> &nbsp; <input class = "tiny button" type="submit" value="search"/></p></form></td> <td></td>
					</tr>
				</tbody>
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
				$bill_total_amount=0;
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
				$bill_total_amount=$bill_total_amount+$bills[$bill_index]['amount'];
			}
				$bill_index++;
				$slno++;
				}?>
				</tbody>
 				<tbody bgcolor="#f9f9f9" >
					<tr height="3">
						<td colspan="3"><font size="4">Total Number of Bills : <?php echo count($bills);?> </font> </td>
						<td></td>
						
						<td colspan="1"></td>
						<td><font size="4">Total Amount : <?php echo $bill_total_amount; ?></font> </td>
						<td><a href="#" data-reveal-id="print_bill" id="print_summary_bill_button" class="tiny button"  >PRINT</a></td>
					</tr>
				</tbody>				
			</table>

		</div>

	
	</div>


