//pad function
function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}
$(document).ready(function () {

        //append row and assign each row a serial no, for javascript totaling of debit and credit values
        $('#add_row').click(function () {
                var rowid = pad(Number($('#row_count').val()) + 1, 3);
                var mast_id = $('#mast_id').val();
                //update remove button to newly inserted row
                for (var r = 1; r <= rowid; r++) {
                    var r = pad(r, 3);
                    $('#remove_row' + r).remove();
                }

                var file = $('#file').val();

                //remove the parent row
                $('#remove_row' + rowid).remove();

                $.ajax({
                    type: "POST",
                    url: "admin/ajax/php/" + file + ".php",
                    data: {
                        rowid: rowid,
                        survey_mast_id: mast_id
                    },
                    dataType: "html",
                    cache: false,
                    success: function (data) {


                        $('#row_count').val(rowid);
                        $('#row_append').append(data).fadeIn('fast');
                        $('#selected' + rowid).focus();
                    }
                });
            }) //end insert row


        //remove button pressed ------------------------
        $(document).on('click', '.remove_row', function () {
            //get the clicked button's id
            var row_id = $(this).attr("id");

            //getting the least three letter of the id
            row_id = row_id.substr(row_id.length - 3);

            //remove the parent row
            $('#' + row_id).remove();

            var sec_last_row = row_id - 1;
            sec_last_row = pad(sec_last_row, 3);
            $('#' + sec_last_row).append("<button type='button' class='remove_row btn btn-danger' id='remove_row" + sec_last_row + "' style='float:right;margin:10px 10px 0 0; '>Remove</button>");
            $('#row_count').val(sec_last_row);
        });
        //end remove button pressed------------------------

    }) //document ready end