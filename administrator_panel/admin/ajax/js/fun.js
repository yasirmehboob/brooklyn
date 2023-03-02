$(document).on("click", ".approve_fun", function (event) {
        var id = $(this).data('id');
        var user = $(this).data('user');
        var dt = $(this).data('dt');    
        var status = "status='approved', approved_by='"+user+"', approve_dt='"+dt+"'";
        var condition = "id='" + id + "'";
    

        $.ajax({
            type: "POST",
            url: "admin/ajax/php/up_fun.php",
            data: {
                table: 'fun',
                field: status,
                condition: condition
            },
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