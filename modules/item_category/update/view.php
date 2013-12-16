<?php
//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
?>

    <form data-abide target="_self" method="post" action="<?php echo $current_url?>" name="frmlogin">
       <fieldset>
        <legend>Item Category</legend>
            <div class="row">
            <div class="large-4 columns">
           <small><?php echo $msg;?></small>
         <a href="item_categories.php">List All</a>
    </div>
  </div>

  <div class="row">
    <div class="large-4 columns">
       <label for="Category Name">Category Name<small>required</small></label>
      <input placeholder=""  required pattern="[a-zA-Z]+"  type="text" name="name" id="name" value="<?php echo $item_category->name;?>">
       <small class="error">Enter Category</small>
    </div>

      <div class="row">
      <div class="large-4 columns">
       <label for="listitem"><small>required</small></label>
         <small class="error">Select Item.</small>
      <?php echo populate_list_array("lstitem_category", $arr_item_category, 'id', 'name', $item_category->parent_id,$disable=false);
?></td>
    
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
      <input class="small button" value="submit" type="submit" name="submit" id="submit" >
    </div>
  </div>

</fieldset>
</form>




</div>


