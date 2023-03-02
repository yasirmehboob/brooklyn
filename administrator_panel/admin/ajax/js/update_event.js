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
                        //if not a file then
                        if(key!='files_1'){
                            
                            var eltype = $("*[name=" + key + "]").prop('tagName');

                            if(eltype=='SELECT'){
                                $("select[name='" + key + "'] option[value='" + value + "']").prop("selected", true); //for select box
                            }
                        }//files_1 check 
                        
                    });
                });//$.each end
                
                
                if(data[0].dir){
                    $('.current_img').attr('src','images/'+data[0].dir+'/'+data[0].files_1);
                }
                
                
                
            }//success end
             
        });
    })
    //fetch and display records




$(document).on("submit", "#form", function (event) {
    event.preventDefault();
    
         var url = $('#form').attr("action");
        $.ajax({
            //ajax upload progress
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        //Do something with upload progress here
                        $('.uploading_div').show();
                        $('.up_progress').css('width',percentComplete+'%');
                    }
               }, false);

               return xhr;
            },
            //ajax upload progress
            url: url,
            type: $(this).attr("method"),
            dataType: "text",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == "updated") {
                    new PNotify({
                        title: 'Regular Success',
                        text: data,
                        type: 'success'
                    });
                   /* $("#form :input").each(function () {
                        $(this).val('');
                    });
                    setInterval(function () {
                        window.location.reload(true)
                    }, 1000);*/
                    setInterval(function () {
                        window.location.reload(true)
                    }, 1000);
                }else{
                    new PNotify({
                        title: 'Error!',
                        text: data,
                        type: 'error'
                    });
                }
                
            }
        });//end ajax
    
    
    
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

