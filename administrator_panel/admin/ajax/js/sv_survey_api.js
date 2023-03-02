//send data to sv.php file
$("#sv").click(function () {
	var check = 0;
    $('.validate').each(function () {
        if ($.trim($(this).val()) == '') {
            check++;
            $(this).addClass('empty');
        } else {
            $(this).removeClass('empty');
        }        
    });
    
    if(check>=1){
         new PNotify({
            title: 'Error',
            text: 'Some questions are not answered, Please answer all questions and try again.',
            type: 'error'
        });
        return false;   
    }else{
        var mydata = $("#form :input").serializeArray();
        $.post($("#form").attr("action"), mydata, function (info) {
            if (info == "Saved.") {
                $('#form').hide('fast');
                $('.thanks').show('fast');
            }
        });
    }
});