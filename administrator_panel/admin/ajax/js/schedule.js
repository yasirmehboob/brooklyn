//send data to sv.php file
$(".form").submit(function (event) {
	event.preventDefault();
	var day = $(this).data('value');
	
    if ($("#form_"+day+" :input").val() != "") {
        //check requried fields
        if ($('.check').val() == '') {
            $(this).focus();
            new PNotify({
                title: 'Error',
                text: 'That thing that you were trying to do worked!',
                type: 'notice'
            });
        } else {
            var mydata = $("#form_"+day+" :input").serializeArray();
			var action = $("#form_"+day).attr("action");
			
			$.ajax({
                    type: "POST",
                    url: action,
                    data: mydata,
                    dataType: "text",
                    cache: false,
                    success: function (info) {
						
               			 new PNotify({
							title: 'Regular Success',
							text: info,
							type: 'success'
						});         
						
						
						if (info == "Saved.") {
							setInterval(function () {
								window.location.reload(true)
							}, 1000);
						}

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


//pad function
function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}
$(document).ready(function () {
	
		//ON CHANGE TRAINERSS ------------------------
        $(document).on('change', '.trainer_select', function () {
			var row = $(this).data('row');
			var day = $(this).data('day');
			var dt = $(this).data('dt');
			var trainer_id = $(this).val();
			
			if(trainer_id!=''){
				$.ajax({
                    type: "POST",
                    url: "admin/ajax/php/get_sessions.php",
                    data: {
                        trainer_id: trainer_id,
                        day: day,
						dt: dt
                    },
                    dataType: "html",
                    cache: false,
                    success: function (data) {
                        $('#trainer-session-'+row).html(data);
                    }
                });
			}else{
				$('#trainer-session-'+row).html("<option value=''> No Trainer Selected</option>");
			}
			
		})
		//ON CHANGE TRAINERSS ------------------------

        //append row and assign each row a serial no, for javascript totaling of debit and credit values
        $('.add_row').click(function () {
				var day = $(this).data('value');
				var mast_id = $(this).data('mast_id');
			
                var rowid = pad(Number($('#row_count-'+day).val()) + 1, 3);
                
                //update remove button to newly inserted row
                for (var r = 1; r <= rowid; r++) {
                    var r = pad(r, 3);
                    $('#remove_row-'+day + r).remove();
                }
                var file = $('#file').val();
            
                //remove the parent row
                $('#remove_row-'+day + rowid).remove();

                $.ajax({
                    type: "POST",
                    url: "admin/ajax/php/" + file + ".php?day=" + day + "&mast_id=" + mast_id,
                    data: {
                        rowid: rowid
                    },
                    dataType: "html",
                    cache: false,
                    success: function (data) {
                        $('#row_count-'+day).val(rowid);
                        $('#row_append-'+day).append(data).fadeIn('fast');
                        $('#selected' + rowid).focus();
                    }
                });
            }) //end insert row


        //remove button pressed ------------------------
        $(document).on('click', '.remove_row', function () {
			
			var day = $(this).data('value');
			
            //get the clicked button's id
            var row_id = $(this).attr("id");

            //getting the least three letter of the id
            row_id = row_id.substr(row_id.length - 3);

            //remove the parent row
            $('#row-'+day + row_id).remove();

            var sec_last_row = row_id - 1;
            sec_last_row = pad(sec_last_row, 3);
            $('#row-'+day + sec_last_row).append("<button type='button' class='remove_row btn-xs btn btn-danger' data-value='"+day+"' id='remove_row-"+day + sec_last_row + "' style='display: inline-block;'><i class='fa fa-times'></i> Remove</button>");
            $('#row_count-'+day).val(sec_last_row);
        });
        //end remove button pressed------------------------
     
    
	
	
		//Holiday Checkbox clicked ------------------------
        $(document).on('change', '.holidaybox', function () {
			var day = $(this).data('value');
			
			if($(this).is(':checked')){
			  	//checked
				$('#form_'+day).find(':input:not(:disabled)').prop('disabled',true);
				$('.status-'+day).val('holiday');
				$('.btn-'+day).hide("fast");
				$('.btn-holiday-'+day).show("fast");
				$('.btn-holiday-'+day+' :input').prop('disabled',false);
			}else{
				//unchecked
				$('#form_'+day+' :input').prop('disabled',false);
				$('.btn-'+day).show("fast");
				$('.btn-holiday-'+day).hide("fast");
				$('.holiday-message-'+day).hide('fast');
				$('#form_'+day).show("fast");
			}
		})
		//Holiday Checkbox clicked ------------------------
	
		
		//Save Holiday clicked ------------------------
        $(document).on('click', '.holiday', function () {
			var day = $(this).data('value');
			var mast_id = $(this).data('mast_id');
			
			$.ajax({
				type: "POST",
				url: "admin/ajax/php/up.php",
				data: {
					table: 'schedule_m',
					field: "status='holiday'",
					condition: "id='" + mast_id + "'"
				},
				dataType: "text",
				cache: false,
				success: function (data) {
					new PNotify({
						title: 'Server Response',
						text: data,
						type: 'success'
					});
					
					setInterval(function () {window.location.reload(true)}, 1000);
				}
			});
			
		});
		
    }) //document ready end