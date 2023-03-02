$("#form").submit(function(){
	if($("#salary").val()>="1"){
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url: 'admin/ajax/php/sv.php?t_name1=pay_emp&count=1&row=single&file=true&flimit=1',
			type: 'POST',
			data: formData,
			async: false,
			success: function (data) {
				
				if(data=="Saved."){
				$.gritter.add({
				title: 'BigBook Server Response!',
				text: 'Saved.'});
				
				$("#form :input").each(function() {
				$(this).val('');
				});
				setInterval(function(){window.location.reload(true)},2000);
				};
			},
			cache: false,
			contentType: false,
			processData: false
		});
		}
		
	else{
	$.gritter.add({
		title: 'BigBook Server Response!',
		text: 'Salary Can not be Less then Zero.'});
	return false;	
		}
});