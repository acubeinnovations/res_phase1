<!--

$(document).ready(function(){

$( document ).on("click", ".print_bill_button", function() {
	var  bill_id=$(this).attr('bill_id');
	var print='print';
	var success_post = $.post('list_bill.php',
		{
			print:print,
			bill_id:bill_id,
		});
	success_post.done(function(data){
		$('#print_bill').html(data);
		});
	
	
	});
});
 -->
