//Mange Event Type
$(document).on("change", "#event_type", function () {
    
    var type = $(this).val();
    
    if(type=='public'){
        $('.select_user').prop('checked',false); 
        var total=$('input[name=check_box]:checked').length;
        $('.count').html(total);
        
        $('.bg').slideUp('fast');
    }else if(type=='private'){
        $('.bg').slideDown('fast');
    }else{
        $('.select_user').prop('checked',false); 
        var total=$('input[name=check_box]:checked').length;
        $('.count').html(total);
        
        $('.bg').slideUp('fast');
    }
    
});
//Mange Event Type


$(document).on("click", ".all", function () {
    $('.select_user').prop('checked',true); 
    var total=$('input[name=check_box]:checked').length;
    $('.count').html(total);
    
    var data = $('.select_user').serialize();
    $('#list').val(data); 
});

$(document).on("click", ".none", function () {
    $('.select_user').prop('checked',false); 
    var total=$('input[name=check_box]:checked').length;
    $('.count').html(total);
    
    var data = $('.select_user').serialize(); 
    $('#list').val(data);
});


$(document).on("click", ".select_user", function () {
    var total=$('input[name=check_box]:checked').length;
    $('.count').html(total);
    
    var data = $('.select_user').serialize();
    $('#list').val(data);
});



//Checkbox Organizer
$(document).on("change", "#organizer_btn", function () {
    
    if($(this).is(':checked')){
       $('.bg_org').slideDown('fast');
    }else{
        $('.bg_org').slideUp('fast');
        $('.select_user_org').prop('checked',false); 
        var total=$('input[name=check_box_org]:checked').length;
        $('.count_org').html(total);
    }
    
});
//Checkbox Organizer

$(document).on("click", ".all_org", function () {
    $('.select_user_org').prop('checked',true); 
    var total=$('input[name=check_box_org]:checked').length;
    $('.count_org').html(total);
    
    var data = $('.select_user_org').serialize();
    $('#list_org').val(data); 
});

$(document).on("click", ".none_org", function () {
    $('.select_user_org').prop('checked',false); 
    var total=$('input[name=check_box_org]:checked').length;
    $('.count_org').html(total);
    
    var data = $('.select_user_org').serialize(); 
    $('#list_org').val(data);
});


$(document).on("click", ".select_user_org", function () {
    var total=$('input[name=check_box_org]:checked').length;
    $('.count_org').html(total);
    
    var data = $('.select_user_org').serialize();
    $('#list_org').val(data);
});