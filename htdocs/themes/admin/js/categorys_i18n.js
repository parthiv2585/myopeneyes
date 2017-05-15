var ajaxURL = $("#ajaxBaseURL").val();
$(document).ready(function() {
	
  $("input[name=category_name]").blur(function(){
	  var cname = $("input[name=category_name]").val();
	  
	  if(cname != "" && cname != $("input[name=hcategory_name]").val() ) {
		  
		  $.ajax({
				url : ajaxURL + "/check_category_name",
				type: 'post',
				cache: false,
				dataType: "json",
				data: {'name': $(this).val(),'current' : $("input[name=hcategory_name]").val()},
				beforeSend : function() {
				   $(".loader").show();
				},
				success : function(data) {					
					 if(data == "1") {  
						 $("input[name=category_name]").val('');			 
					}   
				},
				complete : function() {
				   $(".loader").hide();
				}
			});
		
		}// End if
		
	}); 
	
  
});

 
 