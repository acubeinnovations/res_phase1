<div class="row">

<?php
	if($array_bills != false){
	$bill_index=0;
	if ($count>0)
	while($bill_index<count($array_bills)){ 
  ?>

  <ul class="pricing-table">
  <li class="title">Order <?php echo $array_bills[$bill_index]["bill_number"] ?></li>
<?php

$mybillitems=new BillItems($myconnection);
$mybillitems->connection=($myconnection);
$mybillitems->bill_id = $array_bills[$bill_index]["id"];
$mybillitems->bill_item_status_id = BILL_ITEM_STATUS_ACTIVE;
//$mybillitems->bill_kitchen_status_id = BILL_KITCHEN_STATUS_TO_KITCHEN;
$array_bill_items = $mybillitems->get_list_array_bylimit();
$slno=1;
$bill_item_index = 0;

while($bill_item_index<count($array_bill_items)){ 
?>
  		<a href="update_kitchen_item_status.php?id=<?php echo $array_bill_items[$bill_item_index]["id"] ?>"><li class="bullet-item"><?php if (isset( $array_item[$array_bill_items[$bill_item_index]['item_id']])) echo $array_item[$array_bill_items[$bill_item_index]['item_id']]?> (<?php echo $array_bill_items[$bill_item_index]['quantity']?>)</li></a>

<?php
	$slno++;
	$bill_item_index++;
}
?>

	 <li class="cta-button">&nbsp;<a href="update_kitchen_status.php?id=<?php echo $array_bills[$bill_index]["id"] ?>" class="button tiny">Finish</a></li>
  </ul>
 	<?php
		$bill_index++;
		
	}
	}
	?>
</div> 