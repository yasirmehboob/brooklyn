//send data to sv.php file
$("#sv").click(function(){
	if($("#form :input").val()!=""){
		//check requried fields
		if($('.check').val()==''){
			$(this).focus();
			$.gritter.add({
            title: 'BigBook Server Response!',
            text: 'Please fill the required fields.'});
			}
			else{
				var acc_title=$("#acc_title").val();
				var mydata = $("#form :input").serializeArray();
				var url = $("#form").attr("action")+acc_title;
					if($('#cust_type').val()=='credit'){
						url+='&auto_acc=true';
						var data_type="json";
					}else{
						url+='&auto_acc=false';
						var data_type="text";
					}				
				$.ajax
					({
					type: "POST",
					url: url,
					data: mydata,
					cache: false,
					dataType:data_type,
					success: function(data)
						{
						if(data.action=="success"){
							var new_url='admin/ajax/php/up_cust_sup_acc_nm.php?acc_nm='+data.acc_nm+'&title='+data.title;
						}else{
							var new_url='admin/ajax/php/up_cust_sup_acc_nm.php?acc_nm='+$('#acc_nm_cash').val()+'&title='+$('#acc_title').val();
						}
							$.ajax({type: "POST",url:new_url,
									data: mydata,cache: false,success: function(data){
										
										$.gritter.add({
											title: 'BigBook Server Response!',
											text: data
											});
											$("#form :input").each(function() {
											$(this).val('');});
											setInterval(function(){window.location.reload(true)},1000);
										}
									});
						} 
					});
			}
	}
	else {
		$.gritter.add({
			title: 'BigBook Server Response!',
			text: 'Please Fill the fields.'});
		}
		});	