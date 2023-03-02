    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'admin/ajax/php/search-acc.php?key=%QUERY',
        limit : 10
    });
});