var ajaxURL = $("#ajaxBaseURL").val();
$(document).ready(function() {
  
});

function deleteImage(deleteId) {
	if(confirm("Are you sure you want delete this file?")) {
        $.ajax({
            url : ajaxURL + "/client_logo_delete",
            type: 'post',
            cache: false,
			dataType: "json",
            data: {'deleteId': deleteId},
            beforeSend : function() {
                //blockUI('#property_frm');
            },
            success : function(data) {
                 if(data.response) { 
					$(".martop20 a").remove(); 
					$('input[name=h_client_logo]').val('');					 
                } else {
                    alert('Failed To Delete File');
                } 
                    
            },
            complete : function() {
                //unblockUI('#property_frm');
            }
        });
	 }
	 
    }
 
