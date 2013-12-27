<div id="openedbills" class="reveal-modal" data-reveal>  </div>
<div id="print_bill" class="reveal-modal" data-reveal> </div>
<div class="row parent">
	
		<div class="medium-12 columns">
			<br>
			<div class="medium-2 columns">
			<?php if(isset($array_item_category)){ $item_index=0; while($item_index<count($array_item_category)) {?>
			<a href="#" class="small button   item_category success" item_id="<?php echo $array_item_category[$item_index]['id'];?>"><?php echo $array_item_category[$item_index]['name']; ?></a>
			<?php $item_index++; } } ?>
			</div>
			<div class="medium-6 columns items">
			<?php if($get_item_sub!=false){
			$count = count($get_item_sub);
			$item_index=0;?>
				<div class="row"><div class="medium-6 columns">
			<?php
				while($item_index<$count){ 
					$counteritem->counter_id=$_SESSION[SESSION_TITLE.'counter_id'];	
					$counteritem->item_id=$get_item[$item_index]["id"];	
					$available_quantity=$counteritem->get_item_quantity_today();
				?>
		<div class="medium-4 columns"><a href="#" class="tiny button items" item_id="<?php echo $get_item_sub[$item_index]['id']; ?>" item_details="<?php echo $get_item_sub[$item_index]['name'].'/'.$get_item_sub[$item_index]['rate'].'/'.$get_item_sub[$item_index]['tax'];?>"><?php echo $get_item_sub[$item_index]["name"].' Q.'.$available_quantity; ?></a></div>
	<?php
	$item_index++;
	 } 
	}
			?>


				</div></div>
			</div>
			<div class="medium-4 columns" id="counter_item_form" style="display:none;" >
				<ul class="pricing-table" >
				<li class="title">Counter Items </li>
				</ul>
				<div class="medium-4 columns">Item Name</div>
				<div class="medium-2 columns">Avail Qty</div>
				<div class="medium-2 columns">Qty</div>
				<div class="medium-4 columns">Action</div>
				<hr />
			  	<div class="medium-4 columns"><label id="lblitemname">Tea</label></div>
				<div class="medium-2 columns"><input name="txtavailablequantity"  id="txtavailablequantity" type="text"  disabled="disabled" value="21"/></div>
				<div class="medium-2 columns"><input name="txtquantity" type="text" id="txtquantity" /> 
                <input type="hidden" name="h_item_id" id="h_item_id" value="" />
                <input type="hidden" name="h_counter_id" id="h_counter_id" value="<?php echo $_SESSION[SESSION_TITLE.'counter_id'];  ?>" />
                <input type="hidden" name="h_kitchen_id" id="h_kitchen_id" value="<?php echo $_SESSION[SESSION_TITLE.'kitchen_userid'];  ?>" /></div>
				<div class="medium-4 columns"><a href="#" class="button tiny" id="buttonupdate">Update</a></div>
				<hr />
			</div>
						


		<div class="row">
	
			<div class="medium-12 columns">
				<br>
				<div class="medium-4 columns">
				&nbsp;
				</div>
				<div class="medium-4 columns">
				<div class="row calculater">
						<div class="small-block-grid-3">
																<a href="#" class="close close_button">&times;</a><br>
				
						</div>
						
						<div class="small-block-grid-3">
								<a href="#" class="tiny button  calc_button" button_value="1">1</a>
								<a href="#" class="tiny button  calc_button" button_value="2">2</a>
								<a href="#" class="tiny button  calc_button" button_value="3">3</a>
				
						</div>
						<div class="small-block-grid-3">
								<a href="#" class="tiny button  calc_button" button_value="4">4</a>
								<a href="#" class="tiny button  calc_button" button_value="5">5</a>
								<a href="#" class="tiny button  calc_button" button_value="6">6</a>
				
						</div>
						<div class="small-block-grid-3">
								<a href="#" class="tiny button  calc_button" button_value="7">7</a>
								<a href="#" class="tiny button  calc_button" button_value="8">8</a>
								<a href="#" class="tiny button  calc_button" button_value="9">9</a>
				
						</div>
						<div class="small-block-grid-3">
								<a href="#" class="tiny button  calc_button" button_value="0">0</a>
								<a href="#" class="tiny button   success ok" >✓</a>
								<a href="#" class="tiny button   alert clear " >X</a>
				
						</div>
			
				</div>		
				</div>
				<div class="small-4 columns  small-block-grid-4 payment">
		<!--		<a href="#" data-reveal-id="print_bill" class="tiny button  payment_button" id="payment_button" >PAY</a>
				<a href="#" data-reveal-id="print_bill" id="print_bill_button" class="tiny button  print_bill_button" >PRINT</a>
				<a href="#" class="tiny button  hold_button" >HOLD</a>
				<a href="#" class="tiny button  tot_button" id="tot_button" >TOTAL :</a>
				<a href="#" class="tiny button  tot_button_val" id="tot_button_val" >Rs .0</a>
				<a href="#" class="tiny button  cancel_button" id="cancel_button" >CANCEL</a>
				<a href="#" class="tiny button  to_kitchen_button" id="to_kitchen_button" >TO  KITCHEN</a>-->
				
				</div>
			
				</div>
		
				<input type="hidden" id="item_id_hidden">
		
				</div>
			</div>
	
		</div>

	
	</div>

</div>

