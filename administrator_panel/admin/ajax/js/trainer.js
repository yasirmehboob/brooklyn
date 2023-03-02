//when approve button cliced
$(document).on("click", ".approve", function () {
    var current_id = $(this).data('user_id');
    $('#confirm_approve').data('popup_user_id', current_id);
    $('.user_name').html('<i class=\'fa fa-user\'></i> '+$(this).data('user_name'));
});
//when approve button cliced


// When Approve confirmed
$(document).on("submit", "#approve_form", function (event) {
    event.preventDefault();
    var id = $('#confirm_approve').data('popup_user_id');
    var category = $('#category').val();
    
    var field = "category='"+category+"', status ='approved'";
    var condition = "id='" + id + "'";

        $.ajax({
            type: "POST",
            url: "admin/ajax/php/approve_user.php",
            data: {
                table: 'users',
                field: field,
                condition: condition,
                id: id,
                status:'approved'
            },
            dataType: "text",
            cache: false,
            success: function (data) {
                $('.modal').modal('hide');
                new PNotify({
                    title: 'Server Response',
                    text: data,
                    type: 'success'
                });
                setInterval(function(){window.location.reload(true)},2000);
            }
        });

    
});
// When Approve confirmed


//when susspend button cliced
$(document).on("click", ".susspend", function () {
    var current_id = $(this).data('user_id');
    $('#confirm_susspend').data('popup_user_id', current_id);
    $('.user_name').html('<i class=\'fa fa-user\'></i> '+$(this).data('user_name'));
});
//when susspend button cliced


// When susspend confirmed
$(document).on("click", "#confirm_susspend", function () {
    var id = $('#confirm_susspend').data('popup_user_id');
    
    var field = "status ='suspended'";
    var condition = "id='" + id + "'";

        $.ajax({
            type: "POST",
            url: "admin/ajax/php/approve_user.php",
            data: {
                table: 'users',
                field: field,
                condition: condition,
                id: id,
                status:'suspended'
            },
            dataType: "text",
            cache: false,
            success: function (data) {
                $('.modal').modal('hide');
                new PNotify({
                    title: 'Server Response',
                    text: data,
                    type: 'success'
                });
                setInterval(function(){window.location.reload(true)},2000);
            }
        });

    
});
// When susspend confirmed



//when unsuspend button cliced
$(document).on("click", ".unsuspend", function () {
    var current_id = $(this).data('user_id');
    $('#confirm_unsuspend').data('popup_user_id', current_id);
    $('.user_name').html('<i class=\'fa fa-user\'></i> '+$(this).data('user_name'));
    $('#suspend_category').html($(this).data('suspend_category'));
    $(".old_category  option[value='"+$(this).data('suspend_category')+"'").prop("selected", true);
});
//when unsuspend button cliced


// When unsuspend confirmed
$(document).on("click", "#confirm_unsuspend", function () {
    var id = $('#confirm_unsuspend').data('popup_user_id');
    var category = $('#new_category').val();
    var field = "category='"+category+"', status ='approved'";
    var condition = "id='" + id + "'";

        $.ajax({
            type: "POST",
            url: "admin/ajax/php/approve_user.php",
            data: {
                table: 'users',
                field: field,
                condition: condition,
                id: id,
                status:'unsuspend'
            },
            dataType: "text",
            cache: false,
            success: function (data) {
                $('.modal').modal('hide');
                new PNotify({
                    title: 'Server Response',
                    text: data,
                    type: 'success'
                });
                setInterval(function(){window.location.reload(true)},2000);
            }
        });

    
});
// When unsuspend confirmed