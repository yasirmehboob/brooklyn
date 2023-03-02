    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'admin/ajax/php/search-prod.php?key=%QUERY',
        limit : 10
    });
});