//updating data
$(document).on("submit", "#login_form", function (event) {
    event.preventDefault();    
    
    var mydata = $("#login_form :input").serializeArray();

      $.ajax({
        type: "POST",
        url: "admin/ajax/php/login_check.php",
        data: mydata,
        dataType: "text",
        cache: false,
        success: function (data) {
            if(data=="true"){
                window.location='index.php';
            }else{
                $('.response').html('Username or Password is incorrect');
            }
        }
    });
    
});
//updating data
