

<?php
//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
?>

  <form id="form1" name="form1" method="post" action="">
  	<table>
  	

  	<tr>
  		<td colspan="2">Item </td>
  	</tr>
  		
	<tr>
		<td colspan="2" align="right"><a href="items.php">List All</a> </td>
	</tr>
		
	<tr>
		<td valign="top">Item name <span style="color:red;">*</span> </td>
		<td><input type="text"  name="itemname" value="<?php echo $item->name; ?>" id="name" /></td>
	</tr>

		
	<tr>
		<td><label for="listitemcat">Item Category</lable></td>
		<td><?php echo populate_list_array("listitem", $arr_item_category, 'id','name', $item->item_category_id,$disable=false);?></td>
	</tr>
		
	<tr>
		<td><label>Rate</lable></td>
		<td><input type="text"  value="<?php echo $item->rate; ?>" name="rate" id="name" /></td>
	</tr>

	<tr>
		<td><label>Tax</lable></td>
		<td><input type="text"  value="<?php echo $item->tax;?>" name="tax" id="name" /></td>
	</tr>
	
	<tr>
		<td><input type="submit" name="submit" id="submit" value="Submit" /><input type="hidden" name="status_id" id="status_id" value=""/></td>
    </tr>
       
  	</table>
  </form>