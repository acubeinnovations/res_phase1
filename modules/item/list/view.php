<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

 <form id="form1" name="form1" method="post" action="">
<table width="295" height="68" align="center">
	  <tr>
      <td colspan="3" valign="top">Item List</td>
    </tr>
	 <tr>
      <td>Id</td>
      <td>Item</td>
    </tr>
    <?php
    if(get_item==false){ ?>

    	<tr><td>No Records Found</td></tr>

    	<?php }else { ?>
    	$i=0;
    	while($i<count) {?>
    	<td><tr> <?php echo get_item[$i]['id']; ?></td></tr>
   
</table>
 	</form>
 </body>
 </html>