
<div class="row parent">
	
	<div class="large-12 columns">
		<br>
		<div class="large-2 columns">
		<?php $item_index=0; while($item_index<count($array_item_category)) {?>
		<a href="#" class="small button fixed item_category success" item_id="<?php echo $array_item_category[$item_index]['id'];?>"><?php echo $array_item_category[$item_index]['name']; ?></a>
		<?php $item_index++; } ?>
		</div>
		<div class="large-4 columns items">
				
		</div>
		<div class="large-4 columns">
		<div class="row"><div class="large-4 columns bill">
		
		</div>
		</div>
		<div class="row calculater">
			
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
						<a href="#" class="tiny button  calc_button success" >✓</a>
						<a href="#" class="tiny button  calc_button alert" >X</a>
				
				</div>
			
		</div>
		<input type="hidden" id="item_id_hidden">
		
		</div>
	</div>
	
</div>



