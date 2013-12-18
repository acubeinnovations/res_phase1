

<?php
//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
?>
	<form data-abide target="_self" method="post" action="" name="frmlogin">
	<fieldset>
    <legend>Item</legend>
	<div class="row">
		<div class="large-4 columns">
		</div>
	</div>


	<div class="row">
		<div class="large-4 columns">

		   <label for="Itemname">Item Name <small>required</small></label>
		  <input placeholder=""  required pattern="[a-zA-Z]+"  type="text" name="name" value="<?php echo $item->name; ?>"/ >
		  <small class="error">Please Enter Item Name.</small>
		</div>
	</div>


	<div class="row">
		<div class="large-4 columns">
		  <label for="listitemcat">Item Category <small>required</small></label>
		<td><?php echo populate_list_array("listitem", $arr_item_category, 'id','name', $item->item_category_id,$disable=false);?></td>
			<small class="error"> Select Item category.</small></td>
		</div>
	</div>


<div class="row">
		<div class="large-4 columns">
			<label for="rate">Rate </label>
		  <input placeholder=""  type="text" name="rate" value="<?php echo $item->rate; ?>" id= "name"/ >
		  <small class="error">Please Enter Rate.</small>
		</div>
	</div>

  <div class="row">
		<div class="large-4 columns">
		   <label for="Tax">Tax </label>
		  <input placeholder=""  type="text" name="tax" value="<?php echo $item->tax;?>" id= "name"/ >
		</div>
	</div>

  <div class="row">
	 <div class="large-4 columns">
      <label for ="status_id">Status</label>
      <select name ="status_id">
        <option value="1">Active</option>
        <option value="0">Invactive</option>
      </select>
     </div>
  </div>

  <div class="row">
	<div class="large-4 columns">

   			<label for="chkmaster">Master </label>
   			<?php if($item->from_master_kitchen == 1) {?>
   			<input id="chk" type="checkbox" value="1" name="chkmaster" checked="checked">

    		<?php } else { ?>
   			  <input id="chk" type="checkbox" value="0" name="chkmaster">
 			 </div>
			  <?php } ?>
		<div class="row">
		<div class="large-4 columns">
			<input class="small button" value="submit" type="submit" name="submit" >
		</div>
		</div>


	</fieldset>
</form>	
