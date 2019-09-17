$(document).ready(function () {

    function notification(el, child, search ,class1, class2, timer)
    {
        if (child.hasClass(search)) {
            el.addClass(class1);
            setTimeout(function () {
                el.removeClass(class1);
                el.addClass(class2);
            }, timer)
        }
    }

    $('body').bootstrapMaterialDesign();
    $('[data-toggle="tooltip"]').tooltip()

    /* Initialisation des notifications faite manuellements */
    let notifGlobale = $('.notification-global');
    let childrenNotif = notifGlobale.children();

    notification(notifGlobale, childrenNotif, 'notification', 'show', 'fade', 5000);
})