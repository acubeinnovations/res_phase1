    <div class="row">
     	 <div class="medium-12 columns">
			<h1>Orders</h1>
       		 <div class="row">
			<hr /> 	<?php
				$slno=1;
				$bill_index=0;
				while($bill_index<count($bills)){ ?>
			<div class="medium-10 column">
		
			<p><b> <?php echo $slno?>  </b> &nbsp;&nbsp;<a href="#" class="button tiny success">Accept</a>&nbsp;<a href="#" class="button tiny alert">Reject</a>&nbsp;<b> &nbsp;&nbsp;<u>Items Ordered</u>:<b><?php echo $item_name[$data_bill_items[$bill_index]['item_id']]?>&nbsp;&nbsp;
			
			Status : <?php //echo $item_name[$data_bill_items[$bill_index]['bill_kitchen_status_id']]?></b>  <b> 
			</p>	<hr />
			
    		 </div>
			 			
				<?php
				$bill_index++;
				$slno++;
				}?>
			 
			

			<div class="medium-2 column">&nbsp;
			</div>	 
			  </div>

			

			 
    	</div>
    </div>