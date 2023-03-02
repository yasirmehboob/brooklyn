// JavaScript Document

//pad function
	function pad (str, max) {
	  str = str.toString();
	  return str.length < max ? pad("0" + str, max) : str;
	}

$(document).ready(function(e) {	
//padding funcation
function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}

$('#dt').focus();

//check date
$('#dt').blur(function(){
var input_date = new Date($('#dt').val());
var opening_date = new Date('2015-06-30');//YYYY-MM-DD
var closing_date = new Date('2016-07-01');

	if((input_date<=opening_date) || (input_date>=closing_date)){
		$.gritter.add({
            title: 'Invalid Entry!',
            text: 'Please enter valid Date you are not allowed to enter backdate voucher. If you think that this message is wrong then contact your DBA/Administrator.'
        });
		$('#dt').focus();
	}
});
//check date

//generate new voucher number
var dataString ='';
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/voucher.php",
		data: dataString,
		cache: false,
		dataType:'json',
		success: function(data)
			{
			$("#vnumb").val(data.vnumb);
			var vnumb=data.vnumb;
			} 
		});//end generate new voucher number

//change voucher type start
$('.vtype').change(function(){
	var title=$(".vtype option:selected" ).text();
	$('#tag').html(title + " Voucher Entry");
	$('#tagp').html(title + " (Fill all the fields carefully).");
	var vtype=$('.vtype').val();
	if(vtype=='bp'){
		$('.bank').fadeIn('fast');}
		else if(vtype=='br'){
			$('.bank').fadeIn('fast');}
			else{
				$('.bank').fadeOut('fast');
				$('.bank :input').each(function() {
		$(this).val('');})
		}//end else
			
	});		
//change voucher type end-----------------
	
//append row and assign each row a serial no, for javascript totaling of debit and credit values
$('#add_row').click(function(){
	var rowid=pad(Number($('#row_count').val())+1, 3);
	
	for(var r=1; r<=rowid; r++){//update remove button to newly inserted row
		var r=pad(r,3);
		$('#row'+r).remove();}
		
	$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/vch_apnd.php",
		data: {rowid: rowid},
		dataType : "html",
		cache: false,
		success:function(data)
			{
			$('#row_count').val(rowid);
			$('#row_append').append(data).fadeIn('fast');
			$('#acc_nm'+rowid).focus();
			}
		});
	})//end insert row
	
});//doc read end------------------------

//remove button pressed ------------------------
$(document).on('click','.remove_row',function(){
	//get the clicked button's id
	var row_id=$(this).attr("id");
	
	//getting the least three letter of the id
	row_id=row_id.substr(row_id.length - 3);
	
	//remove the parent row
	$('#'+row_id).remove();
	
	var sec_last_row =row_id-1;
	sec_last_row=pad(sec_last_row,3);
	$('#rem_append'+sec_last_row).append("<button style='margin-top:0.5em;' class='btn btn-danger btn-xs remove_row' id='row"+sec_last_row+"'><i class='fa fa-remove'></i></button>");
	$('#row_count').val(sec_last_row);
	$('#ced'+sec_last_row).focus();
	$('#acc_nm'+sec_last_row).focus();
});
//end remove button pressed------------------------

//saving function start
function save(){if($("#form_vch :input").val()!=""){
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
	if(info=="Saved."){
		$("#form_vch :input").each(function() {
		$(this).val('');
		})
		setInterval(function(){window.location.reload(true)},3000);
		}
	//clear fields ends
 	});
}//end if fileds are not empty

else {//else fields are empty
	$.gritter.add({
            title: 'Voucher Action!',
            text: 'Please Fill Data & and then save voucher you are not allowed to save an empty voucher. If you think that this message is wrong then contact your DBA/Administrator.'
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
$("#vch_btn").click(function(){
	save();
});	
//voucher saving end-------------------

//printing voucher start
$("#vch_pnt").click( function(){
	save();
	print();
});
//printing voucher ends ----------------------


//making totals of credits and debits
$(document).on('blur','.calc',function()
{	
	//pad function
	function pad (str, max) {
	  str = str.toString();
	  return str.length < max ? pad("0" + str, max) : str;
	}
	var row_count= Number($('#row_count').val());
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
//end making totals of credits and debits----------------------

$(document).on('focus','.dup',function(){
	function pad (str, max) {
	  str = str.toString();
	  return str.length < max ? pad("0" + str, max) : str;
	}
	//get the active row's number
		var descp_id=$(this).attr("id");
			//getting the least three letter of the id
			descp_id=descp_id.substr(descp_id.length - 3);
	if(Number(descp_id)>1){
		var prev_id=Number(descp_id)-1;
		prev_id=pad(prev_id, 3);
		var paste=$('#descp'+prev_id).val();
			if($('#descp'+descp_id).val()==""){
				$('#descp'+descp_id).val(paste);}
			};
})