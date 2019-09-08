$(document).ready(function () {

    $('#collapse-search').on('hidden.bs.collapse', function () {
        $('#search').val('')
    });

    let options = {
        valueNames: ['chantier-nom', 'chantier-type'],
        page: 5,
        pagination: true,
    };

    let listObj = new List('chantiers-list', options);


})