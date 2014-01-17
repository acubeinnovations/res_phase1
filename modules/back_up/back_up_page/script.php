<!--

var current_url = "<?php echo $current_url; ?>";
var server_url="<?php echo SERVER_URL; ?>";
$(document).ready(function() {
	$( document ).on("click", ".backup", function() {
	var backup='backup';
	var success_post = $.post('backup.php',
		{
			backup:backup,
		});

	success_post.done(function(data){alert(data);
		if(data!=''){
			$('#message').show();
			var i=0;
			if (data.indexOf('!@#$%*') >= 0){
			var sql=data.split('!@#$%*');
			for(i=0;i<sql.length;i++){
				var query_row=sql[i];
				var success_post1 = $.post('post_data_to_server_encode.php',
				{
					query:query_row,
				});
			success_post1.done(function(data1){
				var data_array=data1.split('!@#$%*');
				query_encoded=data_array[0];
				var id=data_array[2];
				var table=data_array[1]; 
			
				var success_post3 = $.post(server_url,
				{
					query:query_encoded,
					id:id,
					table:table,
				});
				success_post3.done(function(data3){
				
						//change sync to true
						if(data3==-1){
						}else{
						var success_post = $.post('post_data_to_server_encode.php',
						{
							id:id,
							table:table,
						});
						}
						
				
				});
				
				});
				}
				
			}else{
			var query_row=data;
			var success_post1 = $.post('post_data_to_server_encode.php',
				{
					query:query_row,
				});
			success_post1.done(function(data1){
				var data_array=data1.split('!@#$%*');
				query_encoded=data_array[0];
				var id=data_array[2];
				var table=data_array[1]; 
			
				var success_post3 = $.post(server_url,
				{
					query:query_encoded,
					id:id,
					table:table,
				});
				success_post3.done(function(data3){
				
						//change sync to true
						if(data3==-1){
						}else{
						var success_post = $.post('post_data_to_server_encode.php',
						{
							id:id,
							table:table,
						});
						}
						
				
				});
				
				});
				
			}
			$(document).ajaxStop(function () {
			$('#message').hide();
			popup_alert("All data Sychronized successfully..!","dashboard.php","ok","false");
			});
		}else{
			popup_alert("Already Sychronized..!","dashboard.php","ok","false");
		}
		
		});
		
	

	});

	
});

 -->
