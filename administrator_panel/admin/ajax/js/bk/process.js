// JavaScript Document
$(document).ready(function(e) {
   $("#rack").change(
   function(){
	var id=$(this).val();
	var dataString = 'id='+id;
	
		$.ajax
		({
		type: "POST",
		url: "../ajax/php/get_file.php",
		data: dataString,
		cache: false,
		success: function(html)
			{
			$("#file").html(html);
			} 
		});
	
	});
//rack change end

$("#file").change(
   function(){
	var id=$(this).val();
	var dataStringf = 'fid='+id;
	
		$.ajax
		({
		type: "POST",
		url: "../ajax/php/get_section.php",
		data: dataStringf,
		cache: false,
		success: function(html)
			{
			$("#section").html(html);
			} 
		});
	
	});	
	
	
	 
});
	
