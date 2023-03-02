// JavaScript Document
$(document).ready(function(e) {
   
	var dataString ='';
	
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/new_head.php",
		data: dataString,
		cache: false,
		dataType:'json',
		success: function(data)
			{
			$("#acc_head").val(data.head);
			$("#acc_sub").val(data.subhead);
			} 
		});
	
	
//saving head
	$("#head_btn").click(function(){
		//updateing the value fields
		var dataString ='';
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/new_head.php",
		data: dataString,
		cache: false,
		dataType:'json',
		success: function(data)
			{
			$("#acc_head").val(data.head);
			$("#acc_sub").val(data.subhead);
			} 
		});
		//update end
		
	if($("#form_head :input").val()!=""){
	var mydata = $("#form_head :input").serializeArray();

	$.post($("#form_head").attr("action"), mydata, function(info){
		$.gritter.add({
		title: 'BigBook Server Response!',
		text: info
		});//message end
	});
	//clear fields
	$("#form_head :input").each(function() {
	    $(this).val('');
	})
	}
	else {
		$.gritter.add({
			title: 'BigBook Server Response!',
			text: "Please Fill Data"
		});//message end
		return false;}
		});	
//head saving end


//saving Sub-head
	$("#sub_btn").click(function(){
		//updateing the value fields
		var dataString ='';
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/new_head.php",
		data: dataString,
		cache: false,
		dataType:'json',
		success: function(data)
			{
			$("#acc_head").val(data.head);
			$("#acc_sub").val(data.subhead);
			} 
		});
		//update end
		
	if($("#form_sub :input").val()!=""){
	var mydata_2 = $("#form_sub :input").serializeArray();

	$.post($("#form_sub").attr("action"), mydata_2, function(info){
		$.gritter.add({
		title: 'BigBook Server Response!',
		text: info
		});//message end
	});
	//clear fields
	$("#form_sub :input").each(function() {
	    $(this).val('');
	})
	}
	else {
		$.gritter.add({
			title: 'BigBook Server Response!',
			text: "Please Fill Data"
		});//message end
		return false;}
		});	
//Sub-head saving end


//retrive head options
$('#refresh').click(function(){
	//updateing the value fields
	var dataString ='';
	$.ajax
	({
	type: "POST",
	url: "admin/ajax/php/new_acc_option.php",
	data: dataString,
	cache: false,
	success: function(html)
		{
		$("#head_option").html(html);
		$("#head_option").focus();
		} 
	});
});
//end retrival

//retrive head options
$('#refresh2').click(function(){
	//updateing the value fields
	var dataString ='';
	$.ajax
	({
	type: "POST",
	url: "admin/ajax/php/new_acc_option.php",
	data: dataString,
	cache: false,
	success: function(html)
		{
		$("#head_option2").html(html);
		$("#head_option2").focus();
		} 
	});
});
//end retrival



//when head change corespondance sub head retrive
$("#head_option2").change(
   function(){
	var id=$(this).val();
	var dataStringf = 'head_id='+id;
	
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/get_sub_head.php",
		data: dataStringf,
		cache: false,
		success: function(html)
			{
			$("#sub_options").html(html);
			} 
		});
	});
//end of change of head


//saving transactional acc
	$("#btn_mast").click(function(){
		
	if($("#form_mast :input").val()!=""){
	var mydata = $("#form_mast :input").serializeArray();

	$.post($("#form_mast").attr("action"), mydata, function(info){
		$.gritter.add({
		title: 'BigBook Server Response!',
		text: info
		});//message end
	});
	//clear fields
	$("#form_mast :input").each(function() {
	    $(this).val('');
	})
	}
	else {
		$.gritter.add({
			title: 'BigBook Server Response!',
			text: "Please Fill Data"
		});//message end
		return false;}
		});	
//transactional acc saving end

	 
});//doc read end

	
