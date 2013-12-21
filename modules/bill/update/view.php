<div id="openedbills" class="reveal-modal" data-reveal>  </div>
<div id="print_bill" class="reveal-modal" data-reveal><a class="close-reveal-modal">&#215;</a><div id='printable-area'></div> <a href="#" class="tiny button  print_div" id= "print_div">PRINT</a></div>
<div id="calculater_div" class="reveal-modal calc" data-reveal>
<a class="close-reveal-modal" id="close_calc_modal">&#215;</a>
				<div class="row">
					<div class="medium-12 columns">
						<div class="medium-3 columns">&nbsp;
						</div>
						<div class="medium-8 columns">
							
								<div class="medium-block-grid-6">
										<a href="#" class="tiny button  calc_button" button_value="1">1</a>
										<a href="#" class="tiny button  calc_button" button_value="2">2</a>
										<a href="#" class="tiny button  calc_button" button_value="3">3</a>
				
								</div>
								<div class="medium-block-grid-6">
										<a href="#" class="tiny button  calc_button" button_value="4">4</a>
										<a href="#" class="tiny button  calc_button" button_value="5">5</a>
										<a href="#" class="tiny button  calc_button" button_value="6">6</a>
				
								</div>
								<div class="medium-block-grid-6">
										<a href="#" class="tiny button  calc_button" button_value="7">7</a>
										<a href="#" class="tiny button  calc_button" button_value="8">8</a>
										<a href="#" class="tiny button  calc_button" button_value="9">9</a>
				
								</div>
								<div class="medium-block-grid-6">
										<a href="#" class="tiny button  calc_button" button_value="0">0</a>
										<a href="#" class="tiny button   success ok" >✓</a>
										<a href="#" class="tiny button   alert clear " >X</a>
				
								</div>
							</div>
						<div class="medium-2 columns">&nbsp;
						</div>
					</div>
				</div>	
 </div>
<div id="discount_calculater_div" class="reveal-modal discount_calc" data-reveal>
<a class="close-reveal-modal" id="close_calc_modal">&#215;</a>
				<div class="row">
					<div class="medium-12 columns">
						<div class="medium-3 columns">&nbsp;
						</div>
						<div class="medium-8 columns">
							
								<div class="medium-block-grid-6">
										<a href="#" class="tiny button  discount_calc_button" button_value="1">1</a>
										<a href="#" class="tiny button  discount_calc_button" button_value="2">2</a>
										<a href="#" class="tiny button  discount_calc_button" button_value="3">3</a>
				
								</div>
								<div class="medium-block-grid-6">
										<a href="#" class="tiny button  discount_calc_button" button_value="4">4</a>
										<a href="#" class="tiny button  discount_calc_button" button_value="5">5</a>
										<a href="#" class="tiny button  discount_calc_button" button_value="6">6</a>
				
								</div>
								<div class="medium-block-grid-6">
										<a href="#" class="tiny button  discount_calc_button" button_value="7">7</a>
										<a href="#" class="tiny button  discount_calc_button" button_value="8">8</a>
										<a href="#" class="tiny button  discount_calc_button" button_value="9">9</a>
				
								</div>
								<div class="medium-block-grid-6">
										<a href="#" class="tiny button  discount_calc_button" button_value="0">0</a>
										<a href="#" class="tiny button   success ok_discount" >✓</a>
										<a href="#" class="tiny button   alert clear_discount " >X</a>
				
								</div>
							</div>
						<div class="medium-2 columns">&nbsp;
						</div>
					</div>
				</div>	
 </div>




<div class="row">

<div class="medium-12 columns counter">
<br>
	  <div class="medium-2 columns ">

		<div class=" categories" align="center" >
			<?php if(isset($array_item_category)){ $item_index=0; while($item_index<count($array_item_category)) {?>
				<a href="#" class="tiny button success  item_category " item_id="<?php echo $array_item_category[$item_index]['id'];?>"><b><?php echo $array_item_category[$item_index]['name']; ?></b></a>
				<?php $item_index++; } } ?>

			 </div>
	  </div>

	  
		
		<div class="medium-5 columns " id="item-container">
		  <div class="items" >
			
				<?php if($get_item_sub!=false){
			$count = count($get_item_sub);
			$item_index=0;
					while($item_index<$count){ ?>
			<a href="#" class="tiny button items" item_id="<?php echo $get_item_sub[$item_index]['id']; ?>" item_details="<?php echo $get_item_sub[$item_index]['name'].'/'.$get_item_sub[$item_index]['rate'].'/'.$get_item_sub[$item_index]['tax'];?>"><b><?php echo $get_item_sub[$item_index]["name"].'<br>  Rs .'.$get_item_sub[$item_index]["rate"]; ?></b></a>
		<?php
		$item_index++;
		 } 
		}
				?>

		 
		 </div>
		</div>
		
		  <div class="medium-4 columns" id="bill-container">
				
								
				<div class="payment" id="payment">
					
					<?php if($bill_status==BILL_STATUS_BILLED) {?>
					<a href="#"  class="tiny button   payment_button " id="payment_button" >PAY</a>
					<a href="#" class="tiny button   hold_button" >HOLD</a>
					 <a href="#" class="tiny button  cancel_button" id="cancel_button" >CANCEL</a>
				
					<?php }else if($bill_status==BILL_STATUS_PAID){ ?>
					<a href="#" data-reveal-id="print_bill" id="print_bill_button" class="tiny button  print_bill_button" ><b>PRINT</b></a>
					 <a href="#" id="new_bill" class="tiny button  new_bill" ><b>NEW BILL</b></a>
				
					<?php }else if($bill_status==''){ ?>
					<a href="#"  class="tiny button success   payment_button " id="payment_button" ><b>PAY</b></a>
					 <a href="#" class="tiny button   hold_button " ><b>HOLD</b></a>
					<a href="#" class="tiny button alert   cancel_button " id="cancel_button" ><b>CANCEL</b></a>
					<?php } ?>
				</div>
				
				
				
					<div class="medium-4 columns bill">

					</div>
				
				<div id="bill_det" >
						<a href="#" class="tiny  button bill_number" >BILL:<?php echo $_SESSION['bill_number'];?> </a>
                        <a href="#" class="tiny  button discount" id="discount" >Discount :Rs. 0</a>
						<a href="#" class="tiny  button tot_button_val" id="tot_button_val" ><strong>TOTAL : Rs .0</strong></a>

					
				</div>
				<input type="hidden" class="bill_discount" id="bill_discount" />
				<input type="hidden" id="item_id_hidden">
				<a href="#" data-reveal-id="calculater_div" id="calculater_modal"></a>
				<a href="#" data-reveal-id="discount_calculater_div" id="discount_calculater_modal"></a>
	  </div>
	 </div>

  </div>
  </div>


