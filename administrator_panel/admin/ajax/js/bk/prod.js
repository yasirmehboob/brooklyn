//status change
$("#status").change(function(){
	var status=$("#status").val();
		
		if(status=="inv"){
			$("#charges").hide();
			$('#charges').find('.check').switchClass('check','uncheck');
			$("#charges").val('');
			
			$("#sal,#pur,#inv").show();
			$('#sal,#pur,#inv').find('.uncheck').switchClass('uncheck','check');
			}
			else if(status=="n_inv"){
				$("#charges,#inv").hide();
				$('#charges,#inv').find('.check').switchClass('check','uncheck');
				$("#charges :input,#inv :input").val()='';
				
				$("#sal,#pur").show();
				$('#sal,#pur').find('.uncheck').switchClass('uncheck','check');
				}
				else if(status=="ser"){
					$("#charges,#pur,#inv").hide();
					$('#charges,#pur,#inv').find('.check').switchClass('check','uncheck');
					$("#charges :input,#pur :input,#inv :input").val('');
					
					$("#sal").show();
					$('#sal').find('.uncheck').switchClass('uncheck','check');
					}
					else{
						$("#charges").show();
						$('#charges').find('.uncheck').switchClass('uncheck','check');
						
						$("#sal,#pur,#inv").hide();
						$("#sal :input,#pur :input,#inv :input").val('');
						$('#sal,#pur,#inv').find('.check').switchClass('check','uncheck');
						}
		});
		
//taxable change
$("#taxable").change(function(){
	var taxable=$("#taxable").val();
	if(taxable=="y"){
		$('#txt_per').prop("readonly",false);
		}
		else{
		$('#txt_per').prop("readonly",true);
		$('#txt_per').val('');
		}

	})
	
$("#opbal, #prate").keyup(function(){
	var opbal=$("#opbal").val();
	var rate=$("#prate").val();
	if(opbal==""){
		opbal=0;
		}
	if(rate==""){
		rate=0;}
	var stk_amt=opbal*rate;
	$('#stk_amt').val(stk_amt);
	})