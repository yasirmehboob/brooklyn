$(document).on("change", ".category", function () {
    var category = $(this).val();
    if (category=='tem'){
        $('#uploadImage').prop('required', false);
    }else{
        $('#uploadImage').prop('required', true);
    } 
});

// image files 
$(document).on("submit", "#form", function (event) {
    event.preventDefault();
    
    var type = $('.category').data('type');
    var category = $('.category').val();
    
    //if brand id temporary
    if(type=="brand" && category == 'tem'){
        var url = 'admin/ajax/php/temp_brand.php';
        $.ajax({
            url: url,
            type: $(this).attr("method"),
            dataType: "text",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == "Saved.") {
                    new PNotify({
                        title: 'Temporary Brand Saved.',
                        text: data,
                        type: 'success'
                    });
                    $("#form :input").each(function () {
                        $(this).val('');
                    });
                    setInterval(function () {
                       // window.location.reload(true)
                    }, 1000);
                }
            }
        });//end ajax
    }//end if
    
    // else not temporary
    else{
        var url = $(this).attr("action");
        $.ajax({
            //ajax upload progress
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        //Do something with upload progress here
                        new PNotify({
                        title: 'Please Wait',
                        text: percentComplete+'% Uploaded.',
                        type: 'warning'
                    });
                        
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
                if (data == "Saved.") {
                    new PNotify({
                        title: 'Regular Success',
                        text: data,
                        type: 'success'
                    });
                    $("#form :input").each(function () {
                        $(this).val('');
                    });
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
    }

});