    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'admin/ajax/php/search-sinv.php?key=%QUERY',
        limit : 10
    });
});