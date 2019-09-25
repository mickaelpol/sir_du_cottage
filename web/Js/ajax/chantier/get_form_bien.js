let url_form_bien;
let to_form_bien;
$('#button_url_add_bien').click(function(){
    url_form_bien = $(this).data('path');
    to_form_bien = $(this).data('to');
    $('#notif_ajax').html('');
});

$('#modal_ajout_bien').on('shown.bs.modal', function () {
    let modal = $(this);
    $.ajax(url_form_bien, {
        success: function(data) {
            modal.find('.modal-body').html(data);
        }
    });
});