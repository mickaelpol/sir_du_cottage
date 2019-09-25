let url_form_suppression_bien;
let to_form_suppression_bien;
$('#button_url_suppression_bien').click(function(){
    url_form_suppression_bien = $(this).data('path');
    to_form_suppression_bien = $(this).data('to');
    $('#notif_suppression_ajax').html('');
});

$('#modal_suppression_bien').on('shown.bs.modal', function () {
    let modal = $(this);
    modal.find('.modal-body').html('<div class="loading"></div>')
    $.ajax(url_form_suppression_bien, {
        success: function(data) {
            modal.find('.modal-body').html('<div class="text-center"><div class="loading-black"></div></div>');
        },
        error: function () {
            modal.find('.modal-body').html('Une erreur est survenue');
        },
        complete: function (data) {
            setTimeout(function () {
                modal.find('.modal-body').html(data.responseText);
            }, 500)
        }
    });
});