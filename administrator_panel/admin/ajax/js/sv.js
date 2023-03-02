//send data to sv.php file
$("#form").submit(function (event) {
	event.preventDefault();
    if ($("#form :input").val() != "") {
        //check requried fields
        if ($('.check').val() == '') {
            $(this).focus();
            new PNotify({
                title: 'Error',
                text: 'That thing that you were trying to do worked!',
                type: 'notice'
            });
        } else {
            var mydata = $("#form :input").serializeArray();
            $.post($("#form").attr("action"), mydata, function (info) {
                new PNotify({
                    title: 'Regular Success',
                    text: info,
                    type: 'success'
                });

                if (info == "Saved.") {
                    $("#form :input").each(function () {
                        $(this).val('');
                    });
                    setInterval(function () {
                        window.location.reload(true)
                    }, 1000);
                }
            });
        }
    } else {
        new PNotify({
            title: 'Warning',
            text: 'Please fill the required Fields!',
            type: 'notice'
        });
    }
});