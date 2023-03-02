//fetch and display records
$(document).ready(function () {
	
        var id = $('#id').val();
        var table = $('#table').val();
        $.ajax({
            type: "POST",
            url: "admin/ajax/php/fetch_records.php",
            data: {
                id: id,
                table: table
            },
            dataType: "json",
            cache: false,
            success: function (data) {
				
				
                $.each(data, function (key, value) {
                    $.each(value, function (key, value) {
                        
                        var eltype = $("*[name=" + key + "]").prop('tagName');
                        
                        if(eltype=='INPUT'){
                            $("input[name=" + key + "]").val(value); //for input field
                        }
                        else if (eltype=='TEXTAREA'){
                            $("textarea[name=" + key + "]").text(value); //for text area
                        }
                        else if(eltype=='SELECT'){
                            $("select[name='" + key + "'] option[value='" + value + "']").prop("selected", true); //for select box
                        }
                    });
                });//$.each end
                
                
                if((data[0].dir)){
                    $('.current_img').attr('src','images/'+table+'/'+data[0].dir+data[0].files_1)
                }
                
                
                
            }//success end
             
        });
    })
    //fetch and display records

//active inactive 
$(".active_status").change(function () {
        var status_val = $(this).val();
        var status = "del='" + status_val + "'";
        var id = $('#id').val();
        var condition = "id='" + id + "'";
        var table = $('#table').val();

        $.ajax({
            type: "POST",
            url: "admin/ajax/php/up.php",
            data: {
                table: table,
                field: status,
                condition: condition
            },
            dataType: "text",
            cache: false,
            success: function (data) {}
        });

    })
//active inactive


//updating data
$("#up").click(function () {
    var form_data = $("#form :input").serializeArray();
    var fields = '';

    $.each(form_data, function (i, field) {
		var field_value = field.value.replace(/(['"])/g, "").
		replace(/\\/g, '\\\\').
        replace(/\u0008/g, '\\b').
        replace(/\t/g, '\\t').
        replace(/\f/g, '\\f');
		
        fields += "`" + field.name + "`='" + field_value + "',";
    });
    fields = fields.substring(0, fields.length - 1);
    //unit price log
    if ($("input[name='unit_price']").length > 0) {
        var unit_price = $("input[name='unit_price']").val();
    } else {
        var unit_price = "null";
    }
    //unit price log

    var table = $('#table').val();
    var id = $('#id').val();
    var condition = "id='" + id + "'";
    
    if(table=='master_item'){
        var monthly_req = $("input[name='monthly_req']").val();
        var url_parameter = "?rating=y&monthly_req="+monthly_req;
    }else{
        var url_parameter = "";
    }
    
    
    $.ajax({
        type: "POST",
        url: "admin/ajax/php/up.php"+url_parameter,
        data: {
            table: table,
            field: fields,
            condition: condition,
            unit_price: unit_price
        },
        dataType: "text",
        cache: false,
        success: function (data) {
            new PNotify({
                title: 'Server Response',
                text: data,
                type: 'success'
            });
        }
    });


});
//updating data