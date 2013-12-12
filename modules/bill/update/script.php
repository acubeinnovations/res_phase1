<!--

var current_url = "<?php echo $current_url; ?>";

$(document).ready(function(){

	$( document ).on( "click", ".item_category", function() {
	var item_id=$(this).attr('item_id');
	var success_post = $.post('item_by_category.php',
		{
			item_id:item_id,
		});
	success_post.done(function(data){
		if(data!='1'){
			$(".items").html(data);
		}else{
			$(".items").html("");
		}
		});
	
	});
	
	$( document ).on("click", ".items", function() {
	var item_id='';
	item_id=$(this).attr('item_id');
	
	var success_post = $.post('add_to_bill.php',
		{
			item_id:item_id,
		});
	success_post.done(function(data){
		if(data!=''){
			if (data.indexOf('!@#$%*') >= 0){
			var bill_items=data.split('!@#$%*');
			$('#item_quantity'+bill_items[0]).val(bill_items[1]);
			$('#item_rate'+bill_items[0]).html(bill_items[2]);
			}else{
			$(".bill").append(data);
			}
		}else{
			$(".bill").html("");
		}
		});
	
	});

	$( document ).on("focus", ".item_quantity", function() {alert("hi");
	item_id=$(this).attr('item_id');
	$(".calculater").show();
	$("#item_id_hidden").val(item_id);
	});
	

	
	
});

 -->
