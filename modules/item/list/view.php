<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form id="form2" name="form2" method="post" action="">
<fieldset>
    <legend>Item List</legend>

   <table width="295" height="68" align="center">


    <tr>
      <td colspan ="3" valign ="top">item</td>
    </tr>

    <tr>
      <td>Id</td>
      <td>Item</td>
      <td colspan="3">item Category</td>
      <td>Rate</td>
      <td>Tax</td>
    </tr>

        <?php 
            if($get_item==false)
          { ?>

      <tr> 
        <td> No Records Found</td>
      </tr>

       <?php } else {
        $i=0;
        while($i<$count){
         ?> 

    <tr>
       <td><?php echo $get_item[$i]['id']; ?></td>
       <td><a href="item.php?id=<?php echo $get_item[$i]['id'] ?>"><?php echo $get_item[$i]['name']?></a></td>
       <td colspan="2"><?php if(isset($array_item_category[$get_item[$i]['item_category_id']])){echo $array_item_category[$get_item[$i]['item_category_id']] ;}?></td>
       <td colspan="2"> <?php echo $get_item[$i]['rate'] ;?></td>
       <td colspan="2"><?php echo $get_item[$i]['tax'] ;?></td>

   </tr>

    <?php $i++; 
          }
          }
           ?>

       

</table>
    </form>
   </body>
   </html>

   
