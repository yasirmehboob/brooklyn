$(document).on("click", ".view", function (event) {
    var table = $(this).data("tname");
    var id = $(this).attr("id");
    var url = 'admin/ajax/php/popup_' + table + '.php';

    $.ajax({
        url: url,
        type: 'POST',
        dataType: "json",
        data: {
            id: id,
            tname: table
        },
        success: function (data) {
            if (data.error != 'error') {
                $('#modal_view_title').html(data.title);
                $('#modal_view_body').html(data.body);
            }
        },
        cache: false
    });

});