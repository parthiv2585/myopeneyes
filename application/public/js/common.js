/*
		
	This function use for if user press enter then focus on next control

*/
$('input').on("keypress", function(e) {
	/* ENTER PRESSED*/
	if (e.keyCode == 13) {
		/* FOCUS ELEMENT */
		var inputs = $(this).parents("form").eq(0).find(":input");
		var idx = inputs.index(this);

		if (idx == inputs.length - 1) {
			inputs[0].select()
		} else {
			inputs[idx + 1].focus(); //  handles submit buttons
			inputs[idx + 1].select();
		}
		return false;
	}
});

/*
	@param1 : Table name 
	@param2 : Table column name
	@param3 : Value
	@param4 : Control Name
	@param5 : PK columm Name
	@param6 : PK columm value
	@return : Number of recored in table 

*/
function checkValueExist(tableName,columnName,value,controlName,pkColumn,pkColumnValue){
	var url = "/openeyes/resume/checkValueExist"; 
	$.ajax({
		   url: url,
		   type: "POST",
		   dataType:"json",				   
		   data:{tableName:tableName , columnName:columnName , value:value , pkColumn:pkColumn , pkColumnValue:pkColumnValue },
			success: function(data){ 
				if(data.status=="sucess"){ 
					 if(data.numberOfexist > 0){
						$("#"+controlName).val('');
						$("#"+controlName).addClass('ui-state-error h5-active');
					 }
				} else { $("#"+controlName).removeClass('ui-state-error h5-active'); }					
			} 
	}); 
	 
}


