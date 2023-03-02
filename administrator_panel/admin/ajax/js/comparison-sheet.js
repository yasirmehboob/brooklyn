$(document).ready(function () {
   var brand_list= 'empty';
    var brand_count = 0;
    
    
    
    //Choose All Brand Checked------------------------
    $('#all').change(function(){
        if($(this).is(':checked')){
            $('.brand').prop("checked", true);
        }else{
            $('.brand').prop("checked", false);
        }
    });
    
    $('.brand').change(function(){
        if($(this).not(':checked')){
            $('#all').prop("checked", false);
        }
    });
    
    //Choose All Brand Checked------------------------
    

    
    
    //choose brand change ------------------------
    $(document).on('change click', "input[name='brand_id[]'], #all, .comparison",  function () {
        
        //make the mysql "IN" Clause with all the selected brand ID's e.g "(12, 31, 41, 1)"
        brand_list = '(';
        brand_count=0;
        $("input[name='brand_id[]']:checked").each( function () {
		  brand_list+=$(this).val()+',';
            brand_count++;
	    });
        brand_list = brand_list.slice(0, -1); //removing the last comma form the string
        brand_list+=')';
        
        //if no value is selected
        if(brand_list==')'){
            brand_list= 'empty';
        }
        //if only one value is selected
        else if (brand_list.indexOf(",") < 0){
            brand_list = "short_value";
        }
    });
    //choose brand change ------------------------
    
    
    
    //item_search blured ------------------------
    $(document).on('click', '.comparison', function comparison() {
        
        var search_number = $("input[name='item_search']").val();
        
        
        // validations Begains
        if((brand_list=='empty')||(brand_list=='short_value')||(search_number=='')){
            if (brand_list == 'empty') {
                new PNotify({
                title: 'Warning',
                text: 'No Brand Selected!',
                type: 'error'
                });
                return false;

            }else if (brand_list=='short_value'){
                new PNotify({
                title: 'Warning',
                text: 'For Comparison please select at least of 2 brands from dorpdown, Only 1 Brand is Selected!',
                type: 'error'
                });
                return false;
                
            }else if(search_number==''){
                new PNotify({
                title: 'Warning',
                text: 'Item Search Number cannot be Null!',
                type: 'error'
                });
                return false;
            }
        }
        // validations Ends
        
        //default brand setting
        if($('#default_brand').val()!=='') {
            var default_brand = $('#default_brand').val();
        }else{
            var default_brand ='';
        }
        //default brand setting
        
        $.ajax({
                    type: "POST",
                    url: "admin/ajax/php/comparison-sheet.php",
                    data: {
                        search_number: search_number,
                        brands:brand_list,
                        brand_count:brand_count,
                        default_brand:default_brand
                    },
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                      $('.comparison_table').html(data.table);
                        $('#master_pref').html(data.master_pref);
                        $('#monthly_req').val(data.monthly_req);
                        $('#target_price').val(data.target_price);
                        $('#req_sidewall').html(data.side_wall);
                        $('#cart').data('rows',data.rows);
                    }
                });

    });
    //item_search blured ------------------------

    
    
//Show details buttion clicked------------------------
$(document).on('click', '.show_btn', function () {
    if($('#state_details').val()=='y'){
        $('#details').show('fast');
        $('.show_btn').html("<i class='fa fa-chevron-up'></i> Hide Details");
        $('#state_details').val('n');
    }
    else{
        $('#details').hide('fast');
        $('.show_btn').html("<i class='fa fa-chevron-down'></i> Show Details");
        $('#state_details').val('y');
    }
});
//Show details buttion clicked------------------------
    
    
    
    
//if parameters passed from inquiry form ------------------------------------------------------------------------
    if($('#search_number').val()!=='') {
        var search_number = $('#search_number').val();
        var brand_list = $('#brands').val();
        var brand_count =$('#counts').val();
        var inquiry =$('#inquiry').val();
        var inquiry_trans =$('#inquiry_trans').val();
        var edit = $('#edit').val();
        if(edit=='true'){
            edit = "?edit=true";
        }else{
            edit='';
        }
        
        $.ajax({
                type: "POST",
                url: "admin/ajax/php/comparison-sheet.php"+edit,
                data: {
                    search_number: search_number,
                    brands:brand_list,
                    brand_count:brand_count,
                    inquiry:inquiry,
                    inquiry_trans:inquiry_trans
                },
                dataType: "json",
                cache: false,
                success: function (data) {
                  $('.comparison_table').html(data.table);
                    $('#master_pref').html(data.master_pref);
                    $('#monthly_req').val(data.monthly_req);
                    $('#target_price').val(data.target_price);
                    $('#req_sidewall').html(data.side_wall);
                    $('#cart').attr('data-rows', data.rows);
                    $('#update').attr('data-rows', data.rows);
                }
            });

    }
//if parameters passed from inquiry form------------------------------------------------------------------------
    
    
    
    
//if parameters passed from Evaluate Brand_item form ------------------------------------------------------------------------
    if($('#default_brand').val()!=='') {
       
        //make the mysql "IN" Clause with all the selected brand ID's e.g "(12, 31, 41, 1)"
        var brand_list1 = '(';
        brand_count1 =0;
        $("input[name='brand_id[]']:checked").each( function () {
		  brand_list1+=$(this).val()+',';
            brand_count1++;
	    });
        brand_list1 = brand_list1.slice(0, -1); //removing the last comma form the string
        brand_list1+=')';
        
        var search_number = $('#item_search').val();
        var default_brand = $('#default_brand').val();

        $.ajax({
                    type: "POST",
                    url: "admin/ajax/php/comparison-sheet.php",
                    data: {
                        search_number: search_number,
                        brands:brand_list1,
                        brand_count:brand_count1,
                        default_brand: default_brand
                    },
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                      $('.comparison_table').html(data.table);
                        $('#master_pref').html(data.master_pref);
                        $('#monthly_req').val(data.monthly_req);
                        $('#target_price').val(data.target_price);
                        $('#req_sidewall').html(data.side_wall);
                        $('#cart').attr('data-rows', data.rows);
                        $('#update').attr('data-rows', data.rows);
                    }
                });

    }
