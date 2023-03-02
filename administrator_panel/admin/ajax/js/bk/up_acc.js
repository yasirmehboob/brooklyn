//updating acc_mast
$("#btn_acc_upd").click(function(){
var mydata = $("#form_mast :input").serializeArray();
$.post($("#form_mast").attr("action"), mydata, function(info){
	//save message after pressing save button
        $.gritter.add({
            title: 'Update Action!',
            text: info
        });

	});
//clear form values
$("#form_mast :input").each(function() {
	    $(this).val('');
	})

	});	
//updating acc_mast end	

	
