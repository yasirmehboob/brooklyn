    $(document).ready(function(){
    $('input.typeahead2').typeahead({
        name: 'typeahead2',
        remote:'admin/ajax/php/search-proditemcode.php?key=%QUERY',
        limit : 10
    });
});