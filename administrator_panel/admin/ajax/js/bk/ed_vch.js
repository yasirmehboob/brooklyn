// JavaScript Document
$(document).ready(function(e) {
//pad function
function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
};
//making default 0 fields readonly.
var rowid=$('#rowid').val();
for(var x=1;x<=rowid;x++){
	var rid=x;
	rid=pad(rid,3);
		if($('#deb'+rid).val()==0){
		$('#deb'+rid).val('');
		$('#deb'+rid).attr('readonly', 'readonly');
		}
			else{
			$('#ced'+rid).val('');
			$('#ced'+rid).attr('readonly', 'readonly');
			}
}//end for loop

//making totals of credits and debits
$(document).on('blur','.calc',function()
{	
	//pad function
	function pad (str, max) {
	  str = str.toString();
	  return str.length < max ? pad("0" + str, max) : str;
	}
	var row_count= Number($('#rowid').val());
	var tot_credit=Number(0);
	var tot_debit=Number(0);
		//making total
		for(var x =1;x<=row_count;x++){
			var rid=x;
			rid=pad(rid,3);
			var credit=Number($('input#ced'+rid).val());
			var debit=Number($('input#deb'+rid).val());
			tot_credit+=credit;
			tot_debit+=debit;
			}
	//putting total in total input fields
	$('#totcrdit').val(tot_credit);
	$('#totdebit').val(tot_debit);
		
		//get the active row's number
		var id=$(this).attr("id");
			//getting the least three letter of the id
			id=id.substr(id.length - 3);
			
		//only 1 field can be use in one row either debit or credit, making one field readonly if opposit one is filled
		if($('input#deb'+id).val()!=''){
			$('input#ced'+id).attr('readonly', 'readonly');	
		}
			else if($('input#ced'+id).val()!=''){
				$('input#deb'+id).attr('readonly', 'readonly');
			}
				else{
					$('input#ced'+id).removeAttr('readonly');
					$('input#deb'+id).removeAttr('readonly');
				}
		
		//value cannot be negitive 
		if($('input#deb'+id).val()<0){
			$('input#deb'+id).val(0).focus();
				$.gritter.add({
				title: 'Invalid Entry',
				text: 'Please Enter the Valid Amount, You are not allowed to enter a negitive value. If you think that this message is wrong then contact your DBA/Administrator.'
				});
			}
		if($('input#ced'+id).val()<0){
				$('input#ced'+id).val(0).focus();
				$.gritter.add({
				title: 'Negative Value',
				text: 'Please Enter the Valid Amount, You are not allowed to enter a negitive value. If you think that this message is wrong then contact your DBA/Administrator.'
				});
			}
		//if not a number
		var chk_deb=$('input#deb'+id).val();
		var chk_ced=$('input#ced'+id).val();
		if((isNaN(chk_deb)==true)||(isNaN(chk_ced)==true)){
			$(this).val(0).focus();
				$.gritter.add({
				title: 'Invalid Entry',
				text: 'You are not allowed to enter a Alphanumeric/Special character value. If you think that this message is wrong then contact your DBA/Administrator.'
				});
			}
		
		//checking if debit and credit is equal or not
		if(tot_credit==tot_debit){
			$("#amt_word").html(toWords(tot_credit)+' ONLY');
			$("#amt_word").css('color','#666');
			}
		else{$("#amt_word").html('Debit and Credit are not equal.');
			$("#amt_word").css('color','#F00');
			}
});


//update row
	$('#vch_upd').click(function(){
		var tot_credit= $('#totcrdit').val();
		var tot_debit=$('#totdebit').val();
		if(tot_credit==tot_debit){
			var mydata_2 = $("#form_vch :input,:selected").serializeArray();
			$.post($("#form_vch").attr("action"),
				 mydata_2, 
				 function(info){
				 //save message start
					$.gritter.add({
						title: 'Voucher Action!',
						text: info
					});
				//save message end
				
				 //clear fields
				if(info=="Successfully Updated!"){
					$("#form_vch :input").each(function() {
					$(this).val('');})
					setInterval(function(){window.location.reload(true)},3000);}
				//clear fields end
				});
		}
		else{
		$.gritter.add({
		title: 'BigBook Server Response',
		text: 'Debit and Credit Values are not equal. If you think that this message is wrong then contact your DBA/Administrator.'
		});
		}
		

	});
//end update row



})

