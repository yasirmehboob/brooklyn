//updating sort
$(document).on('click','.sort',function()
{	
var id=$(this).attr("id");

var data = $(this).attr("data");
var arr = data.split('/');

var tbl=arr[0];
var fld=arr[1];

var sort=$(this).attr("mydata");
input_val=$('#'+sort).val();

$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/sort.php",
		data: { id: id, tname: tbl,input: input_val, fld: fld},
		cache: false,
		success: function(info){
			$.gritter.add({
            title: 'Server Response!',
            text: info});
			} 
		});
})
//updating sort

	