//if parameters passed from Evaluate Brand_item form------------------------------------------------------------------------    
    

//if Evaluate Dropdown changed------------------------------------------------------------------------    
    $(document).on('change', '.evaluate', function () { 
        var evaluate_val =$(this).val();
        var evaluate_dt =$('#evaluate_dt').val();
        var evaluate = "evaluate_id='" + evaluate_val + "',evaluate_dt='"+ evaluate_dt +"'";
        var table = "brand_item";
        var id_val = $(this).data("id");
        var condition = "id='" + id_val + "'";

        $.ajax({
            type: "POST",
            url: "admin/ajax/php/up.php",
            data: {
                table: table,
                field: evaluate,
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
//if Evaluate Dropdown changed------------------------------------------------------------------------    

    
    
//if add to cart pressed------------------------------------------------------------------------
    $(document).on('click', '#cart', function () {
        var count = $('#cart').attr('data-rows');
        var inquiry_mast = $('#inquiry').val();
        var inquiry_trans = $('#inquiry_trans').val();
        var master_item = $('#master_item').val();  
        var dt = $('#dt').val();
        var user = $('#user').val();
        
        var values = "";
        for(x=1; x<=count; x++){
            var brand = $('#'+x).data('brand');
            var qty =  $('#'+x).val();
            
                values += "(NULL, '"+inquiry_mast+"', '"+inquiry_trans+"', '"+brand+"', '"+master_item+"', '"+qty+"', 'n', '"+dt+"', '"+user+"'),";
            
        }
        
        $.ajax({
                type: "POST",
                url: "admin/ajax/php/create_inquiry.php",
                data: {
                    values : values,
                    inquiry_trans : inquiry_trans
                },
                dataType: "text",
                cache: false,
                success: function (data) {
                    
                if(data=='Saved.'){
                  new PNotify({
                        title: 'Server Response',
                        text: data,
                        type: 'success'
                    });  
                    
                    setInterval(function () {
                        //window.location.href = 'create-inquiry-trans.php' 
                        history.go(-1);
                    }, 500);
                    
                }else{
                   new PNotify({
                        title: 'Server Response',
                        text: data,
                        type: 'error'
                    });  
                }
                  
                }
            });

    });
//if add to cart pressed------------------------------------------------------------------------
    
    
    
    
//if update button pressed------------------------------------------------------------------------
    $(document).on('click', '#update', function () {
        var count=$('#update').attr('data-rows');
        var inquiry_mast = $('#inquiry').val();
        var inquiry_trans = $('#inquiry_trans').val();
        var master_item = $('#master_item').val();  
        var dt = $('#dt').val();
        var user = $('#user').val();
        
        var values = "";
        
        for(x=1; x<=count; x++){
            var id = $('#'+x).data('rowid');
            var qty =  $('#'+x).val();
            var brand = $('#'+x).data('brand');
            
            if(id!=''){//if data already existed in the database then update
                values += "UPDATE `inquiry` SET `qty`='"+qty+"' WHERE `id`='"+id+"'-|-";
            }else{//if data not existed then insert it instead of updating
                values += "INSERT INTO `inquiry`(`id`, `inquiry_mast`, `inquiry_trans`, `brand_id`, `master_item`, `qty`, `del`, `dt`, `user`) VALUES (NULL, '"+inquiry_mast+"', '"+inquiry_trans+"', '"+brand+"', '"+master_item+"', '"+qty+"', 'n', '"+dt+"', '"+user+"')-|-";
            }        
        }//end for loop
        
        $.ajax({//send data to create_inquiry for processing
                type: "POST",
                url: "admin/ajax/php/create_inquiry.php",
                data: {
                    query : values,
                    inquiry_trans : inquiry_trans
                },
                dataType: "text",
                cache: false,
                success: function (data) {
                    
                if(data=='Updated.'){
                  new PNotify({
                        title: 'Server Response',
                        text: data,
                        type: 'success'
                    });  
                    
                    setInterval(function () {
                        //window.location.href = 'create-inquiry-trans.php' 
                        history.go(-1);
                    }, 500);
                    
                }else{
                   new PNotify({
                        title: 'Server Response',
                        text: data,
                        type: 'error'
                    });  
                }
                  
                }
            });
        
        
    });
//if update button pressed------------------------------------------------------------------------
    
    //goback button clicked
    $('.back').click(function(){
        history.go(-1);
    });
    //goback button clicked
    
    }) //document ready end