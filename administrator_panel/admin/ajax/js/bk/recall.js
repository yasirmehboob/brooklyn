//update delete row
$('.recall').click(function(){
	 var vnumb=$(this).attr('id');
	$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/recall.php",
		data: { id: vnumb, tname: "acc_trans",where: "vnumb" },
		cache: false,
		success: function(info){
			$.gritter.add({
            title: 'Recalled!',
            text: info});
			$('.modal').modal('hide');
			setInterval(function(){window.location.reload(true)},5000);
			} 
		});
	})
//end update delete row


