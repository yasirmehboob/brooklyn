//pad function
function pad(str, max) {
	  str = str.toString();
	  return str.length < max ? pad("0" + str, max) : str;
	}

// JavaScript Document
$(document).ready(function(e) {	

//generate new Invoice number
var dataString ='';
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/inv_no.php?fnm=store_in_m",
		data: dataString,
		cache: false,
		dataType:'json',
		success: function(data)
			{
			$("#mast_id").val(data.mast_id);
			mast_id= data.mast_id;
			$mast_id= data.mast_id;
			} 
		});
//end generate new Invoice number

//change Customer start
$('.cust').change(function(){
		var custid=$('.cust').val();
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/cust_detail.php",
		data: { custid: custid},
		cache: false,
		dataType:'json',
		success: function(data)
			{
			$("#cust_detail").html(data.details);
			$debit_acc=data.acc_nm;
			if(data.cust_type=='credit'){
			$("#status").attr('disabled', false);
			$("#status option[value="+data.cust_type+"]").prop("selected",true);}
			else{
				$("#status").attr('disabled', true);
				$("#status option[value="+data.cust_type+"]").prop("selected",true);}
			} 
		});
	});		
//change customers end-----------------

//change Product start
$(document).on('change','.prod',function(){
		//pad function
		function pad(str, max) {
			  str = str.toString();
			  return str.length < max ? pad("0" + str, max) : str;
			}	
		
		//get the active row's number
		var prod_id=$(this).attr("id");
		
		//getting the least three letter of the id
		prod_id=prod_id.substr(prod_id.length - 3);
		var prod=$(this).val();
	
		$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/prod_detail.php",
		data: { prodid: prod},
		cache: false,
		dataType:'json',
		success: function(data)
			{
			//if this product already exists then
			var result = '';
			if($('#row_count').val()>1){
				var arr=[];
				for(var i=1; i<($('#row_count').val());i++){
				arr.push($('#pdcode'+pad(i,3)).val());
				}
				arr.push(data.id);
				var sorted_arr = arr.sort();
				var results = [];
				for (var d = 0; d < arr.length - 1; d++) {
					if (sorted_arr[d + 1] == sorted_arr[d]) {
						result='duplicate';
						//results.push(sorted_arr[d]);
					}
				}
				//alert(arr.toString());
			}
			if(result=='duplicate'){
				$('#prod'+prod_id).focus();
				$('#prod'+prod_id).val('');
				$("#pdcode"+prod_id).val('');
				$("#unt"+prod_id).val('');
				$("#rt"+prod_id).val('');
				$("#pdnm"+prod_id).val('');
				$("#ds"+prod_id).val('');
				$("#tx"+prod_id).val('');
				$("#stk_hnd"+prod_id).val('');
				//make av parameters
				$("#amt"+prod_id).data("av",'');
					$.gritter.add({
					title: 'Invalid Entry',
					text: 'This product is already entered, You are not allowed to enter a same product muliple times. If you think that this message is wrong then contact your DBA/Administrator.'
					});
						return false;
				}
				else{
					$("#pdcode"+prod_id).val(data.id);
					$("#unt"+prod_id).val(data.unt);
					$("#rt"+prod_id).val(data.srate);
					$("#pdnm"+prod_id).val(data.nm);
					$("#ds"+prod_id).val(data.dis);
					$("#tx"+prod_id).val(data.tax);
					$("#stk_hnd"+prod_id).val(data.stk_hnd);
					//make av parameters
					$("#amt"+prod_id).data("av",data.sl_acc);
				}
			}
		});
})		
//change Product end-----------------

