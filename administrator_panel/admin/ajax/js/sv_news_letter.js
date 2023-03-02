// image files 
$(document).on("submit", "#form", function (event) {
    event.preventDefault();
    var url = $(this).attr("action");
        $.ajax({
            //ajax upload progress
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total * 100;
                        //Do something with upload progress here
                        
                        $('.uploading_progress').show('fast');
                        $('.uploading_progress p').html(Math.round(percentComplete)+'% Completed');
                        $('.progress-bar').width(percentComplete+'%');
                        if(percentComplete==100){
                            $('.progress-bar').addClass('bg-green');
                            $('.progress-bar').removeClass('bg-orange');
                        }
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
});