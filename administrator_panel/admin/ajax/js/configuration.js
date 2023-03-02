//updating data
$(document).on("submit", "#config_form", function (event) {
    event.preventDefault();    
    
    var mydata = $("#config_form :input").serializeArray();

      $.ajax({
        type: "POST",
        url: "admin/ajax/php/configure.php",
        data: mydata,
        dataType: "text",
        cache: false,
        success: function (data) {
            if(data=="true"){
                window.location='index.php';
            }
        }
    });
    
});
//updating data
