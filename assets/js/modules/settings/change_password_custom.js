$(document).ready(function(){
	base_url = window.location.origin+'/heilmittel/';
	$("#submit").click(function() {  
	    $.ajax({
	        type: "POST",
	        url: base_url+"admin/settings/samplefunc", 
	        data: {'name': 'divyang'},
	        dataType: "text",  
	        cache:false,
	        success: function(res) {
	            alert(res);  //as a debugging message.
	        }
	    });// you have missed this bracket
	    return false;
	});
})