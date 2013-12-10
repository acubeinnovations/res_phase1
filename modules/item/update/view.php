

<?php
//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
?>

  <form id="form1" name="form1" method="post" action="">
  	<table>
  	
  	<tr><td colspan="2">Item </td></tr>
  		
	<tr><td colspan="2" align="right"><a href="item_list.php">List All</a> </td></tr>
		
		<tr>
			<td valign="top">Item name <span style="color:red;">*</span> </td>
			<td><input type="text"  value="" name="itemname" value="<?php echo $item->name; ?>" id="name" /></td>
		<tr>
		
			<tr><td> Rate  <input type="text"  value="<?php echo $item->rate; ?>" name="rate" id="name" /></td></tr>
			
			<tr><td>Tax  <input type="text"  value="<?php echo $item->tax;?>" name="tax" id="name" /></td></tr>
			
			
	<tr><td><input type="submit" name="submit" id="submit" value="Submit" />
        <input type="hidden" name="status_id" id="status_id" value=""/></td></tr>
       
       	<tr><td><input type="hidden" name="item_category_id" id="item_category_id" value=""/></td></tr>
       		
       	

  	</table>
  </form>