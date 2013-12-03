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
<td><input type="text"  value="<?php echo $item->name;?>" name="item" id="item" /></td>

<tr>

        
      <tr>
        <td>&nbsp;</td>
        <td><label for="list"></label>
          <select name="list" id="list">
        </select></td>
       
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" id="submit" value="Submit" />
        <input type="hidden" name="st_id" id="status_id" /></td>
       
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</form>

</body>
</html>