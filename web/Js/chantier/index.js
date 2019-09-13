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

    let deletingClass = $('.deleting-btn');

    deletingClass.on('click', function (e) {
        e.preventDefault();
        let route = $(this).data('route');
        let chantier = $(this).data('chantier');
        let titre = `<h1 class="text-center text-dark">Suppression du chantier ${chantier}</h1>`;
        let phraseSuppression = `<h2 class="text-center text-danger"><i class="material-icons">warning</i> Attention <i class="material-icons">warning</i></h2>
        La suppression du chantier <strong class="font-weight-bold font-italic text-uppercase">${chantier}</strong> est définitive !
        <br>
        Après cette action il sera impossible de récupérer les informations ou le contenu de ce chantier .
        <br>
        Êtes-vous certain de vouloir le supprimer ?`
        $('.del-modal-btn').attr('href', route);
        $('#modalTitre').html(titre)
        $('#bodyModal').html(phraseSuppression)
    })


})