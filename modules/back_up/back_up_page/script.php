<!--

var current_url = "<?php echo $current_url; ?>";
var server_url="/../../restaurant_admin.local/sync/sync.php";
$(document).ready(function() {

	$( document ).on("click", ".backup", function() {
	var backup='backup';
	var success_post = $.post('backup.php',
		{
			backup:backup,
		});
	success_post.done(function(data){
		/* if(data!=''){alert(data);
			var i=0;
			if (data.indexOf('!@#$%*') >= 0){
			var sql=data.split('!@#$%*');
			
			for(i=0;i<sql.length;i++){
				var query=sql[i];
				
				//new ajax-start
				var data = "url=restaurant_admin.local/sync/sync.php?query="+query;             

				$.ajax({
				  url: "post_data_to_server.php",
				  data: data,
				  type: "POST",
				  success: function(data, textStatus, jqXHR){
					console.log('Success ' + data);
				  },
				  error: function (jqXHR, textStatus, errorThrown){
					console.log('Error ' + jqXHR);
				  }
				});
				//end

			
			
				var success_post = $.post(server_url,
				{
					query:query,
				});
			success_post.done(function(data){
				if(data>'0'){
						//change sync to true
				}else{
					
				}
				});
			
			}
			}else{
			var query=data;
				var success_post = $.post(server_url,
				{
					query:query,
				});
			success_post.done(function(data){
				if(data>'0'){
						//change sync to true
				}else{
					
				}
				});
			}
		}else{
			alert("All data sync");
		}
		*/
		});
		
	

	});

	
});

 -->
