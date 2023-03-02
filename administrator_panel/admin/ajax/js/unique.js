$(document).on("blur", ".unique", function (event) {


    var url = "admin/ajax/php/unique.php";
    var table = $(this).data("uni_table");
    var field = $(this).data("uni_field");
    var value = $(this).val();

    $.ajax({
        context: this,
        url: url,
        type: "POST",
        dataType: "text",
        data: {
            table: table,
            field: field,
            value: value
        },
        success: function (data) {
            
            if (data == "exist") {
                $(this).addClass('duplicate');
                $(this).focus();
                new PNotify({
                    title: 'Duplicate Record!',
                    text: "Data Already Existed",
                    type: 'error'
                });
            } else {
                $(this).removeClass('duplicate');
            }
        }
    });

});