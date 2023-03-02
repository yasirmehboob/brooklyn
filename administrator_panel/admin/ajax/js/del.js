//update delete row
$('.del').click(function(){
	 var vnumb=$(this).attr('id');
	$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/del.php",
		data: { id: vnumb, tname: "acc_trans",where: "vnumb" },
		cache: false,
		success: function(info){
			$.gritter.add({
            title: 'Deleted!',
            text: info});
			$('.modal').modal('hide');
			setInterval(function(){window.location.reload(true)},5000);
			} 
		});
	})
//end update delete row


