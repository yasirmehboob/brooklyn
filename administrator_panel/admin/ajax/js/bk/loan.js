//pad function
function pad(str, max) {
	  str = str.toString();
	  return str.length < max ? pad("0" + str, max) : str;
	}

// JavaScript Document
$(document).ready(function(e) {	

//change Customer start
$('#emp').change(function(){
		var empid=$('#emp').val();
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/emp_detail.php",
		data: { empid: empid},
		cache: false,
		dataType:'json',
		success: function(data)
			{
			$("#emp_detail").html(data.details);
			$("#sal").val(data.emp_sal);
			} 
		});
	});		
//change customers end-----------------
	
});//doc read end------------------------
