var url_form_bien;
var to_form_bien;
$('#button_delete_mult_chantier').click(function(){
    url_form_bien = $(this).data('path');
    to_form_bien = $(this).data('to');
    $('#notif_ajax').html('');
});

$('#modal_delete_multiple_chantier').on('shown.bs.modal', function () {
    let modal = $(this);
    $.ajax(url_form_bien, {
        success: function() {
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