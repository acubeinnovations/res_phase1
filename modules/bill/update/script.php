<!--



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
	var item_det='';
	var item_id='';
	item_id=$(this).attr('item_id');
	item_det=$(this).attr('item_details');
	var item_details='';
	item_details=item_det.split("/");
	var bill_item_div='';
	for(i=0;i<item_details.length;i++){
	bill_item_div=bill_item_div+'<a href="#" class="tiny button bill_items" item_id="'+item_id+'">'+item_details[i]+'</a>&nbsp;';
	}
	$(".bill").append(bill_item_div);
	
	});
	
});

 -->
