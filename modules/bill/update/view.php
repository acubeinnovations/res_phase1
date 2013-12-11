
<div class="row">
	
	<div class="large-12 columns">
		<br>
		<div class="large-2 columns">
		<?php $item_index=0; while($item_index<count($array_item_category)) {?>
		<a href="#" class="small button fixed item_category success" item_id="<?php echo $array_item_category[$item_index]['id'];?>"><?php echo $array_item_category[$item_index]['name']; ?></a>
		<?php $item_index++; } ?>
		</div>
		<div class="large-4 columns items">
				
		</div>
		<div class="large-4 columns bill">
		
		</div>
	</div>
</div>



