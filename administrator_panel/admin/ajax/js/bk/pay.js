// JavaScript Document
$(document).ready(function(e) {	

//change Payment type start
$('.typ').change(function(){
		var type=$('.typ').val();
		 var key = $(this).children(":selected").attr("id");
		if(type=='bank'){
			$('#bank').show('fast');
			$('#payer').switchClass('col-sm-12','col-sm-8');
			$('#cash_acc').attr("readonly", false); 
			$('#title').html("Bank Payment Form.");
			$('#vtype').val("bp");
			$.ajax
				({
				type: "POST",
				url: "admin/ajax/php/get_acc.php",
				data: { key: key , condition: 'acc_nm_s'},
				cache: false,
				dataType:'json',
				success: function(data){
					$("#cash_acc").html(data);
					} 
				});
		}//end if type is bank
			else{
				$('#bank').hide('fast');
				$('#payer').switchClass('col-sm-8','col-sm-12');
				$('#cash_acc').attr("readonly", true); 
				$('#title').html("Cash Payment Form.");
				$('#vtype').val("cp");
				$.ajax
					({
					type: "POST",
					url: "admin/ajax/php/get_acc.php",
					data: { key: key , condition: 'acc_nm'},
					cache: false,
					dataType:'json',
					success: function(data){
						$("#cash_acc").html(data);
						} 
					});
			}
	});		
//change Receiving type end-----------------

//change inv/account start payment against
$('#inv,#acc').change(function(){
		var invid=$('#inv').val();
		//global variable
		$inv_id=$('#inv').val();
		var accid=$('#acc').val();
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/inv_pay_detail.php",
		data: { invid: invid, accid: accid},
		cache: false,
		dataType:'json',
		success: function(data)
			{
			$("#benificary_detail").html(data.detail);
			//if acc_payable selected
			if(data.amt==''){
			$("#bal").val(data.clbal);
			$("#bal_amt").val(data.clbal.slice(0,-3));
			}	
				// if Payment againt Purchase invoice
				else{
				$("#bal").val(data.amt);
				$("#bal_amt").val(data.amt);
				$paid=data.paid;//get the partially paid amount if any
				}
			} 
		});
})		
//change inv/account end-----------------

//change against start
$('#against').change(function(){
		var against=$('#against').val();
		if(against=='purchase'){
		$('#inv_cont').show('fast');
		$('#acc_cont').hide('fast');
		$('#acc_cont option[value=]').attr('selected','selected');
			$("#bal").val(0);
			$("#bal_amt").val(0)
			$("#benificary_detail").html('');
		}
			else{
			$('#inv_cont').hide('fast');
			$('#inv_cont option[value=000000]').attr('selected','selected');
			$('#acc_cont').show('fast');
				$("#bal").val(0);
				$("#bal_amt").val(0);
				$("#benificary_detail").html('');
				}
		
})		
//change against end-----------------

//change rec amt start
$('#rec_amt').blur(function(){
		var rec_amt=$('#rec_amt').val();
		var bal_amt=$('#bal_amt').val();
		var rem=bal_amt-rec_amt;
		
		if(rec_amt!=''){		
			if(isNaN(rec_amt)){
				$('#rec_amt').focus();
				$.gritter.add({
				title: 'Invalid Entry',
				text: 'Server only accepts numeric value!'
				});
			}
			if(rem<0){
			//$('#rec_amt').focus();
			$.gritter.add({
					title: 'Alert!',
					text: 'Paying Amount is Greater then Balance.'
					});
			}
			$('#bal').val(rem);
		}
})		
//change rec amt end-----------------

//making description start
$('#rec_amt').keyup(function(){
	var type=$('.typ').val();
	if(type=='bank'){
		if($('#against').val()=='purchase'){
			var descp = 'Amount Paid againt Purchase Invoice id '+$('#inv').val()+" ("+$('#pyee').val()+") Thr. Cheque No. "+$('#chq_no').val();
			$('#descp').val(descp);
			}
			else{
			var descp = 'Amount Paid againt Accounts Payable from '+$('#acc').children(":selected").text()+" ("+$('#pyee').val()+") Thr. Cheque No. "+$('#chq_no').val();
			$('#descp').val(descp);
			}
		}
		else{
			if($('#against').val()=='purchase'){
			var descp = 'Cash Paid againt Purchase Invoice id '+$('#inv').val()+" Thr.("+$('#pyee').val()+")";
			$('#descp').val(descp);
			}
			else{
			var descp = 'Cash Paid againt Accounts Payable from '+$('#acc').children(":selected").text()+" Thr.("+$('#pyee').val()+")";
			$('#descp').val(descp);
			}
			}
})
//making description end-----------------

