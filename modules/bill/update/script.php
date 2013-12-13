<!--

var current_url = "<?php echo $current_url; ?>";

$(document).ready(function(){
	var refresh="refresh";
	var success_post = $.post('page_refresh_bill.php',
		{
			refresh:refresh,
		});
	success_post.done(function(data){
		if(data!='1'){
			$(".bill").html(data);
		}else{
			$(".bill").html('&nbsp');
		}
		});
	


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
			$(".items").html("&nbsp;");
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

	$( document ).on("focus", ".item_quantity", function() {
	item_id=$(this).attr('item_id');
	$(".calculater").show();
	$("#item_id_hidden").val(item_id);
	});
	
	$( document ).on("click", ".calc_button", function() {
	item_id=$("#item_id_hidden").val();
	button_value=$(this).attr('button_value');
	var qty='';
	if($('#item_quantity'+item_id).val()!=''){
	var old_qty=$('#item_quantity'+item_id).val();
	qty=(old_qty*10)+Number(button_value);
	}else{
	qty=qty+Number(button_value);
	}
		$('#item_quantity'+item_id).val(qty);
	});

	$( document ).on("click", ".clear", function() {
	item_id=$("#item_id_hidden").val();
	$('#item_quantity'+item_id).val('');
	});
	
	$( document ).on("click", ".ok", function() {
	item_id=$("#item_id_hidden").val();alert($('#item_quantity'+item_id).val());
	if($('#item_quantity'+item_id).val()==''){
	$('.myalert').html('Item quantity should not be null.<a href="#" class="close">&times;</a>');
	$('.myalert').show();
	}else{
	var qty=$('#item_quantity'+item_id).val();
	var success_post = $.post('add_to_bill.php',
		{
			item_id:item_id,
			qty:qty,
		});
	success_post.done(function(data){
		if(data!=''){
			if (data.indexOf('!@#$%*') >= 0){
			var bill_items=data.split('!@#$%*');
			$('#item_quantity'+bill_items[0]).val(bill_items[1]);
			$('#item_rate'+bill_items[0]).html(bill_items[2]);
			}
	}
	});
	$(".calculater").hide();
	}
	});
	
	$( document ).on("click", ".close_button", function() {
	$(".calculater").hide();
	});
	$( document ).on("click", ".hold_button", function() {
	var hold='hold';
	var success_post = $.post('hold_bill.php',
		{
			hold:hold,
		});
	success_post.done(function(data){
		if(data=='1'){
			$(".bill").html('&nbsp');
			alert("bill holded");
		}else{
			alert("bill cannot be holded");
		}
		});
	
	});
	
	
	
});

 -->
