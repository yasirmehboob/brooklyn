//update head start
$('#head').click(function(){
	var mydata = $("#form_head :input").serializeArray();
	if($("#form_head :input").val()!=""){
		$.post($("#form_head").attr("action"),
		 mydata, 
		 function(info){
		 //save message start
			$.gritter.add({
			title: 'BigBook Server Response!',
			text: info
			});
		//save message end
			if(info=='Successfully Shifted!'){
			setInterval(function(){window.location.reload(true)},3000);
			}
		});
	}//end if not empty
	else{
	$.gritter.add({
		title: 'BigBook Server Response!',
		text: 'Please Select the Options'
			});
	}
})
//end update head

//update subhead start
$('#sub').click(function(){
	var mydata = $("#form_sub :input").serializeArray();
	if($("#form_sub :input").val()!=""){
		$.post($("#form_sub").attr("action"),
		 mydata, 
		 function(info){
		 //save message start
			$.gritter.add({
			title: 'BigBook Server Response!',
			text: info
			});
		//save message end
			if(info=='Transactional Accounts Shifted!'){
			setInterval(function(){window.location.reload(true)},3000);
			}
		});
	}//end if not empty
	else{
	$.gritter.add({
		title: 'BigBook Server Response!',
		text: 'Please Select the Options'
			});
	}
})
//end update subhead

//rename head start
$('#re_head').click(function(){
	var mydata = $("#form_rehd :input").serializeArray();
	if($("#form_rehd :input").val()!=""){
		$.post($("#form_rehd").attr("action"),
		 mydata, 
		 function(info){
		 //save message start
			$.gritter.add({
			title: 'BigBook Server Response!',
			text: info
			});
		//save message end
			if(info=='Successfully Renamed!'){
			setInterval(function(){window.location.reload(true)},3000);
			}
		});
	}//end if not empty
	else{
	$.gritter.add({
		title: 'BigBook Server Response!',
		text: 'Please Select the Options'
			});
	}
})
//end rename head

//rename subhead start
$('#re_sub').click(function(){
	var mydata = $("#form_resub :input").serializeArray();
	if($("#form_resub :input").val()!=""){
		$.post($("#form_resub").attr("action"),
		 mydata, 
		 function(info){
		 //save message start
			$.gritter.add({
			title: 'BigBook Server Response!',
			text: info
			});
		//save message end
			if(info=='Successfully Renamed!'){
			setInterval(function(){window.location.reload(true)},3000);
			}
		});
	}//end if not empty
	else{
	$.gritter.add({
		title: 'BigBook Server Response!',
		text: 'Please Select the Options'
			});
	}
})
//end rename head

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

$("#rename_head").change(
function(){
var head_name=$('#rename_head option:selected').text()
$("#rename_head_new").val(head_name);
});

$("#rename_sub").change(
function(){
var sub_name=$('#rename_sub option:selected').text()
$("#rename_sub_new").val(sub_name);
});
