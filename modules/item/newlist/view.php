
      
<?php echo "<pre>"; ?>
<?php print_r($array_category);?>
    <?php echo "<pre>"; ?>
<?php

    $array_items=$array_category[$i]["items"];
    $count_item=count($array_item);
    $j=0;
      while($i<$count_item){
        echo $array_items[$j]['name'];
        $j++;
    }

    ?>

 
     
    
       
   
      


