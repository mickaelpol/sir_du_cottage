var switchClick = function(e) {
    $(this).toggleClass('active');
};

$(document).ready(function () {


    $('#collapse-search').on('hidden.bs.collapse', function () {
        $('#search').val('')
    });


    let options = {
        valueNames: ['user-nom', 'user-role'],
        page: 5,
        pagination: true,
    };

    let listObj = new List('users-list', options);

    $.fn.materialSwitch = function(options) {
        this.each(function() {
            $(this).click(switchClick);

            $('<div class="bar"/>').appendTo($(this));
            $('<div class="thumb-container" />').append(
                $('<div class="thumb" />').append(
                    $('<div class="ripple"/>')
                )
            ).appendTo($(this));
        });
        return this;
    };

    let index = 0;
    $('.material-switch').click(function () {
        index++;
        let form = $(this, '.user-nom').data('form')
        let url = $(this, '.user-nom').data('url');
        let userId = $(this, '.user-nom').data('user')
        let now = $(this, '.user-nom').data('now')
        let formulaireThis = $(`#${form}`);
        let listClass = $(this)[0].classList;

        if (listClass.contains('active')) {

            formulaireThis.find('.user-input').val(userId);
            formulaireThis.find('.enabled-input').val(0);
            let data = {
                'donnees': {
                    'utilisateur': userId,
                    'enabled': formulaireThis.find('.enabled-input').val()
                }
            };

            /* Requêtes ajax pour désactiver l'utilisateur */
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (res, statut) {
                    if (statut === 'success') {
                        let notifDiv = `<div class="notification-global" data-index="${index}">
                                            <div class="notification">
                                                <div class="notification-header">
                                                    <div class="mr-2 cercle cercle-${statut}"></div>
                                                    <strong class="mr-auto">Notification</strong>
                                                    <small>${now}</small>
                                                </div>
                                                <div class="notification-body">${res.success}</div>
                                            </div>
                                        </div>`
                        $(notifDiv).appendTo($('#notif'));
                    }
                },
                error: function (res, statut, code) {
                    if (statut === 'error') {
                        let notifDiv = `<div class="notification-global" data-index="${index}">
                                        <div class="notification">
                                            <div class="notification-header">
                                                <div class="mr-2 cercle cercle-danger"></div>
                                                <strong class="mr-auto">Notification</strong>
                                                <small>${now}</small>
                                            </div>
                                            <div class="notification-body">Vous n'avez pas accès à cette fonctionnalité</div>
                                        </div>
                                    </div>`
                        $(notifDiv).appendTo($('#notif'));
                    }
                },
                complete: function (res, statut, code) {
                    // console.log(res, statut, code)
                }
            })
        } else {
            formulaireThis.find('.user-input').val(userId);
            formulaireThis.find('.enabled-input').val(1);
            let data = {
                'donnees': {
                    'utilisateur': userId,
                    'enabled': formulaireThis.find('.enabled-input').val()
                }
            };

            /* Requêtes ajax pour désactiver l'utilisateur */
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (res, statut) {
                    if (statut === 'success') {
                        let notifDiv = `<div class="notification-global" data-index="${index}">
                                            <div class="notification">
                                                <div class="notification-header">
                                                    <div class="mr-2 cercle cercle-${statut}"></div>
                                                    <strong class="mr-auto">Notification</strong>
                                                    <small>${now}</small>
                                                </div>
                                                <div class="notification-body">${res.success}</div>
                                            </div>
                                        </div>`
                        $(notifDiv).appendTo($('#notif'));
                    }
                },
                error: function (res, statut, code) {
                    if (statut === 'error') {
                        let notifDiv = `<div class="notification-global" data-index="${index}">
                                        <div class="notification">
                                            <div class="notification-header">
                                                <div class="mr-2 cercle cercle-danger"></div>
                                                <strong class="mr-auto">Notification</strong>
                                                <small>${now}</small>
                                            </div>
                                            <div class="notification-body">Vous n'avez pas accès à cette fonctionnalité</div>
                                        </div>
                                    </div>`
                        $(notifDiv).appendTo($('#notif'));
                    }
                },
                complete: function (res, statut, code) {
                }
            })
        }
        setTimeout(() => {
            let notifIndex = $('*[data-index]');
            notifIndex.fadeOut("slow", () => {});
        }, 5000)
    })


    $('.material-switch').materialSwitch();




    let deletingClass = $('.deleting-btn');

    deletingClass.on('click', function (e) {
        e.preventDefault();
        let route = $(this).data('route');
        let user = $(this).data('user');
        let titre = `<h1 class="text-center text-dark">Suppression du chantier ${user}</h1>`;
        let phraseSuppression = `<h2 class="text-center text-danger"><i class="material-icons">warning</i> Attention <i class="material-icons">warning</i></h2>
        La suppression de l'utilisateur "<strong class="font-weight-bold font-italic text-uppercase">${user}</strong>" est définitive !
        <br>
        Après cette action il sera impossible de récupérer les informations ou le contenu de cet utilisateur .
        <br>
        Êtes-vous certain de vouloir le supprimer ?`
        $('.del-modal-btn').attr('href', route);
        $('#modalTitre').html(titre)
        $('#bodyModal').html(phraseSuppression)
    })


})