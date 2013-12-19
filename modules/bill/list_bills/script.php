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

$("#opened_bills").click(function() {
	alert('h');
	var opened='opened';
	var success_post = $.post('opened_bills.php',
		{
			opened:opened,
		});
	success_post.done(function(data){
		$('#openedbills').html(data);
		});
	
	
	});

	$( document ).on("click", ".opened_bill_id", function() {
	var bill_id=$(this).attr('bill_id');
	var success_post = $.post('opened_bills.php',
		{
			bill_id:bill_id,
		});
	success_post.done(function(data){
		if(data==0){
		location.reload();
		}
		});
	
	
	});
 -->
