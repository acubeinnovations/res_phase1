
<div class="panel"><p>
<div class="row">
    <div class="large-2 columns">
      <label for="search"> Search by Item:<input type="text" name="search" />
      <input type="submit" name="submit" value="Submit" />
    </div>
  </div>
</div>


      <div class="panel">  Category</p>
        <div class="row">
          <div class="large-4 columns">   
        </div>
    
    <?php
      if($get_item==false)
     { ?>

     <div class ="large-3 columns">
      <div class="row">
       <label> No Records Found</label> 
        </div>
        </div>

 <?php } else {
        $i=0;
      while($i<$count){
         ?>

    <div class="small-2 columns"><?php if(isset($array_item_category[$get_item[$i]['item_category_id']])){echo $array_item_category[$get_item[$i]['item_category_id']] ;}?></div> 
    <div class="small-2 columns">
      <?php $i++;
          }
          }
           ?></div>
    
       </div>
   
      
    </form>   

