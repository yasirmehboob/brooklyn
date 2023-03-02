$(document).on("click", ".delete", function (event) {
    var table = $(this).data("tname");
    var id = $(this).data("id");
    var name = $(this).data("name");
    $('#delete_data').html(name + " (ID:" + id + ")");
    $(".confirm_delete").data("ajax_id", id);
    $(".confirm_delete").data("ajax_table", table);

});



$(document).on("click", ".confirm_delete", function (event) {
    var table = $(this).data("ajax_table");
    var id = $(this).data("ajax_id");
    var url = 'admin/ajax/php/del.php';
    $.ajax({
        url: url,
        type: 'POST',
        dataType: "text",
        data: {
            id: id,
            tname: table
        },
        success: function (data) {
            //hide the modal box
            $('#delete-modal').modal('hide');
            //display the notification box
            new PNotify({
                title: 'Server Response',
                text: data,
                type: 'success'
            });
            //refresh form
            setInterval(function () {
                window.location.reload(true)
            }, 1000);

        },
        cache: false
    });

});






$(document).on("click", ".delete_temp", function (event) {
    var table = $(this).data("tname");
    var id = $(this).data("id");
    var name = $(this).data("name");
    $('#delete_data_temp').html(name + " (ID:" + id + ")");
    $(".confirm_delete_temp").data("ajax_id", id);
    $(".confirm_delete_temp").data("ajax_table", table);

});

$(document).on("click", ".confirm_delete_temp", function (event) {
    var table = $(this).data("ajax_table");
    var id = $(this).data("ajax_id");
    var url = 'admin/ajax/php/del_temp.php';
    $.ajax({
        url: url,
        type: 'POST',
        dataType: "text",
        data: {
            id: id,
            tname: table
        },
        success: function (data) {
            //hide the modal box
            $('#delete-modal-temp').modal('hide');
            //display the notification box
            new PNotify({
                title: 'Server Response',
                text: data,
                type: 'success'
            });
            //refresh form
            setInterval(function () {
                window.location.reload(true)
            }, 1000);

        },
        cache: false
    });

});



