<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form id="form2" name="form2" method="post" action="">
  <table width="295" height="68" align="center">
    <tr>
      <td colspan="2" valign="top">Item Category List</td>
    </tr>
     <tr>
      <td>Id</td>
      <td>Item</td>
    </tr>
    <?php
	if($get_detl==false)
	{ 
	?>
     <tr><td colspan="6" >No records found </td></tr>
       <?php } else {
		   
		    $i=0;
			  while($i<$count){
		
		  ?> 
   
     <tr>
      <td><?php echo $get_detl[$i]['id']?></td>
      <td><a href="item_category.php?id=<?php echo $get_detl[$i]['id']?> "><?php echo $get_detl[$i]['name']?></a></td>
      
    </tr>
     <?php
		  $i++;
		  }
		   } ?>
  </table>
</form>
</body>
</html>