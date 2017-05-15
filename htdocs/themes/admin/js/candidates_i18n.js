var ajaxURL = $("#ajaxBaseURL").val();
function deleteImage(deleteId) {
	if(confirm("Are you sure you want delete this file?")) {
        $.ajax({
            url : ajaxURL + "/delete_image",
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
					$('input[name=h_importresume]').val('');					 
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
	
	function assignCandidates(cId){ 
		var popup_joborder_id = $("#popup_joborder_id_"+cId).val();
		var popup_client_id = $("#popup_client_id_"+cId).val();
		
		$.ajax({
            url : ajaxURL + "/assign_candidate",
            type: 'post',
            cache: false,
			dataType: "json",
            data: {'popup_joborder_id':popup_joborder_id,'popup_client_id':popup_client_id,'candidate_id':cId},
            beforeSend : function() {
                //blockUI('#property_frm');
            },
            success : function(data) {
				 if(data == 0) {
					 $(".assign-message-popup-false").show();
					 setTimeout(function(){ $(".assign-message-popup-false").hide();  }, 2000);
				 } else {
					$(".assign-message-popup").show();
					setTimeout(function(){ $('#assign-'+cId).modal('toggle');  $(".assign-message-popup").hide(); }, 2000);
				 }
								 
            },
            complete : function() {
                //unblockUI('#property_frm');
            }
        });
		
	}
	
	function addNotes(cadidateId,jobId){
		
	    var candidate_status_id = $("#candidate_status_id_"+cadidateId).val();
		var notes = $("#notes_"+cadidateId).val();
		
		$.ajax({
            url : ajaxURL + "/candidate_notes",
            type: 'post',
            cache: false,
			dataType: "json",
            data: {'candidate_status_id':candidate_status_id,'notes':notes,'cadidateId':cadidateId,'jobId':jobId},
            beforeSend : function() {
                //blockUI('#property_frm');
            },
            success : function(data) {
				 $(".assign-message-popup").show();
				 setTimeout(function(){ $('#modal-'+cadidateId).modal('toggle');$(".assign-message-popup").hide();  }, 2000); 
            },
            complete : function() {
                //unblockUI('#property_frm');
            }
        });
		
	}
	
	function getJobsList(clientId){
		var popup_client_id = $("#popup_client_id_"+clientId).val(); 
		 $.ajax({
            url : ajaxURL + "/getClietWiseJobList",
            type: 'post',
            cache: false,
			dataType: "html",
            data: {'popup_client_id':popup_client_id},
            beforeSend : function() {
                //blockUI('#property_frm');
            },
            success : function(data) { 
				 $("#popup_joborder_id_"+clientId).html(data); 
            },
            complete : function() {
                //unblockUI('#property_frm');
            }
        });
	}
 