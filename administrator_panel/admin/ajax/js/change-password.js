// image files 
$(document).on("submit", "#form", function (event) {
    event.preventDefault();  
    
    $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            dataType: "text",
            data: $("#form :input").serializeArray(),
            success: function (info) {
                if(info!='Password Changed!'){
                    new PNotify({
                            title: 'Server Response',
                            text: info,
                            type: 'error'
                        });  
                }else{
                    new PNotify({
                            title: 'Server Response',
                            text: info,
                            type: 'success'
                        });  
                }
            }//end success
        });//end ajax
});