//change qty start
$(document).on('blur','.qty,.rate,.prod,.dis,.tax',function(){
	//padding funcation
	function pad (str, max) {
	  str = str.toString();
	  return str.length < max ? pad("0" + str, max) : str;
	}
	//get the active row's number
	var qty_id=$(this).attr("id");
			
	//getting the least three letter of the id
	qty_id=qty_id.substr(qty_id.length - 3);
		
		$('#amt'+qty_id).val(0);
		
		//validating wather the input is number or not
		if (isNaN($('#qty'+qty_id).val())){
			$('#qty'+qty_id).focus();
			}
		else if (isNaN($('#rt'+qty_id).val())){
			$('#rt'+qty_id).focus();
			}
		else if (isNaN($('#ds'+qty_id).val())){
			$('#ds'+qty_id).focus();
			}
		else if (isNaN($('#tx'+qty_id).val())){
			$('#tx'+qty_id).focus();
			}
			
		var stkhnd=$('#stk_hnd'+qty_id).val();
		var qty=$('#qty'+qty_id).val();
		var rt=$('#rt'+qty_id).val();
		var ds=$('#ds'+qty_id).val();
		var tx=$('#tx'+qty_id).val();
		var bstk=(stkhnd)+(qty);//calculating remaining stock
		var amt=qty*rt;
		var tax_amt=(amt*tx)/100;
				
			amt=(amt+tax_amt);
			if(ds>amt){
				$.gritter.add({
				title: 'Server Response!',
				text: 'Discount amount can not be greater then total amount. If you think that this message is wrong then contact your DBA/Administrator.'
				});
				$('#ds'+qty_id).focus();
				}
			amt=amt-ds;
			amt=amt.toFixed(2);
		$('#amt'+qty_id).val(amt);
		$('#tax_amt'+qty_id).val(tax_amt);
		$('#stk_hnd'+qty_id).data("bal_stk",bstk);//set remaining stock value

	//making totals of amounts--------------
	var row_count= $('#row_count').val();
	var tot_amt=Number(0);
	var gst_amt=Number(0);
	var dis_amt=Number(0);
	$stk_query='';
		//making total
		for(var x =1;x<=row_count;x++){
			var rid=x;
			rid=pad(rid,3);
			
			var amt=Number($('#amt'+rid).val());
			var gst=Number($('#tax_amt'+rid).val());
			var ds=Number($('#ds'+rid).val());
			
			tot_amt+=amt;
			gst_amt+=gst;
			dis_amt+=ds;
			
			//arrange query for updating balance inventory stock 
			$stk_query+="update prod set stkhnd='"+$('#stk_hnd'+rid).data("bal_stk")+"' where id='"+$('#pdcode'+rid).val()+"';";
			
			}
	//putting total in total input fields
	$('#totamt').val(parseInt(tot_amt));
	$('#gst_amt').val(parseInt(gst_amt));
	$('#gst_amt_tot').html(parseInt(gst_amt));
	$('#dis_amt_tot').html(parseInt(dis_amt));
	
	var dis=$('#dis').val();
		if(dis==''){dis=0;}
	var charg=$('#char').val();
		if(charg==''){charg=0;}
	
	var g_tot=(parseInt(tot_amt)+parseInt(charg))-parseInt(dis);
	$('#g_tot').val(g_tot);
		$("#amt_word").html(toWords(g_tot)+' ONLY');
		$("#amt_word").css('color','#666');
	//making totals of amounts---------------

		//value cannot be negitive 
		if($('input#amt'+qty_id).val()<0){
			$('input#amt'+qty_id).val(0).focus();
				$.gritter.add({
				title: 'Invalid Entry',
				text: 'Please Enter the Valid Amount, You are not allowed to enter a negitive value. If you think that this message is wrong then contact your DBA/Administrator.'
				});
			}
		//if not a number
		var chk_amt=$('input#amt'+qty_id).val();
		if(isNaN(chk_amt)==true){
			$(this).val(0).focus();
				$.gritter.add({
				title: 'Invalid Entry',
				text: 'You are not allowed to enter a Alphanumeric/Special character value. If you think that this message is wrong then contact your DBA/Administrator.'
				});
			}
})		
//change qty end-----------------

//other charges and discount calculation-----------------
$(document).on('keyup','#dis,#char',function(){
var dis=$('#dis').val();
	if(dis==''){dis=0;}
var charg=$('#char').val();
	if(charg==''){charg=0;}
	var g_tot=(parseInt($('#totamt').val())+parseInt(charg))-parseInt(dis);
	
	$('#g_tot').val(g_tot);
	$("#amt_word").html(toWords(g_tot)+' ONLY');
});
//other charges and discount calculation-----------------


