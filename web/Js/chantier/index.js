$(document).ready(function () {
    $('#collapse-search').on('hidden.bs.collapse', function() {
        $('#search').val('')
    })

    var monkeyList = new List('chantiers-list', {
        valueNames: ['chantier-nom'],
        page: 10,
        pagination: true
    });

})