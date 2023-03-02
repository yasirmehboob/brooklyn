//updating data
$(document).on("submit", "#form", function (event) {
    event.preventDefault();    
    
    var mydata = $("#form :input").serializeArray();

      $.ajax({
        type: "POST",
        url: "admin/ajax/php/update_about.php",
        data: mydata,
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