//append row and assign each row a serial no, for javascript totaling of debit and credit values
$('#add_row').click(function(){
	var rowid=pad(Number($('#row_count').val())+1, 3);
	
	for(var r=1; r<=rowid; r++){//update remove button to newly inserted row
		var r=pad(r,3);
		$('#row'+r).remove();}
	
	$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/sinv_apnd.php",
		data: {rowid: rowid},
		dataType : "html",
		cache: false,
		success:function(data)
			{
			$('#row_count').val(rowid);
			$('#row_append').append(data).fadeIn('fast');
			$('#prod'+rowid).focus();
			}
		});
})
//end append row insert row
	
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
	$('#prod'+sec_last_row).blur//for execution blur function to update total amount
	$('#prod'+sec_last_row).focus();
});
//end remove button pressed------------------------

//saving function start------------------------
function save(){if($("#form_sal :input").val()!=""){
var mydata_2 = $("#form_sal :input,:selected").serializeArray();
$.post($("#form_sal").attr("action"),
	 mydata_2, 
	 function(info){
		var item_acc='';
		if(info=="Saved.Saved."){//if successfully inserted into sales_out then insert auto voucher in accounts
			for(var x=1; x<=$('#row_count').val(); x++){
				var id=pad(x,3);
				item_acc+=$('#amt'+id).data('av')+':'+$('#qty'+id).val()*$('#rt'+id).val()+'|';
			}
			var gst_acc=$('#gst_acc').val()+':'+$('#gst_amt_tot').html();
			var dis_acc=$('#dis_acc').val()+':'+((Number($('#dis_amt_tot').html()))+(Number($('#dis').val())));
			//if there are no other charges then skip other_charges_account from auto voucher
			if($('#char').val()==''){
				var och_acc='';}
				else{
					var och_acc='|'+$('#och_acc').val()+':'+$('#char').val();
					}
			//compiling credit and debit accounts
			var crdit=item_acc+gst_acc+och_acc;
			var debit=$debit_acc+':'+$('#g_tot').val()+'|'+dis_acc;
			//verifing that all the amounts are equal
			var av_url='admin/ajax/php/sv.php?t_name1=none&count=0&row=none&file=false&flimit=0&log=y&av=y';
			$.post(av_url,
			{vdate:$('#dt').val(),
			vtype:'pv',
			debit:debit,
			crdit:crdit,
			descp:'System Auto Purchase Voucher',
			chq_no:'n/a',
			chq_dt:'n/a',
			pyee:'n/a'}
			,function(av_data){
				if(av_data.status=='Saved.'){//if voucher successfully inserted then link the voucher number to the invoice in sale_out_m
					$.post('admin/ajax/php/up.php',{table:'store_in_m',field:'vnumb=\''+av_data.vnumb+'\'',condition:'mast_id='+$mast_id},
					function(iu_data){
						if(iu_data=="updated"){//if vnumb successfully linked to the purchase then update balance stock in inventory prod tbl
							$.post('admin/ajax/php/mysql_query.php',{query:$stk_query},
							function(query_data){
								if(query_data=='Success'){
									$.gritter.add({
										title: 'BigBook Server Response!',
										text: 'Saved.'
									});//save message end
									//clear fields
										$("#form_rec :input").each(function() {
										$(this).val('');})
										setInterval(function(){window.location.reload(true)},2000);
									//clear fields end
								}
							});
						}
					});
				}
			}, "json");
		}
        
 	});
}//end if fileds are not empty

else {//else fields are empty
	$.gritter.add({
            title: 'Server Response!',
            text: 'Please Fill Data & and then save voucher you are not allowed to save an empty Invoice. If you think that this message is wrong then contact your DBA/Administrator.'
        });
	return false;}
	}//end else fields are empty
//saving function ends----------------------


//print function start------------------------
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

//saving voucher start------------------------
$("#sal_btn").click(function(){
	save();
});	
//voucher saving end-------------------

//printing voucher start------------------------
$("#vch_pnt").click( function(){
	save();
	print();
});
//printing voucher ends ----------------------
