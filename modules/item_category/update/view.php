<?php
//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
?>

  <form id="form1" name="form1" method="post" action="">
    <table >
      
      <tr>
<td colspan="2" class="page_caption">Item Category</td>
</tr>
<tr>
<td colspan="2" align="right"><a href="item_categories.php">List All</a> &nbsp;</td>
</tr>
<tr>
<td valign="top">Category name <span style="color:red;">*</span> &nbsp;</td>
<td><input type="text"  value="<?php echo $item_category->name;?>" name="name" id="name" /></td>

<tr>

        
      <tr>
        <td>&nbsp;</td>
        <td><label for="listitem"></label>
        
          <?php echo populate_list_array("lstitem_category", $arr_item_category, 'id', 'name', $item_category->parent_id,$disable=false);
?></td>
       
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" id="submit" value="Submit" />
        <input type="hidden" name="h_id" id="h_id" value="<?php echo $item_category->id ?>"  /></td>
       
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</form>

</body>
</html>