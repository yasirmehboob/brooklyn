//send data to sv.php file
$("#form").submit(function (event) {
	event.preventDefault();
    if ($("#form :input").val() != "") {
        
        //check requried fields
        var mydata = $("#form :input").serializeArray();
        $.post($("#form").attr("action"), mydata, function (info) {

            if (info == "Saved.") {
                $.post('admin/ajax/php/last_id.php', {table:'survey_mast'}, function (id) {
                    window.location.href = 'survey_questions.php?survey_id='+(id-1);
                });
            }
        });
        
    } else {
        new PNotify({
            title: 'Warning',
            text: 'Please fill the required Fields!',
            type: 'notice'
        });
    }
});