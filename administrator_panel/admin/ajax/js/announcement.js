$(document).on("change", ".attachment", function () {
    
    if($(this).prop('checked')){
        
       $('#uploadImage').show('fast'); 
       $('#uploadImage').prop('required', true);
       $('#no_image').val('have_image'); 
        
    }else{
        
        $('#uploadImage').hide('fast'); 
        $('#uploadImage').prop('required', false);
        $('#no_image').val('no_image');
        
    }
    
});