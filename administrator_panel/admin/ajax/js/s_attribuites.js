//pad function
function pad(str, max) {
	  str = str.toString();
	  return str.length < max ? pad("0" + str, max) : str;
	}

// JavaScript Document
$(document).ready(function(e) {	

//append row and assign each row a serial no, for javascript totaling of debit and credit values
$('#add_row').click(function(event){
    event.preventDefault();
    
	var rowid=pad(Number($('#row_count').val())+1, 3);
	for(var r=1; r<=rowid; r++){//update remove button to newly inserted row
		var r=pad(r,3);
		$('#row'+r).remove();}
	
	$.ajax
		({
		type: "POST",
		url: "admin/ajax/php/attribute_values_apnd.php",
		data: {rowid: rowid},
		dataType : "html",
		cache: false,
		success:function(data)
			{
			$('#row_count').val(rowid);
			$('#row_append').append(data).fadeIn('fast');
			$('#attribute'+rowid).focus();
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
	$('#rem_append'+sec_last_row).append("<button style='margin-top:1em;' class='btn btn-danger btn-xs remove_row' id='row"+sec_last_row+"'><i class='fa fa-remove'></i></button>");
	$('#row_count').val(sec_last_row);
	$('#attribute'+sec_last_row).blur//for execution blur function to update total amount
	$('#attribute'+sec_last_row).focus();
});
//end remove button pressed------------------------



//send data to sv.php file
$("#form").submit(function (event) {
	event.preventDefault();
    if ($("#form :input").val() != "") {
        //check requried fields
        if ($('.check').val() == '') {
            $(this).focus();
            new PNotify({
                title: 'Error',
                text: 'That thing that you were trying to do worked!',
                type: 'notice'
            });
        } else {
            var mydata = $("#form :input").serializeArray();
            $.post($("#form").attr("action"), mydata, function (info) {
                new PNotify({
                    title: 'Regular Success',
                    text: info,
                    type: 'success'
                });

                if (info == "Saved.") {
                    $("#form :input").each(function () {
                        $(this).val('');
                    });
                    setInterval(function () {
                        window.location.reload(true)
                    }, 1000);
                }
            });
        }
    } else {
        new PNotify({
            title: 'Warning',
            text: 'Please fill the required Fields!',
            type: 'notice'
        });
    }
});

