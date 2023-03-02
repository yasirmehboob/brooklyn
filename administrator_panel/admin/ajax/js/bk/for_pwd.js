//recover password
$('#forget_pwd').click(function(){
	 var eml=$('#email').val();
	 var cell=$('#cell_no').val();
	
	//if option is Cell
	if((eml!='') && (cell!='')){
	$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/fpwcell.php",
		data: {email: eml,cell:cell},
		cache: false,
		success: function(info){
			alert(info);
			$('.modal').modal('hide');
			} 
		});
	}
	
	//if option is eml
	else{
	$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/fpweml.php",
		data: {cell:cell},
		cache: false,
		success: function(info){
			alert(info);
			$('.modal').modal('hide');
			} 
		});
	}
	
	})
//end recover password