//saving function start
function save(){if($("#form_rec :input").val()!=""){

	//return false if invoice is empty
	if(($("#inv").val()=="000000") && ($("#against").val()=="purchase"))
		{
		$.gritter.add({
				title: 'BigBook Server Response!',
				text: 'Please select the invoice'
			});
		$("#inv").focus();
		}

	else{//send data to sv.php for saving
	var mydata_2 = $("#form_rec :input,:selected").serializeArray();
	
	$.post($("#form_rec").attr("action"),
		 mydata_2, 
		 function(info){
			//if message is save then send back for auto voucher insertion
			if(info=="Saved."){
				var av_url='admin/ajax/php/sv.php?t_name1=none&count=0&row=none&file=false&flimit=0&log=y&av=y';
				
				//getting credit account depending upon the payment againt type
				if($("#against").val()=='purchase'){
					var crdit_acc = $('#inv').children(":selected").attr("data");
					}
					else{
						var crdit_acc=$('#acc').val();
						var descp="Received From "+$('#pyee').val();
						}
					
					$.post(av_url,
					{vdate:$('#rdate').val(),
					vtype:$('.typ').children(":selected").attr("data"),
					crdit:$("#cash_acc").val()+':'+$('#rec_amt').val(),
					debit:crdit_acc+':'+$('#rec_amt').val(),
					descp:$('#descp').val(),
					chq_no:$('#chq_no').val(),
					chq_dt:$('#chq_dt').val(),
					pyee:$('#pyee').val()}
					,function(av_data){
						if(av_data.status=='Saved.'){
							var last_vnumb=av_data.vnumb;
							$.post('admin/ajax/php/pay.php',{amt:$('#rec_amt').val(),pyee:$('#pyee').val(),max_id:'y'},function(data){
								if(data.status=='success'){
									$rec_id=data.rec_id;
									$.post(
									'admin/ajax/php/up.php',
									{table:'pay',field:'vnumb=\''+last_vnumb+'\'',condition:'id='+data.rec_id},
									function(data){
										if(data=='updated'){
											
											var rem = $('#bal').val();
											var against=$('#against').val();
											var paid = Number($paid)+Number($('#rec_amt').val());
											
											if(against=="purchase"){
												if (rem<=0){
													$.post('admin/ajax/php/up.php',{table:'store_in_m',field:'rec=\'y\',paid=\''+paid+'\'',condition:'mast_id='+$inv_id},
													function(iu_data){
													//save message start
													$.gritter.add({
														title: 'BigBook Server Response!',
														text: 'Saved.'
													});//save message end
													//clear fields
													if(iu_data=="updated"){
														//$("#form_rec :input").each(function() {
														//$(this).val('');})
														//setInterval(function(){window.location.reload(true)},2000);
														}//end if
													//clear fields end
													});
													}else{
														$.post('admin/ajax/php/up.php',{table:'store_in_m',field:'paid=\''+paid+'\'',condition:'mast_id='+$inv_id},
														function(iu_data){
														//save message start
														$.gritter.add({
															title: 'BigBook Server Response!',
															text: 'Saved.'
														});//save message end
														//clear fields
														if(iu_data=="updated"){
															//$("#form_rec :input").each(function() {
															//$(this).val('');})
															//setInterval(function(){window.location.reload(true)},2000);
															}//end if
														//clear fields end													
														});
													}//end else
											}else{
												//save message start
												$.gritter.add({
													title: 'BigBook Server Response!',
													text: 'Saved.'
												});//save message end
												
												//clear fields
												//$("#form_rec :input").each(function() {
												//$(this).val('');})
												//setInterval(function(){window.location.reload(true)},2000);
												//clear fields end
											}	
											
										}
									});//end $post
									}
							}, "json");
						}
					}, "json");//end $.post auto_voucher
				
				}//if message is save then send back for auto voucher insertion
				
		});//end $post save_receipt
		
	}//else if invoice is selected
	
}//end if fileds are not empty

else {//else fields are empty
	$.gritter.add({
            title: 'BigBook Server Response!',
            text: 'Please Fill Data and then save Receipt you are not allowed to save an empty Receipt. If you think that this message is wrong then contact your DBA/Administrator.'
        });
	return false;}
	}//end else fields are empty
//saving function ends----------------------


//print function start
function print(){
	$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/print.php",
		data: { id: vnumb, tname: "acc_trans", where: "vnumb" },
		cache: false,
		success: function(info){
			window.location.replace("onscreen/voucher.php?vnumb="+vnumb);
			}//success end
		});//ajax end
}
//print function ends----------------------

//saving voucher start
$("#rec_sv").click(function(){
	save();
});	
//voucher saving end-------------------

//printing voucher start
$("#rec_pnt").click( function(){
	save();
	print();
});
//printing voucher ends ----------------------
});
//document ready ends ----------------------			