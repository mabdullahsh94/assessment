jQuery(document).ready(function(){

	jQuery('#fetch_posts_button').click(function(){
		jQuery.ajax({
			method: 'POST',
			type: "post",
			dataType: "json",
			url: ajax_object.ajax_url,
			data: {
				action:'fetch_projects',

			},
			dataType: 'json',
			success: function(response){
				//check the network tab in a browser to see the output
				console.log(response);

				
			}
		});
	});
	
});