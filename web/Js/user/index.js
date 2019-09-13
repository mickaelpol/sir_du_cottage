var switchClick = function(e) {
    $(this).toggleClass('active');
};

$(document).ready(function () {

    $('#collapse-search').on('hidden.bs.collapse', function () {
        $('#search').val('')
    });

    let options = {
        valueNames: ['user-nom', 'user-actif', 'user-role'],
        page: 5,
        pagination: true,
    };

    let listObj = new List('users-list', options);

    $.fn.materialSwitch = function(options) {
        this.each(function() {
            $(this).click(switchClick);

            $('<div class="bar" />').appendTo($(this));
            $('<div class="thumb-container" />').append(
                $('<div class="thumb" />').append(
                    $('<div class="ripple"/>')
                )
            ).appendTo($(this));
        });
        return this;
    };

    $('.material-switch').click(function () {
        let route = $('.user-nom').data('route');
        let user = $('.user-nom').data('user')
        let listClass = $(this)[0].classList;
        if (listClass.contains('active')) {
            /* Requêtes ajax pour désactiver l'utilisateur */
            console.log(route)
            $.ajax();
            // console.log('class active')
        } else {
            /* requête ajax pour activer l'utilisateur */
            $.ajax();
            // console.log('pas de class active')
        }
    })

    $('.material-switch').materialSwitch();


    // checkboxUser.on('click', function () {
    //     // get state
    //     // si state = 1
    //     let state = $(this).attr('style')
    //     console.log(state)
    // });




    //
    // let deletingClass = $('.deleting-btn');
    //
    // deletingClass.on('click', function (e) {
    //     e.preventDefault();
    //     let route = $(this).data('route');
    //     let chantier = $(this).data('chantier');
    //     let titre = `<h1 class="text-center text-dark">Suppression du chantier ${chantier}</h1>`;
    //     let phraseSuppression = `<h2 class="text-center text-danger"><i class="material-icons">warning</i> Attention <i class="material-icons">warning</i></h2>
    //     La suppression du chantier <strong class="font-weight-bold font-italic text-uppercase">${chantier}</strong> est définitive !
    //     <br>
    //     Après cette action il sera impossible de récupérer les informations ou le contenu de ce chantier .
    //     <br>
    //     Êtes-vous certain de vouloir le supprimer ?`
    //     $('.del-modal-btn').attr('href', route);
    //     $('#modalTitre').html(titre)
    //     $('#bodyModal').html(phraseSuppression)
    // })


})